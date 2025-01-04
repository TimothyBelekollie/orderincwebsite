<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //
    // Display a listing of the resource
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blogs.index', compact('blogs'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('backend.blogs.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'content' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author_id' => 'required|integer|exists:users,id',
            'category_id' => 'required|integer|exists:blog_categories,id',
            'status' => 'required|string|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();

        // Generate a slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // // Handle image upload
        // if ($request->hasFile('image_path')) {
        //     $data['image_path'] = $request->file('image_path')->store('images/blogs', 'public');
        // }

        if($request->file('image_path')){
            $file=$request->file('image_path');

            $filename=date('YmdHi').$file->getClientOriginalName();// 2223222.png
            $file->move(public_path('images/blogs'),$filename);
            $validated['image_path']=$filename;

        }


        Blog::create($data);

        return redirect()->route('backend.blogs.index')->with('success', 'Blog created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blogs.show', compact('blog'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blogs.edit', compact('blog'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $id,
            'content' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author_id' => 'required|integer|exists:users,id',
            'category_id' => 'required|integer|exists:blog_categories,id',
            'status' => 'required|string|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();

        // // Handle image upload
        // if ($request->hasFile('image_path')) {
        //     // Delete old image if exists
        //     if ($blog->image_path) {
        //         \Storage::disk('public')->delete($blog->image_path);
        //     }

        //     $data['image_path'] = $request->file('image_path')->store('images/blogs', 'public');
        // }

        if ($request->file('image_path')) {
            $file = $request->file('image_path');

            // Delete the old image if it exists
            if ($aboutus->photo && file_exists(public_path('images/blogs/' . $aboutus->photo))) {
                @unlink(public_path('images/blogs/' . $aboutus->photo));
            }

            // Save the new image
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName(); // Unique filename
            $file->move(public_path('images/blogs/'), $filename);
            $validated['image_path'] = $filename;
        }


        $blog->update($data);

        return redirect()->route('backend.blogs.index')->with('success', 'Blog updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

      

        if ($aboutus->image_path) {

            @unlink(public_path('images/blogs/'.$blog->image_path));
        }


        $blog->delete();

        return redirect()->route('backend.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
