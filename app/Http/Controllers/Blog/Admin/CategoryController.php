<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * @var BlogCategoryRepository
     */
    private BlogCategoryRepository $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.categories.create', compact('item', 'categoryList'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BlogCategoryCreateRequest  $request
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();

        // Generate slug if it's empty
        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // 1.
        // $item = (new BlogCategory())->create($data);

        // 2.
        $item = new BlogCategory($data);
        $item->save();

        if($item->exists) {
            return redirect()->route('blog.admin.categories.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['message' => 'Не удалось сохранить'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int  $id
     * @param BlogCategoryRepository $categoryRepository
     */
    public function edit(int $id, BlogCategoryRepository $categoryRepository)
    {
//        $item = BlogCategory::findOrFail($id);
//        $categoryList = BlogCategory::all();

        // Use repository pattern
        $item = $categoryRepository->getEdit($id);
        $categoryList = $categoryRepository->getForComboBox();

        if(empty($item)) abort(404);

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\BlogCategoryUpdateRequest  $request
     * @param  int  $id
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        // Validation
        /* $rules = [
            'title' => 'required|min:5|max:200',
            'slug' => 'max:200',
            'description' => 'string|min:3|max:500',
            'parent_id' => 'integer|required|exists:blog_categories,id'
        ]; */

        // 1.
        // $validatedData = $this->validate($request, $rules);

        // 2.
        // $validatedData = $request->validate($rules);

        // 3.
        /* $validator = \Validator::make($request->all(), $rules);
        $validatedData['passes'] = $validator->passes();
        $validatedData['valid'] = $validator->valid();
        $validatedData['failed'] = $validator->failed();
        $validatedData['errors'] = $validator->errors();
        $validatedData['fails'] = $validator->fails();
        $validatedData['validate'] = $validator->validate(); */
//        dd($validatedData);

//        $item = BlogCategory::find($id);
        $item = $this->blogCategoryRepository->getEdit($id);

        if(empty($item)){
            return back()
                ->withErrors(['message' => "Запись с id=$id не найдена"])
                ->withInput();
        }

        $data = $request->all();

        // Generate slug if it's empty
        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

//        $result = $item->fill($data)->save();
        $result = $item->update($data);

        if($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['message' => "Произошла ошибка при сохранении данных"])
                ->withInput();
        }
    }
}
