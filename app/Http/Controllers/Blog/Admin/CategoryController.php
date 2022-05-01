<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginator = BlogCategory::paginate(5);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $item = BlogCategory::findOrFail($id);
        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        // Validation
        $rules = [
            'title' => 'required|min:5|max:200',
            'slug' => 'max:200',
            'description' => 'string|min:3|max:500',
            'parent_id' => 'integer|required|exists:blog_categories,id'
        ];

        // 1.
//        $validatedData = $this->validate($request, $rules);

        // 2.
        $validatedData = $request->validate($rules);

        // 3.
//        $validator = \Validator::make($request->all(), $rules);
//        $validatedData['passes'] = $validator->passes();
//        $validatedData['valid'] = $validator->valid();
//        $validatedData['failed'] = $validator->failed();
//        $validatedData['errors'] = $validator->errors();
//        $validatedData['fails'] = $validator->fails();
//        $validatedData['validate'] = $validator->validate();

//        dd($validatedData);

        $item = BlogCategory::find($id);
        if(empty($item)){
            return back()
                ->withErrors(['message' => "Запись с id=$id не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $result = $item->fill($data)->save();

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
