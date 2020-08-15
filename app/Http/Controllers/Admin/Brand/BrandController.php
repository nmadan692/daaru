<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Services\General\Brand\BrandService;
use App\Services\General\Category\CategoryService;
use App\Services\General\DatatableService;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    /**
     * @var BrandService
     */
    private $brandService;
    /**
     * @var CategoryService
     */
    private $categoryService;
    /**
     * @var DatatableService
     */
    private $datatableService;

    /**
     * BrandController constructor.
     * @param BrandService $brandService
     * @param CategoryService $categoryService
     * @param DatatableService $datatableService
     */
    public function __construct (
       BrandService $brandService,
       CategoryService $categoryService,
       DatatableService $datatableService

    )
    {

        $this->brandService = $brandService;
        $this->categoryService = $categoryService;
        $this->datatableService = $datatableService;
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
            'editUrl' => 'admin.brand.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.brand.destroy',
            'deleteIcon' => 'fa fa-trash',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.brand.show',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'brands',
            [
                [
                    'name' => 'categories',
                    'first' => 'brands.category_id',
                    'second' => 'categories.id',
                    'joins' => []
                ]

             ],
            [
                'brands.id as id',
                'brands.name as name',
                'categories.name as category_name',
                'brands.status as status'

            ]
        );
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
        return view('admin.brand.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryName = $this->categoryService->all();
        return view('admin.brand.create', compact( 'categoryName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->brandService->create($request->all());

        return redirect()->route('admin.brand.index');
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
        $brand = $this->brandService->findOrFail($id);
        $categoryName = $this->categoryService->all();

        return view('admin.brand.edit', compact('brand', 'categoryName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->brandService->update($id, $request->all());

        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
