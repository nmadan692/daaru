<?php

use App\Services\General\Category\CategoryService;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * ProductSeeder constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'name' => 'Whisky',
                'brands' => [],
                'subCategories' => [
                    [
                        'name' => 'Premium Whisky',
                        'brands' => [
                            [
                                'name' => '100 Pipers',
                                'products' => [
                                    [
                                        'name' => '100 Pipers 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'discount' => 0,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => '100 Pipers 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => '100 Pipers 500 ml',
                                        'volume' => '500 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => '100 Pipers 600 ml',
                                        'volume' => '600 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Aberlour',
                                'products' => [
                                    [
                                        'name' => 'Aberlour 100 ml',
                                        'volume' => '100 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Aberlour 200 ml',
                                        'volume' => '200 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 2000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Aberlour 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Aberlour 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],

                                ]
                            ],
                            [
                                'name' => 'Ardbeg',
                                'products' => [
                                    [
                                        'name' => 'Ardbeg 100 ml',
                                        'volume' => '100 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1200,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ardbeg 200 ml',
                                        'volume' => '200 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 2400,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ardbeg 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3600,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ardbeg 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4800,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                ]
                            ]

                        ]
                    ],
                    [
                        'name' => 'Bourbon Whisky',
                        'brands' => [
                            [
                                'name' => 'Ardmore',
                                'products' => [
                                    [
                                        'name' => 'Ardmore 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'discount' => 0,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ardmore 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ardmore 500 ml',
                                        'volume' => '500 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ardmore 600 ml',
                                        'volume' => '600 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                ]

                            ],
                            [
                                'name' => 'Auchentoshan',
                                'products' => [
                                    [
                                        'name' => 'Auchentoshan 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'discount' => 0,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Auchentoshan 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Auchentoshan 500 ml',
                                        'volume' => '500 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Auchentoshan 600 ml',
                                        'volume' => '600 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 6000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                ]

                            ],
                            [
                                'name' => 'Ballantines',
                                'products' => [
                                    [
                                        'name' => 'Ballantines 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'discount' => 0,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ballantines 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ballantines 500 ml',
                                        'volume' => '500 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ballantines 600 ml',
                                        'volume' => '600 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                ]
                            ]

                        ]
                    ],
                    [
                        'name' => 'Malt Whisky',
                        'brands' => [
                            [
                                'name' => 'Black & White',
                                'products' => [
                                    [
                                        'name' => 'Black & White 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'discount' => 0,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Black & White 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Black & White 500 ml',
                                        'volume' => '500 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Black & White 600 ml',
                                        'volume' => '600 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                ]

                            ],
                            [
                                'name' => 'Black Oak',
                                'products' => [
                                    [
                                        'name' => 'Black Oak 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'discount' => 0,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Black Oak 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Black Oak 500 ml',
                                        'volume' => '500 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Black Oak 600 ml',
                                        'volume' => '600 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                ]

                            ],
                            [
                                'name' => 'Blenders Pride',
                                'products' => [
                                    [
                                        'name' => 'Blenders Pride 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'discount' => 0,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Blenders Pride 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Blenders Pride 500 ml',
                                        'volume' => '500 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Blenders Pride 600 ml',
                                        'volume' => '600 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                ]

                            ]

                        ]
                    ],
                ]
            ],
            [
                'name' => 'Vodka',
                'brands' => [],
                'subCategories' => [
                    [
                        'name' => 'Regular Vodka',
                        'brands' => [
                            [
                                'name' => '8848',
                                'products' => [
                                    [
                                        'name' => '8848 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'discount' => 0,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => '8848 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => '8848 500 ml',
                                        'volume' => '500 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => '8848 600 ml',
                                        'volume' => '600 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Ruslan',
                                'products' => [
                                    [
                                        'name' => 'Ruslan 100 ml',
                                        'volume' => '100 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ruslan 200 ml',
                                        'volume' => '200 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 2000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ruslan 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ruslan 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],

                                ]
                            ],
                            [
                                'name' => 'Xing',
                                'products' => [
                                    [
                                        'name' => 'Xing 100 ml',
                                        'volume' => '100 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1200,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Xing 200 ml',
                                        'volume' => '200 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 2400,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Xing 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3600,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Xing 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4800,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Premium Vodka',
                        'brands' => [
                            [
                                'name' => 'Greygoose',
                                'products' => [
                                    [
                                        'name' => 'Greygoose 100 ml',
                                        'volume' => '100 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Greygoose 200 ml',
                                        'volume' => '200 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 2000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Greygoose 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Greygoose 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],

                                ]
                            ],
                            [
                                'name' => 'Belvendere Pure',
                                'products' => [
                                    [
                                        'name' => 'Belvendere Pure 100 ml',
                                        'volume' => '100 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Belvendere Pure 200 ml',
                                        'volume' => '200 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 2000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Belvendere Pure 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Belvendere Pure 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],

                                ]
                            ],
                            [
                                'name' => 'Smirnoff',
                                'products' => [
                                    [
                                        'name' => 'Smirnoff 100 ml',
                                        'volume' => '100 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Smirnoff 200 ml',
                                        'volume' => '200 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 2000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Smirnoff 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Smirnoff 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],

                                ]
                            ]

                        ]
                    ],
                    [
                        'name' => 'Domestic Vodka',
                        'brands' => [
                            [
                                'name' => 'Fashion',
                                'products' => [
                                    [
                                        'name' => 'Fashion 100 ml',
                                        'volume' => '100 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Fashion 200 ml',
                                        'volume' => '200 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 2000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Fashion 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Fashion 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],

                                ]
                            ],
                            [
                                'name' => 'Ciroc',
                                'products' => [
                                    [
                                        'name' => 'Ciroc 100 ml',
                                        'volume' => '100 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ciroc 200 ml',
                                        'volume' => '200 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 2000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ciroc 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Ciroc 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],

                                ]
                            ],
                            [
                                'name' => 'Eristoff',
                                'products' => [
                                    [
                                        'name' => 'Eristoff 100 ml',
                                        'volume' => '100 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 1000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Eristoff 200 ml',
                                        'volume' => '200 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 2000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Eristoff 300 ml',
                                        'volume' => '300 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 3000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],
                                    [
                                        'name' => 'Eristoff 400 ml',
                                        'volume' => '400 ml',
                                        'country' => 'Nepal',
                                        'alcohol' => 10,
                                        'description' => 'This is a description.',
                                        'price' => 4000,
                                        'is_percent' => true,
                                        'quantity' => 100
                                    ],

                                ]
                            ]

                        ]
                    ],
                ]
            ],
            [
                'name' => 'Tequilla',
                'subCategories' => [],
                'brands' => [
                    [
                        'name' => 'Tatron',
                        'products' => [
                            [
                                'name' => 'Tatron 300 ml',
                                'volume' => '300 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 1000,
                                'discount' => 0,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                            [
                                'name' => 'Tatron 400 ml',
                                'volume' => '400 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 3000,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                            [
                                'name' => 'Tatron 500 ml',
                                'volume' => '500 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 3000,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                            [
                                'name' => 'Tatron 600 ml',
                                'volume' => '600 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 4000,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                        ]
                    ],
                    [
                        'name' => 'Olmeca',
                        'products' => [
                            [
                                'name' => 'Olmeca 100 ml',
                                'volume' => '100 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 1000,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                            [
                                'name' => 'Olmeca 200 ml',
                                'volume' => '200 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 2000,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                            [
                                'name' => 'Olmeca 300 ml',
                                'volume' => '300 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 3000,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                            [
                                'name' => 'Olmeca 400 ml',
                                'volume' => '400 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 4000,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                        ]
                    ],
                    [
                        'name' => 'Camino',
                        'products' => [
                            [
                                'name' => 'Camino 100 ml',
                                'volume' => '100 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 1200,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                            [
                                'name' => 'Camino 200 ml',
                                'volume' => '200 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 2400,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                            [
                                'name' => 'Camino 300 ml',
                                'volume' => '300 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 3600,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                            [
                                'name' => 'Camino 400 ml',
                                'volume' => '400 ml',
                                'country' => 'Nepal',
                                'alcohol' => 10,
                                'description' => 'This is a description.',
                                'price' => 4800,
                                'is_percent' => true,
                                'quantity' => 100
                            ],
                        ]
                    ]
                ]
            ],
        ];

        foreach ($categories as $category) {
            $this->categoryService->insertFromSeeder($category);
        }
    }
}
