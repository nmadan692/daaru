<?php

use App\School\Constants\MenuGroupConstant;
use App\Services\General\MenuService;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * @var MenuService
     */
    private $menuService;

    /**
     * MenuTableSeeder constructor.
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'order' => 1,
                'status' => true,
                'route' => 'admin.home',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Category',
                'slug' => 'category',
                'order' => 2,
                'status' => true,
                'route' => 'admin.category.index',
                'icon' => 'm-menu__link-icon fa fa-box',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Sub Category',
                'slug' => 'subcategory',
                'order' => 3,
                'status' => true,
                'route' => 'admin.subcategory.index',
                'icon' => 'm-menu__link-icon fa fa-box',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Brand',
                'slug' => 'brad',
                'order' => 4,
                'status' => true,
                'route' => 'admin.brand.index',
                'icon' => 'm-menu__link-icon flaticon-layers',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Product',
                'slug' => 'product',
                'order' => 5,
                'status' => true,
                'route' => 'admin.product.index',
                'icon' => 'm-menu__link-icon fa fa-cart-plus ',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Blog Category',
                'slug' => 'blogcategory',
                'order' => 6,
                'status' => true,
                'route' => 'admin.blog.category.index',
                'icon' => 'm-menu__link-icon fa fa-box',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Blog',
                'slug' => 'blog',
                'order' => 7,
                'status' => true,
                'route' => 'admin.blog.index',
                'icon' => 'm-menu__link-icon fa fa-blogger',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Setting',
                'slug' => 'setting',
                'order' => 8,
                'status' => true,
                'route' => 'admin.setting.index',
                'icon' => 'm-menu__link-icon fa fa-cog',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
        ];

        $this->menuService->truncate();

        foreach ($menus as $menu) {
            $this->menuService->updateOrCreate(['slug' => $menu['slug'], 'parent_id' => $menu['parent_id']], $menu);
        }
    }
}
