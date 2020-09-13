<?php

namespace App\Http\Controllers\Admin\CmsPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CmsPageRequest;
use App\Services\General\CmsPage\CmsPageService;
use App\Services\General\DatatableService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CmsPageController extends Controller
{
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var CmsPageService
     */
    private $cmsPageService;

    /**
     * CmsPageController constructor.
     * @param DatatableService $datatableService
     * @param CmsPageService $cmsPageService
     */
    public function __construct(

        DatatableService $datatableService,
        CmsPageService $cmsPageService
    )
    {
        $this->datatableService = $datatableService;
        $this->cmsPageService = $cmsPageService;
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
            'editUrl' => 'admin.cms-page.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.cms-page.destroy',
            'deleteIcon' => 'fa fa-trash',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.cms-page.show',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'cms_pages',
            null,
            [
                'id',
                'terms_and_conditions',
                'return_policy',
                'privacy_policy',
                'image'
            ],
            null,
            [],
            ['deleted_at']
        );

        $query->addIndexColumn();
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->editColumn('terms_and_conditions', function ($data) {
            return  strip_tags(Str::limit($data->terms_and_conditions,100));
        });

        $query->editColumn('return_policy', function ($data) {
            return  strip_tags(Str::limit($data->return_policy,100));
        });

        $query->editColumn('privacy_policy', function ($data) {
            return  strip_tags(Str::limit($data->privacy_policy,100));
        });


        $query->rawColumns(['terms_and_conditions', 'return_policy', 'privacy_policy', 'action']);

        return $query->make();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cmspage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cmspage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CmsPageRequest $request)
    {
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $storeData = array_merge(
            $request->all(),
            [
                'image' => Storage::putFileAs('cms_page/images', $image, $image_name)
            ]
        );
        $this->cmsPageService->create($storeData);

        return redirect()->route('admin.cms-page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cms_page = $this->cmsPageService->findOrFail($id);

        return view('admin.cmspage.show', compact('cms_page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cms_page = $this->cmsPageService->findOrFail($id);
        return view('admin.cmspage.edit', compact('cms_page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CmsPageRequest $request, $id)
    {
        $updateData = $request->all();
        if($request->file('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $updateData = array_merge(
                $updateData,
                [
                    'image' => Storage::putFileAs('cms_page/images', $image, $image_name)
                ]);
        }
        $blog = $this->cmsPageService->findOrFail($id);
        $this->cmsPageService->update($id, $updateData);
        $oldImage = $blog->image;
        if($oldImage && $request->file('image')) {
            Storage::delete($oldImage);
        }

        return redirect()->route('admin.cms-page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cmsPageService->findOrFail($id)->delete();
        return redirect()->route('admin.cms-page.index');
    }
}
