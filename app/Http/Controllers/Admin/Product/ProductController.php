<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\General\Brand\BrandService;
use App\Services\General\DatatableService;
use App\Services\General\DefaultCity\DefaultCityService;
use App\Services\General\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
     * @var DefaultCityService
     */
    private $defaultCityService;

    /**
     * ProductController constructor.
     * @param BrandService $brandService
     * @param ProductService $productService
     * @param DatatableService $datatableService
     * @param DefaultCityService $defaultCityService
     */
    public function __construct(
        BrandService $brandService,
        ProductService $productService,
        DatatableService $datatableService,
        DefaultCityService $defaultCityService
    )
    {

        $this->brandService = $brandService;
        $this->productService = $productService;
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
                'products.name as name',
                'brands.name as brand_name',
                'volume',
                'country',
                'alcohol',
                'description',
                'price',
                'discount',
                'is_percent',
                'is_featured',
                'quantity',
                'products.status as status'

            ],
            null,
            [
                'city_id' => $this->defaultCityService->get('id')
            ],
            ['products.deleted_at']
        );
        $query->addIndexColumn();

        $query->editColumn('status', function ($data) {
            $id = $data->id;
            $name = 'status';
            $checked = false;
            $disabled = false;
            if($data->status == 1) {
                $checked = true;
                $disabled = true;
            }
            return view('admin.product.switch', compact('name', 'disabled', 'checked', 'id'));
        });
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->rawColumns(['status', 'action']);

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
    public function store(ProductRequest $request)
    {
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $storeData = array_merge(
            $request->all(),
            [
                'image' => Storage::putFileAs('product/images', $image, $image_name),
                'city_id' => $this->defaultCityService->get('id')
            ]
        );
        $this->productService->create($storeData);

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
        $product = $this->productService->findOrFail($id);

        return view('admin.product.show', compact('product'));
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
    public function update(ProductRequest $request, $id)
    {
        $updateData = $request->all();
        if($request->file('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $updateData = array_merge(
                $updateData,
                [
                    'image' => Storage::putFileAs('product/images', $image, $image_name)
                ]);
        }
        $product = $this->productService->findOrFail($id);
        $this->productService->update($id, $updateData);
        $oldImage = $product->image;
        if($oldImage && $request->file('image')) {
            Storage::delete($oldImage);
        }
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
        $this->productService->findOrFail($id)->delete();

        return redirect()->route('admin.product.index');
    }

    /**
     * @param $id
     */
    public function changeStatus($id) {
        $product = $this->productService->findOrFail($id);
        DB::beginTransaction();
        $product->status = !$product->status;
        $product->save();
        DB::commit();

        return;
    }
}
