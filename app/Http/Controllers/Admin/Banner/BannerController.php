<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Daaruu\Constants\ImageSizeConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Services\General\banner\BannerService;
use App\Services\General\DatatableService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var BannerService
     */
    private $bannerService;

    /**
     * BannerController constructor.
     * @param DatatableService $datatableService
     * @param BannerService $bannerService
     */
    public function __construct(
        DatatableService $datatableService,
        BannerService $bannerService
    )
    {
        $this->datatableService = $datatableService;
        $this->bannerService = $bannerService;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function list() {
        $actionData = [
            'icon' => true,
            'text' => false,
            'edit' => true,
            'editUrl' => 'admin.banner.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.banner.destroy',
            'deleteIcon' => 'fa fa-trash',
            'deleteClass' => '',
            'view' => false,
            'viewUrl' => 'admin.banner.show',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'banners',
            null,
            [
                'id',
                'image',
                'status'
            ],
            null,
            [],
            ['banners.deleted_at']
        );
        $query->editColumn('status', function ($data) {
            $id = $data->id;
            $name = 'status';
            $checked = false;
            $disabled = false;
            if($data->status == 1) {
                $checked = true;
                $disabled = true;
            }
            return view('admin.banner.switch', compact('name', 'disabled', 'checked', 'id'));
        });
        $query->addIndexColumn();

        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->rawColumns(['status', 'action']);

        return $query->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $resizedImage = Image::make($image);

        $storeData = array_merge(
            $request->all(),
            [
                'image' => Storage::putFileAs('banner/images/', $image, $image_name)
            ]
        );

        Storage::put(ImageSizeConstant::BANNER_878_431.$image_name, $resizedImage->resize(878,431, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode());
        $this->bannerService->create($storeData);

        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = $this->bannerService->findOrFail($id);

        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $updateData = $request->all();
        if($request->file('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image);
            $updateData = array_merge(
                $updateData,
                [
                    'image' => Storage::putFileAs('banner/images', $image, $image_name)
                ]);
            Storage::put(ImageSizeConstant::BANNER_878_431.$image_name, $resizedImage->resize(878,431, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode());
        }
        $blog = $this->bannerService->findOrFail($id);
        $oldImage = $blog->image;
        if($oldImage && $request->file('image')) {
            Storage::delete($oldImage);
            Storage::delete(getResizedImageName($oldImage, ImageSizeConstant::BANNER_878_431));
        }
        $this->bannerService->update($id, $updateData);


        return redirect()->route('admin.banner.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner= $this->bannerService->findOrFail($id);
        if($image = $banner->image) {
            Storage::delete($image);
            Storage::delete(getResizedImageName($image, ImageSizeConstant::BANNER_878_431));
        }
        $banner->delete();
        return redirect()->route('admin.banner.index');
    }
    public function changeStatus($id) {
        $test = $this->bannerService->findOrFail($id);
        DB::beginTransaction();
        // event(new TestPublished($test));
        $test->status = !$test->status;
        $test->save();
        DB::commit();

        return;
    }
}
