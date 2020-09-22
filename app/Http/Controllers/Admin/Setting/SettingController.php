<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Services\General\DatatableService;
use App\Services\General\DefaultCity\DefaultCityService;
use App\Services\General\Setting\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    /**
     * @var SettingService
     */
    private $settingService;
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var DefaultCityService
     */
    private $defaultCityService;

    /**
     * SettingController constructor.
     * @param SettingService $settingService
     * @param DatatableService $datatableService
     * @param DefaultCityService $defaultCityService
     */
    public function __construct(
        SettingService $settingService,
        DatatableService $datatableService,
        DefaultCityService $defaultCityService

    )
    {
        $this->settingService = $settingService;
        $this->datatableService = $datatableService;
        $this->defaultCityService = $defaultCityService;
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
            'editUrl' => 'admin.setting.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.setting.destroy',
            'deleteIcon' => 'fa fa-trash',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.setting.show',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'settings',
            null,
            [
                'id',
                'logo',
                'name',
                'phone',
                'viber',
                'email',
                'address',
                'delivery_start_hour',
                'delivery_end_hour',
                'facebook',
                'instagram',
                'twitter'
            ],
            null,
            [
                'city_id' => $this->defaultCityService->get('id')
            ],
            ['settings.deleted_at']
        );

        $query->addIndexColumn();
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });

        return $query->make();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        $image = $request->file('logo');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $resizedImage = Image::make($image);

        $storeData = array_merge(
            $request->all(),
            [
                'logo' => Storage::putFileAs('setting/images/', $image, $image_name),
            ]
        );
        Storage::put('200x300/setting/images/'.$image_name, $resizedImage->resize(200,300)->encode());
        Storage::put('300x400/setting/images/'.$image_name, $resizedImage->resize(300,400)->encode());
        $this->settingService->create($storeData);


        return redirect()->route('admin.setting.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = $this->settingService->findOrFail($id);

        return view('admin.setting.show', compact('setting'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $setting = $this->settingService->findOrFail($id);

        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        $updateData = $request->all();
        if($request->file('logo')) {
            $image = $request->file('logo');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $updateData = array_merge(
                $updateData,
                [
                    'logo' => Storage::putFileAs('setting/images', $image, $image_name)
                ]);
        }
        $setting = $this->settingService->findOrFail($id);

        $this->settingService->update($id, $updateData);
        $oldImage = $setting->logo;
        if($oldImage && $request->file('logo')) {
            Storage::delete($oldImage);
        }

        return redirect()->route('admin.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->settingService->findOrFail($id)->delete();

        return redirect()->route('admin.setting.index');
    }
}
