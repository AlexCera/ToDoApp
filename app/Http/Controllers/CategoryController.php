<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:categories|max:255',
            'color' => 'required|max:7'
        ]);
        $category = new Category();
        $category->name = $req->name;
        $category->color = $req->color;
        $category->save();
        return redirect("categories.index")->with('success', 'Category added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('category.show', ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $category = Category::find($id);

        $req->validate([
            'name' => 'required|unique:categories|max:255',
            'color' => 'required|max:7'
        ]);

        $category->name = $req->name;
        $category->color = $req->color;
        $category->save();
        
        return redirect()->route("categories.index")->with('success', 'Category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->Tasks()->each(function ($task){
            $task->delete();
        });
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted');
    }
}
