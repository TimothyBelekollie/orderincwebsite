<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    //
     // Display a listing of the resource
     public function index()
     {
         $categories = BlogCategory::all();
         return view('backend.blogcategories.index', compact('categories'));
     }

     // Show the form for creating a new resource
     public function create()
     {
         return view('backend.blogcategories.create');
     }

     // Store a newly created resource in storage
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'is_active' => 'required|boolean',
         ]);

         BlogCategory::create($request->all());

         return redirect()->route('backend.blogcategories.index')->with('success', 'Blog category created successfully.');
     }

     // Display the specified resource
     public function show($id)
     {
         $category = BlogCategory::findOrFail($id);
         return view('backend.blogcategories.show', compact('category'));
     }

     // Show the form for editing the specified resource
     public function edit($id)
     {
         $category = BlogCategory::findOrFail($id);
         return view('backend.blogcategories.edit', compact('category'));
     }

     // Update the specified resource in storage
     public function update(Request $request, $id)
     {
         $category = BlogCategory::findOrFail($id);

         $request->validate([
             'name' => 'required|string|max:255',
             'is_active' => 'required|boolean',
         ]);

         $category->update($request->all());

         return redirect()->route('backend.blogcategories.index')->with('success', 'Blog category updated successfully.');
     }

     // Remove the specified resource from storage
     public function destroy($id)
     {
         $category = BlogCategory::findOrFail($id);
         $category->delete();

         return redirect()->route('backend.blogcategories.index')->with('success', 'Blog category deleted successfully.');
     }
}
