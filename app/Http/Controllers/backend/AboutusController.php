<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutusController extends Controller
{
    //
     // Display a listing of the resource
     public function index()
     {
         $aboutUs = AboutUs::all();
         return view('backend.aboutus.index', compact('aboutUs'));
     }

     // Show the form for creating a new resource
     public function create()
     {
         return view('backend.aboutus.create');
     }

     // Store a newly created resource in storage
     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required|string',
             'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'vision' => 'nullable|string',
             'mission' => 'nullable|string',
             'values' => 'nullable|string',
             'is_active' => 'required|boolean',
         ]);

         $data = $request->all();


         if($request->file('image_path')){
            $file=$request->file('image_path');

            $filename=date('YmdHi').$file->getClientOriginalName();// 2223222.png
            $file->move(public_path('images/aboutus'),$filename);
            $data['image_path']=$filename;

        }


         AboutUs::create($data);

         return redirect()->route('aboutus.index')->with('success', 'About Us entry created successfully.');
     }

     // Display the specified resource
     public function show($id)
     {
         $aboutUs = AboutUs::findOrFail($id);
         return view('aboutus.show', compact('aboutUs'));
     }

     // Show the form for editing the specified resource
     public function edit($id)
     {
         $aboutUs = AboutUs::findOrFail($id);
         return view('backend.aboutus.edit', compact('aboutUs'));
     }

     // Update the specified resource in storage
     public function update(Request $request, $id)
     {
         $aboutUs = AboutUs::findOrFail($id);

         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required|string',
             'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'vision' => 'nullable|string',
             'mission' => 'nullable|string',
             'values' => 'nullable|string',
             'is_active' => 'required|boolean',
         ]);

         $data = $request->all();


         if ($request->file('image_path')) {
            $file = $request->file('image_path');

            // Delete the old image if it exists
            if ($aboutus->photo && file_exists(public_path('images/aboutus/' . $aboutus->image_path))) {
                @unlink(public_path('images/aboutus/' . $aboutus->image_path));
            }

            // Save the new image
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName(); // Unique filename
            $file->move(public_path('images/aboutus/'), $filename);
            $data['image_path'] = $filename;
        }



         $aboutUs->update($data);

         return redirect()->route('backend.aboutus.index')->with('success', 'About Us entry updated successfully.');
     }

     // Remove the specified resource from storage
     public function destroy($id)
     {
         $aboutUs = AboutUs::findOrFail($id);


         if ($aboutus->image_path) {

            @unlink(public_path('images/aboutus/'.$aboutUs->image_path));
        }

         $aboutUs->delete();

         return redirect()->route('backend.aboutus.index')->with('success', 'About Us entry deleted successfully.');
     }
}
