<?php

namespace App\Http\Controllers\Front;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use App\Services\General\Brand\BrandService;
use App\Services\General\Category\CategoryService;
use App\Services\General\Product\ProductService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @var CategoryService
     */
    private $categoryService;
    /**
     * @var BrandService
     */
    private $brandService;
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * ProductController constructor.
     * @param CategoryService $categoryService
     * @param BrandService $brandService
     * @param ProductService $productService
     */
    public function __construct(
        CategoryService $categoryService,
        BrandService $brandService,
        ProductService $productService
    )
    {

        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
        $this->productService = $productService;
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request  $request){
        $categories = $this->categoryService->whereNull(['parent_id'])->get();
        $subCategories = $this->categoryService->whereNotNull(['parent_id'])->get();
        $brands = $this->brandService->all(['parent_id']);
        $products = $this->productService->query();

        if($categoriesInput = $request->input('categories')) {
            $products->whereHas('brand', function($query) use($categoriesInput) {
                $query->whereHas('category', function($query) use($categoriesInput) {
                    $query->whereHas('parent', function($query) use($categoriesInput) {
                        return $query->whereIn('id', $categoriesInput);
                    });
                })->orWherehas('category', function($query) use($categoriesInput) {
                    return $query->whereIn('id', $categoriesInput);
                });
            });
        }

        $products->where(function ($query) use($request) {
            if($subCategoriesInput = $request->input('subCategories')) {
                $query->whereHas('brand', function($query) use($subCategoriesInput) {
                    $query->whereHas('category', function($query) use($subCategoriesInput) {
                        return  $query->whereIn('id', $subCategoriesInput);
                    });
                });
            }

            if($brandsInput = $request->input('brands')) {
                $query->orWhereHas('brand', function($query) use($brandsInput) {
                        return  $query->whereIn('id', $brandsInput);
                });
            }
        });

        if($brandsInput = $request->input('brands')) {
            $products->whereHas('brand', function($query) use($brandsInput) {
                return  $query->whereIn('id', $brandsInput);
            });
        }

        $products = $products->get();

        return view('front.products.index', compact('categories', 'subCategories', 'brands', 'products'));
    }


    /**
     * @param $id
     * @return Factory|View
     */
    public function show($id) {
        $product = Product::findOrFail(decrypt($id));
        $product->load('brand.category.parent');

        return view('front.products.product-detail', compact('product'));
    }
}
