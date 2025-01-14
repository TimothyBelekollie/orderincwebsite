@extends('backend.layout.master')
@section('backend')

 <!-- BEGIN: Content -->
 <div class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-slate-100 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">
    <div class="intro-y mt-8 flex items-center">
        <h2 class="mr-auto text-lg font-medium">Update Carousel</h2>
        <div>
            <a href="{{route('backend.carousels.index')}}" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mt-5">Back</a>
        </div>
    </div>

    <div class="mt-5 grid grid-cols-12 gap-6">


{{-- start here --}}
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Vertical Form -->
            <div class="preview-component intro-y box">
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                      Carousel Form
                    </h2>

                </div>

                <form action="{{ route('backend.carousels.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="p-5">
                        <div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
                            <!-- Title -->
                            <div>
                                <label for="vertical-form-1" class="inline-block mb-2">Title</label>
                                <input name="title" value="{{ old('title', $carousel->title) }}" id="vertical-form-1" type="text" class="transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md">
                                @error("title")
                                <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="vertical-form-1" class="inline-block mb-2">Description</label>
                                <input name="description" value="{{ old('description', $carousel->description) }}" id="vertical-form-1" type="text" class="transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md">
                                @error("description")
                                <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div>
                                <label for="vertical-form-1" class="inline-block mb-2">Carousel Image</label>
                                <input name="image_path" id="vertical-form-1" type="file" class="transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md">
                                @error("image_path")
                                <p style="color:red;">{{ $message }}</p>
                                @enderror

                                <!-- Show existing image -->
                                @if ($carousel->image_path)
                                <div class="mt-3">
                                    <img src="{{asset('images/carousels/'.$carousel->image_path)}}" alt="Existing Image" class="w-32 h-20 object-cover">
                                </div>
                                @endif
                            </div>

                            <!-- Active Status -->
                            <div class="mt-3">
                                <label>Active Status</label>
                                <div class="flex items-center mt-2">
                                    <input name="is_active" type="checkbox" {{ $carousel->is_active ? 'checked' : '' }} class="transition-all duration-100 ease-in-out shadow-sm">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 bg-primary text-white mt-5">
                                Update Carousel
                            </button>
                        </div>
                    </div>
                </form>

<!-- END: Content -->


@endsection

