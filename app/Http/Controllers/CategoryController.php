<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return 'categoy create';
        return view('categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $validated = $request->validate([
            'name' => 'required | unique:categories'
        ]);
        $newcat = Category::create($validated);
        return ($newcat) ? back()->with('success', "New Category ($newcat->name) Created Successfully")
        :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return 'categoy show';
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // $categories = Category::all();
        return view('categories.edit', compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // return 'categoy update';
        $dataInput = $request->validate([
            'name' => 'required | unique:categories'
        ]);
        $stat = $category->update($dataInput);
        return $stat ? back()->with('success', 'Update successful')
        :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // return 'categoy destroy';
        $category_name =  $category->name;
        $deleted  = $category->delete();
        return ($deleted) ? back()->with('success', "$category_name deleted Successfully")
        :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }
}
