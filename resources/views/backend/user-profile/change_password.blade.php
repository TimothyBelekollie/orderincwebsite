@extends('backend.layout.master')
@section('backend')
@extends('backend.layout.master')
@section('backend')


 <!-- BEGIN: Content -->
 <div class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-slate-100 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">
    <div class="intro-y mt-8 flex items-center">
        <h2 class="mr-auto text-lg font-medium">Change Password</h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 flex flex-col-reverse lg:col-span-4 lg:block 2xl:col-span-3">
            <div class="intro-y box mt-5">
                <div class="relative flex items-center p-5">
                    <div class="image-fit h-12 w-12">
                        <img class="rounded-full" src="{{asset('backend/dist/images/neutral-human-head.png')}}" alt="Midone - Tailwind Admin Dashboard Template">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="text-base font-medium">
                           {{Auth::user()->name}}
                        </div>
                        <div class="text-slate-500">{{Auth::user()->email}}</div>
                    </div>

                </div>
                <div class="border-t border-slate-200/60 p-5 dark:border-darkmode-400">
                    <a class="flex items-center font-medium text-primary" href="{{route('backend.user-profile.show')}}">
                        <i data-tw-merge="" data-lucide="activity" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Personal
                        Information
                    </a>
                    <a class="mt-5 flex items-center" href="{{route('backend.user-profile.edit')}}">
                        <i data-tw-merge="" data-lucide="box" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Update Account
                    </a>
                    <a class="mt-5 flex items-center" href="{{route('backend.user-profile.change-password')}}">
                        <i data-tw-merge="" data-lucide="lock" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Change Password
                    </a>

                </div>


            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <!-- BEGIN: Change Password -->
            <form action="{{route('backend.user-profile.update-password')}}" method="POST">
                @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(session('message'))
                                <div class="alert alert-success" style="color: green;">
                                    {{ session('message') }}
                                </div>
                            @endif
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400">
                    <h2 class="mr-auto text-base font-medium">Change Password</h2>
                </div>
                <div class="p-5">
                    <div>
                        <label data-tw-merge="" name="oldpassword" for="change-password-form-1" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                            Old Password
                        </label>
                        <input data-tw-merge="" id="oldpassword" name="oldpassword" id="change-password-form-1" type="password"  class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">

                    </div>
                    <div class="mt-3">
                        <label data-tw-merge="" for="change-password-form-2" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                            New Password
                        </label>
                        <input data-tw-merge="" name="newpassword" id="change-password-form-2" type="password"  class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                    </div>
                    <div class="mt-3">
                        <label data-tw-merge=""for="change-password-form-3" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                            Confirm New Password
                        </label>
                        <input data-tw-merge="" id="confirm_password" name="confirm_password" type="password"  class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                    </div>
                    <button  type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mt-4">Change Password</button>
                </div>
            </div>
        </form>
            <!-- END: Change Password -->
        </div>
    </div>
</div>
<!-- END: Content -->

@endsection


@endsection
