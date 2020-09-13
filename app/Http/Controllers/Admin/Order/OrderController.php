<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $orderService;
    /**
     * @var DatatableService
     */
    private $datatableService;

    /**
     * OrderController constructor.
     * @param OrderService $orderService
     * @param DatatableService $datatableService
     */
    public function __construct(
        OrderService $orderService,
        DatatableService $datatableService
    )
    {
        $this->orderService = $orderService;
        $this->datatableService = $datatableService;
    }

    public function list() {
        $actionData = [
            'icon' => true,
            'text' => false,
            'edit' => true,
            'editUrl' => 'admin.order.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.order.destroy',
            'deleteIcon' => 'fa fa-trash',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.order.show',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'orders',
            [
                [
                    'name' => 'users',
                    'first' => 'users.id',
                    'second' => 'orders.user_id',
                    'joins' => []
                ],
                [
                    'name' => 'order_products',
                    'first' => 'orders.id',
                    'second' => 'order_products.order_id',
                    'joins' => [
                    ]
                ],
                [
                    'name' => 'products',
                    'first' => 'products.id',
                    'second' => 'order_products.product_id',
                    'joins' => [
                    ]
                ]
            ],
            [
                'orders.id as id',
                'orders.status as status',
                'users.first_name as first_name',
                'users.last_name as last_name',
                'users.phone as phone',
                'users.address_1 as address1',
                'users.address_2 as address2',
                DB::raw('group_concat(order_products.amount) as amount'),
                DB::raw('group_concat(order_products.quantity) as quantity'),
                'order_products.product_id',
                DB::raw('group_concat(products.name) as product_name'),
            ],
            'orders.id',
            []
        );
        $query->editColumn('product_name', function ($data) {
            if($data->product_name) {
                $returnData = '<ul>';
                foreach (explode(',', $data->product_name) as $product) {
                    $returnData .= '<li>' . $product . '</li>';
                }
                $returnData .= '</ul>';

                return $returnData;
            }
            return '';
        });
        $query->editColumn('quantity', function ($data) {
            if($data->quantity) {
                $returnData = '<ul>';
                foreach (explode(',', $data->quantity) as $quantity) {
                    $returnData .= '<li>' . $quantity . '</li>';
                }
                $returnData .= '</ul>';

                return $returnData;
            }
            return 0;
        });
        $query->editColumn('amount', function ($data) {
            if($data->amount) {
                $returnData = 0;
                foreach (explode(',', $data->amount) as $amount) {
                    $returnData += $amount;
                }

                return 'Nrs '. $returnData;
            }
            return 'Nrs 0';
        });

        $query->editColumn('product_name', function ($data) {
            if($data->product_name) {
                $returnData = '<ul>';
                foreach (explode(',', $data->product_name) as $product) {
                    $returnData .= '<li>' . $product . '</li>';
                }
                $returnData .= '</ul>';

                return $returnData;
            }
            return '';
        });
//        $query->addColumn('address', function ($data) {
//            return $data->address1. ', ' . $data->address2;
//        });
        $query->addColumn('full_name', function ($data) {
            return $data->first_name. ' ' . $data->last_name;
        });
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->rawColumns(['full_name', 'product_name', 'quantity']);

        return $query->make();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
