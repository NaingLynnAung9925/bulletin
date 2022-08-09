<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Contracts\Services\Category\CategoryServiceInterface;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->getCategoryList();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    public function createConfirm(CategoryRequest $request)
    {
        $category = $this->categoryService->getCategoryConfirm($request);
        return view('categories.create_confirm', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->getCategoryCreate($request);
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryService->categoryEdit($id);
        return view('categories.edit', compact('category'));
    }

    public function editConfirm(CategoryRequest $request)
    {
        $category = $this->categoryService->categoryEditConfirm($request);
        return view('categories.edit_confirm', compact('category'));
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
        $this->categoryService->categoryUpdate($request, $id);
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->categoryDelete($id);
        return redirect()->route('category.index')->with('error', 'Category deleted successfully');
    }
}
