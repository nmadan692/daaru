<?php

namespace App\Http\Controllers\Admin\Category;

use App\Entities\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\General\category\CategoryService;
use App\Services\General\DatatableService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    private $categoryService;
    /**
     * @var DatatableService
     */
    private $datatableService;

    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     * @param DatatableService $datatableService
     */
    public function __construct(
        CategoryService $categoryService,
        DatatableService $datatableService
    )
    {

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
            'editUrl' => 'admin.category.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.category.destroy',
            'deleteIcon' => 'fa fa-trash',
            'deleteClass' => '',
            'view' => false,
            'viewUrl' => 'admin.category.show',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'categories',
            null,
            [
                'id',
                'name',
                'status'
            ],
            null,
            [],
            ['parent_id','categories.deleted_at']
        );
        $query->editColumn('status', function ($data) {
            $id = $data->id;
            $name = 'status';
            $checked = false;
            $disabled = false;
            if($data->status == 1) {
                $checked = true;
                $disabled = true;
            }
            return view('admin.category.switch', compact('name', 'disabled', 'checked', 'id'));
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
    public function index() {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryService->create($request->all());

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryService->findOrFail($id);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryService->findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryService->update($id, $request->all());

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->findOrFail($id)->delete();
        return redirect()->route('admin.category.index');
    }


    public function changeStatus($id) {
        $test = $this->categoryService->findOrFail($id);
        DB::beginTransaction();
        // event(new TestPublished($test));
        $test->status = !$test->status;
        $test->save();
        DB::commit();

        return;
    }
}
