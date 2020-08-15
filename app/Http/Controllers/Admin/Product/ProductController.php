<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Services\General\Brand\BrandService;
use App\Services\General\DatatableService;
use App\Services\General\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var BrandService
     */
    private $brandService;
    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var DatatableService
     */
    private $datatableService;

    /**
     * ProductController constructor.
     * @param BrandService $brandService
     * @param ProductService $productService
     * @param DatatableService $datatableService
     */
    public function __construct(
        BrandService $brandService,
        ProductService $productService,
        DatatableService $datatableService
    )
    {

        $this->brandService = $brandService;
        $this->productService = $productService;
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
            'editUrl' => 'admin.product.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.product.destroy',
            'deleteIcon' => 'fa fa-trash',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.product.show',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'products',
            [
                [
                    'name' => 'brands',
                    'first' => 'products.brand_id',
                    'second' => 'brands.id',
                    'joins' => []
                ]

            ],
            [
                'products.id as id',
                'image',
                'products.name as name',
                'brands.name as brand_name',
                'volume',
                'country',
                'alcohol',
                'description',
                'price',
                'discount',
                'is%',
                'quantity',
                'products.status as status'

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
        return view('admin.product.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brandName = $this->brandService->all();
        return view('admin.product.create', compact( 'brandName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->productService->create($request->all());

        return redirect()->route('admin.product.index');
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
        $product = $this->productService->findOrFail($id);
        $brandName = $this->brandService->all();

        return view('admin.product.edit', compact('product', 'brandName'));
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
        $this->productService->update($id, $request->all());

        return redirect()->route('admin.product.index');
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
