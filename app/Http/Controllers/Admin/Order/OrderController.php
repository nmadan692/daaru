<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\DefaultCity\DefaultCityService;
use App\Services\General\OrderService;
use App\Services\General\UserService;
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
     * @var UserService
     */
    private $userService;
    /**
     * @var DefaultCityService
     */
    private $defaultCityService;

    /**
     * OrderController constructor.
     * @param OrderService $orderService
     * @param DatatableService $datatableService
     * @param UserService $userService
     * @param DefaultCityService $defaultCityService
     */
    public function __construct(
        OrderService $orderService,
        DatatableService $datatableService,
        UserService $userService,
        DefaultCityService $defaultCityService
    )
    {
        $this->orderService = $orderService;
        $this->datatableService = $datatableService;
        $this->userService = $userService;
        $this->defaultCityService = $defaultCityService;
    }

    public function list()
    {
        $actionData = [
            'icon' => true,
            'text' => false,
            'edit' => false,
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
                'orders.created_at as ordered_date',
                'orders.status as status',
                'orders.payment_status as payment_status',
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
            [
                'orders.city_id' => $this->defaultCityService->get('id')
            ],
            ['orders.deleted_at']
        );
        $query->editColumn('invoice_number', function ($data) {
            $start = 100000;
            $invoiceNumber = $start + $data->id;

            return 'DA-' . $invoiceNumber;
        });
        $query->editColumn('product_name', function ($data) {
            if ($data->product_name) {
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
            if ($data->quantity) {
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
            if ($data->amount) {
                $returnData = 0;
                foreach (explode(',', $data->amount) as $amount) {
                    $returnData += $amount;
                }

                return 'Nrs ' . $returnData;
            }
            return 'Nrs 0';
        });

        $query->editColumn('product_name', function ($data) {
            if ($data->product_name) {
                $returnData = '<ul>';
                foreach (explode(',', $data->product_name) as $product) {
                    $returnData .= '<li>' . $product . '</li>';
                }
                $returnData .= '</ul>';

                return $returnData;
            }
            return '';
        });
        $query->addColumn('status', function ($data) {
            $datas = getOrderConstants();
            $value = $data->status;
            $id = $data->id;
            return view('admin.order.status', compact('datas', 'value', 'id'));
        });
        $query->addColumn('payment_status', function ($data) {
            $datas = getPaymentConstants();
            $value = $data->payment_status;
            $id = $data->id;
            return view('admin.order.payment-status', compact('datas', 'value', 'id'));
        });
        $query->addColumn('full_name', function ($data) {
            return $data->first_name . ' ' . $data->last_name;
        });
        $query->addColumn('action', function ($data) use ($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->rawColumns(['full_name', 'product_name', 'quantity', 'status', 'action', 'invoice_number']);
        $query->filterColumn('invoice_number', function ($query, $keyword) {
            $keyword = explode('-', $keyword);
            if (isset($keyword[1])) {
                $keyword = $keyword[1];
                $keyword = (int)$keyword - 100000;
                $sql = "orders.id  like ?";
                $query->whereRaw($sql, ["{$keyword}"]);
            }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderService->findOrFail($id)->load('products');
        $user = $this->userService->findOrFail($order->user_id);

        return view('admin.order.invoice', compact('order', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->status) {
            $request->status = (int) $request->status;
        }
        $update = $this->orderService->update($id, $request->all());

        if($request->ajax()) {
            return response()->json(['message' =>'successfully']);
        }
        return redirect()->route('admin.order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orderService->findOrFail($id)->delete();

        return redirect()->route('admin.order.index');
    }
}
