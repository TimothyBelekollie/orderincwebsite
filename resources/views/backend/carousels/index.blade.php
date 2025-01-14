@extends('backend.layout.master')

@section("backend")

<div class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-slate-100 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">



    <div class="mt-5 grid grid-cols-12 gap-6">


        <div class="intro-y col-span-12 lg:col-span-12">


            <!-- BEGIN: Responsive Table -->
            <div class="preview-component intro-y box mt-5">
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                       Carousel Table
                    </h2>
                    @if(session('success'))
                    <div class="alert alert-success" style="color: green;">
                        {{ session('success') }}
                    </div>
                    @endif
<div>
    <a href="{{route('backend.carousels.create')}}"class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mt-5">Add New Carousel</a>
</div>
                </div>
                <div class="p-5">
                    <div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
                        <div class="overflow-x-auto">
                            <table data-tw-merge="" class="w-full text-left">
                                <thead data-tw-merge="" class="">
                                    <tr data-tw-merge="" class="">
                                        <th data-tw-merge="" class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                                            #
                                        </th>
                                        <th data-tw-merge="" class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                                           Title
                                        </th>
                                        <th data-tw-merge="" class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                                            Description
                                        </th>
                                        <th data-tw-merge="" class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                                           Image
                                        </th>
                                        <th data-tw-merge="" class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                                           Status
                                        </th>

                                        <th data-tw-merge="" class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carousels as $key =>$carousel)


                                    <tr data-tw-merge="" class="">
                                        <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap">
                                           {{$key + 1}}
                                        </td>
                                        <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap">
                                           {{$carousel->title}}
                                        </td>
                                        <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap">
                                            {{$carousel->description}}
                                        </td>
                                        <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap">
                                           {{$carousel->image}}
                                           <img src="{{asset('images/carousels/'.$carousel->image_path)}}" alt="" style="width:100px; height:50px;">
                                        </td>
                                        <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap">
                                           {{$carousel->is_active}}

                                        <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-56 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600 before:absolute before:inset-y-0 before:left-0 before:my-auto before:block before:h-8 before:w-px before:bg-slate-200 before:dark:bg-darkmode-400">
                                            <div class="flex items-center justify-center">
                                                <a class="mr-3 flex items-center" href="{{route('backend.carousels.edit',$carousel->id)}}">
                                                    <i data-tw-merge="" data-lucide="check-square" class="stroke-1.5 mr-1 h-4 w-4"></i>
                                                    Edit
                                                </a>
                                                <a class="flex items-center text-danger" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" href="{{route('backend.carousels.destroy',$carousel->id)}}">
                                                    <i data-tw-merge="" data-lucide="trash" class="stroke-1.5 mr-1 h-4 w-4"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END: Responsive Table -->



        </div>
    </div>
</div>
@endsection
