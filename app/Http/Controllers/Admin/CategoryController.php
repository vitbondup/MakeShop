<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $roots = Category::roots();
        return view('admin.category.index', compact('roots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $parents = Category::roots();
        return view('admin.category.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'parent_id' => 'integer',
            'name' => 'required|max:100',
            'slug' => 'required|max:100|unique:categories,slug|alpha_dash',
            'image' => 'mimes:jpeg,jpg,png|max:5000'
        ]);
        $category = Category::create($request->all());
        return redirect()
            ->route('admin.category.show', ['category' => $category->id])
            ->with('success', 'Нова категорія успішно створена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category) {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category) {
        $parents = Category::roots();
        return view('admin.category.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category) {
        $id = $category->id;
        $this->validate($request, [
            'parent_id' => 'integer',
            'name' => 'required|max:100',
            'slug' => 'required|max:100|unique:categories,slug,'.$id.',id|alpha_dash',
            'image' => 'mimes:jpeg,jpg,png|max:5000'
        ]);
        $category->update($request->all());
        return redirect()
            ->route('admin.category.show', ['category' => $category->id])
            ->with('success', 'Категорія була успішно виправлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) {
        if ($category->children->count()) {
            $errors[] = 'Неможна видалити категорію, яка має дочірні категорії';
        }
        if ($category->products->count()) {
            $errors[] = 'Не можна видалити категорію, яка містить товари';
        }
        if (!empty($errors)) {
            return back()->withErrors($errors);
        }
        $category->delete();
        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Категорія каталога була успішно видалена');
    }
}
