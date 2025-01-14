<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;

class CarouselController extends Controller
{
    //
 // Display a listing of the resource
 public function index()
 {
     $carousels = Carousel::all();
     return view('backend.carousels.index', compact('carousels'));
 }

 // Show the form for creating a new resource
 public function create()
 {
     return view('backend.carousels.create');
 }

 // Store a newly created resource in storage
 public function store(Request $request)
 {
     $request->validate([
         'title' => 'required|string|max:255',
         'description' => 'required|string',
         'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         'is_active' => 'nullable|boolean',
     ]);

     $data = $request->all();

    //  // Handle image upload
    //  if ($request->hasFile('image_path')) {
    //      $data['image_path'] = $request->file('image_path')->store('images/carousels', 'public');
    //  }

     if($request->file('image_path')){
        $file=$request->file('image_path');

        $filename=date('YmdHi').$file->getClientOriginalName();// 2223222.png
        $file->move(public_path('images/carousels'),$filename);
        $data['image_path']=$filename;

    }

     Carousel::create($data);

     return redirect()->route('backend.carousels.index')->with('success', 'Carousel created successfully.');
 }

 // Display the specified resource
 public function show($id)
 {
     $carousel = Carousel::findOrFail($id);
     return view('backend.carousels.show', compact('carousel'));
 }

 // Show the form for editing the specified resource
 public function edit($id)
 {
     $carousel = Carousel::findOrFail($id);
     return view('backend.carousels.edit', compact('carousel'));
 }

//  // Update the specified resource in storage
//  public function update(Request $request, $id)
//  {
//      $carousel = Carousel::findOrFail($id);

//      $validated = $request->validate([
//          'title' => 'required|string|max:255',
//          'description' => 'required|string',
//          'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//          'is_active' => 'nullable|boolean',
//      ]);

//      $carousel->title = $validated['title'];
//      $carousel->description = $validated['description'];
//      $carousel->is_active = $request->has('is_active') ? $validated['is_active'] : false;

//      if ($file = $request->file('image_path')) {
//          if ($carousel->image_path && file_exists(public_path('images/carousels/' . $carousel->image_path))) {
//              @unlink(public_path('images/carousels/' . $carousel->image_path));
//          }

//          $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
//          $file->move(public_path('images/carousels'), $filename);
//          $carousel->image_path = $filename;
//      }

//      $carousel->save();

//      return redirect()->route('backend.carousels.index')->with('success', 'Carousel updated successfully.');
//  }

 public function update(Request $request, $id)
 {
     $carousel = Carousel::findOrFail($id);

     $validated = $request->validate([
         'title' => 'required|string|max:255',
         'description' => 'required|string',
         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
     ]);



     // Handle image upload
 if ($request->file('image_path')) {
     $file = $request->file('image_path');

     // Delete the old image if it exists
     if ($carousel->image_path && file_exists(public_path('images/carousels/' . $carousel->image_path))) {
         @unlink(public_path('images/carousels/' . $carousel->image));
     }

     // Save the new image
     $filename = date('YmdHi') . $file->getClientOriginalName(); // e.g., 20241120_image.png
     $file->move(public_path('images/carousels'), $filename);
     $validated['image_path'] = $filename; // Corrected this line
 }


     $carousel->update($validated);

     return redirect()->route('backend.carousels.index')->with('success', 'Carousel items updated successfully.');
 }



 // Remove the specified resource from storage
 public function destroy($id)
 {
     $carousel = Carousel::findOrFail($id);

     // Delete associated image if exists

     if ($carousel->image_path) {

        @unlink(public_path('images/carousels/'.$carousel->image_path));
    }
     $carousel->delete();

     return redirect()->route('backend.carousels.index')->with('success', 'Carousel deleted successfully.');
 }
}
