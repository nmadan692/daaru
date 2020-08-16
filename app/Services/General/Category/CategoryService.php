<?php


namespace App\Services\General\Category;


use App\Entities\Category;
use App\Services\BaseService;

class CategoryService extends BaseService
{
    public function model()
    {
        return Category::class;
    }

    /**
     * @param $categoryData
     */
    public function insertFromSeeder($categoryData) {
        $category = $this->updateOrCreate(['name' => $categoryData['name']], ['name' => $categoryData['name']]);
        if($subCategories = $categoryData['subCategories']) {
            foreach ($subCategories as $subCategoryData) {
                $subCategory = $category->children()->updateOrCreate(['name' => $subCategoryData['name']], ['name' => $subCategoryData['name']]);
                $this->insertBrandFromSeeder($subCategoryData, $subCategory);
            }
        }
        $this->insertBrandFromSeeder($categoryData, $category);
    }

    /**
     * @param $data
     * @param $category
     */
    public function insertBrandFromSeeder($data, $category) {
        if($brands = $data['brands']) {
            foreach ($brands as $brandData) {
                $brand = $category->brands()->updateOrCreate(['name' => $brandData['name']], ['name' => $brandData['name']]);
                if($products = $brandData['products']) {
                    foreach ($products as $productData) {
                        $brand->products()->updateOrCreate(['name' => $productData['name']], $productData);
                    }
                }
            }
        }
    }

}
