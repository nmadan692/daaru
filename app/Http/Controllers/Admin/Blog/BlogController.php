<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Services\General\Blog\BlogCategoryService;
use App\Services\General\Blog\BlogService;
use App\Services\General\DatatableService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * @var BlogCategoryService
     */
    private $blogCategoryService;
    /**
     * @var BlogService
     */
    private $blogService;
    /**
     * @var DatatableService
     */
    private $datatableService;

    /**
     * BlogController constructor.
     * @param BlogCategoryService $blogCategoryService
     * @param BlogService $blogService
     * @param DatatableService $datatableService
     */
    public function __construct(
        BlogCategoryService $blogCategoryService,
        BlogService $blogService,
        DatatableService $datatableService
    )
    {
        $this->blogCategoryService = $blogCategoryService;
        $this->blogService = $blogService;
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
            'editUrl' => 'admin.blog.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.blog.destroy',
            'deleteIcon' => 'fa fa-trash',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.blog.show',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'blogs',
            [
                [
                    'name' => 'blog_categories',
                    'first' => 'blogs.blog_category_id',
                    'second' => 'blog_categories.id',
                    'joins' => []
                ]

            ],
            [
                'blogs.id as id',
                'blog_categories.name as blog_category_name',
                'blogs.name as name',
                'description',
                'blogs.status as status'

            ],
            null,
            [],
            ['blogs.deleted_at']
        );
        $query->addIndexColumn();

        $query->editColumn('description', function ($data) {
            return  strip_tags(Str::limit($data->description,100));
        });
        $query->editColumn('status', function ($data) {
            $id = $data->id;
            $name = 'status';
            $checked = false;
            $disabled = false;
            if($data->status == 1) {
                $checked = true;
                $disabled = true;
            }
            return view('admin.blog.blog.switch', compact('name', 'disabled', 'checked', 'id'));
        });
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });

        $query->rawColumns(['description', 'status', 'action']);

        return $query->make(true);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategory = $this->blogCategoryService->all();
        return view('admin.blog.blog.create', compact( 'blogCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {

        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $resizedImage = Image::make($image);

        $storeData = array_merge(
            $request->all(),
            [
                'image' => Storage::putFileAs('blog/images/', $image, $image_name)
            ]
        );
        Storage::put('200x300/blog/images/'.$image_name, $resizedImage->resize(200,300)->encode());
        Storage::put('300x400/blog/images/'.$image_name, $resizedImage->resize(300,400)->encode());
        $this->blogService->create($storeData);

        return redirect()->route('admin.blog.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = $this->blogService->findOrFail($id);

        return view('admin.blog.blog.show', compact('blog'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blogService->findOrFail($id);
        $blogCategory = $this->blogCategoryService->all();

        return view('admin.blog.blog.edit', compact('blog', 'blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $updateData = $request->all();
        if($request->file('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $updateData = array_merge(
                $updateData,
                [
                    'image' => Storage::putFileAs('blog/images', $image, $image_name)
                ]);
        }
        $blog = $this->blogService->findOrFail($id);
        $this->blogService->update($id, $updateData);
        $oldImage = $blog->image;
        if($oldImage && $request->file('image')) {
            Storage::delete($oldImage);
        }

        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogService->findOrFail($id)->delete();
        return redirect()->route('admin.blog.index');
    }

    public function changeStatus($id) {
        $test = $this->blogService->findOrFail($id);
        DB::beginTransaction();
        // event(new TestPublished($test));
        $test->status = !$test->status;
        $test->save();
        DB::commit();

        return;
    }
}
