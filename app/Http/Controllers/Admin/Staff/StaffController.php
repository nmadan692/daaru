<?php

namespace App\Http\Controllers\Admin\Staff;

use App\Daaruu\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaffRequest;
use App\Services\General\DatatableService;
use App\Services\General\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * StaffController constructor.
     * @param DatatableService $datatableService
     * @param UserService $userService
     */
    public function __construct(
        DatatableService $datatableService,
        UserService $userService
    )
    {
        $this->datatableService = $datatableService;
        $this->userService = $userService;
    }

    /**
     * @return mixed
     */
    public function list() {
        $actionData = [
            'icon' => true,
            'text' => false,
            'edit' => true,
            'editUrl' => 'admin.staff.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.staff.destroy',
            'deleteIcon' => 'fa fa-trash',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.staff.show',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'users',
            [],
            [
                'id',
                'first_name',
                'last_name',
                'address_1',
                'address_2',
                'city',
                'email',
                'phone'
            ],
            null,
            ['role_id' => RoleConstant::STAFF_ID]
        );
        $query->addIndexColumn();

        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->addColumn('full_name', function ($data) {
            return $data->first_name.' '.$data->last_name;
        });

        $query->addColumn('address', function ($data) {
            return $data->address_1.' '.$data->address_2;
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
        return view('admin.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        $storeData = array_merge(
            $request->all(),
            [
                'role_id' => RoleConstant::STAFF_ID,
                'password' => "password"

            ]
        );
        $this->userService->create($storeData);

        return redirect()->route('admin.staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = $this->userService->findOrFail($id);

        return view('admin.staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userService->findOrFail($id);

        return view('admin.staff.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, $id)
    {
        $updateData = array_merge(
            $request->all(),
            [
                'role_id' => RoleConstant::STAFF_ID,
                'password' => "password"

            ]
        );
        $this->userService->update($id, $updateData);

        return redirect()->route('admin.staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->findOrFail($id)->delete();

        return redirect()->route('admin.staff.index');
    }
}
