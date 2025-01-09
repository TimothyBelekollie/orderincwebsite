@extends('backend.layout.master')
@section('backend')
 <!-- BEGIN: Content -->
 <div class="max-w-full md:max-w-none rounded-[30px] md:rounded-none px-4 md:px-[22px] min-w-0 min-h-screen bg-slate-100 flex-1 md:pt-20 pb-10 mt-5 md:mt-1 relative dark:bg-darkmode-700 before:content-[''] before:w-full before:h-px before:block">
    <div class="intro-y mt-8 flex items-center">
        <h2 class="mr-auto text-lg font-medium">{{Auth::user()->name}} Profile</h2>

        @if(session('success'))
        <div class="alert alert-success" style="color:green;">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div>
        <!-- BEGIN: Profile Info -->
        <div class="intro-y box mt-5 px-5 pt-5">
            <div class="-mx-5 flex flex-col border-b border-slate-200/60 pb-5 dark:border-darkmode-400 lg:flex-row">
                <div class="flex flex-1 items-center justify-center px-5 lg:justify-start">
                    <div class="image-fit relative h-20 w-20 flex-none sm:h-24 sm:w-24 lg:h-32 lg:w-32">
                        <img class="rounded-full" src="{{asset('backend/dist/images/neutral-human-head.png')}}" alt="Midone - Tailwind Admin Dashboard Template">
                    </div>
                    <div class="ml-5">
                        <div class="w-24 truncate text-lg font-medium sm:w-40 sm:whitespace-normal">
                           {{Auth::user()->name}}
                        </div>
                        <div class="text-slate-500">{{Auth::user()->email}}</div>
                    </div>
                </div>
                <div class="mt-6 flex-1 border-l border-r border-t border-slate-200/60 px-5 pt-5 dark:border-darkmode-400 lg:mt-0 lg:border-t-0 lg:pt-0">
                    <div class="text-center font-medium lg:mt-3 lg:text-left">
                        Contact Details
                    </div>
                    <div class="mt-4 flex flex-col items-center justify-center lg:items-start">
                        <div class="flex items-center truncate sm:whitespace-normal">
                            <i data-tw-merge="" data-lucide="mail" class="stroke-1.5 mr-2 h-4 w-4"></i>
                            {{Auth::user()->email}}
                        </div>

                    </div>
                </div>

            </div>
            <ul data-tw-merge="" role="tablist" class="w-full flex flex-col justify-center text-center sm:flex-row lg:justify-start">
                <li id="profile-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                    <a data-tw-merge="" data-tw-target="#profile" role="tab" class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary active flex items-center py-4"><i data-tw-merge="" data-lucide="user" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Profile</a>
                </li>
                <li id="account-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                    <a href="{{route('backend.user-profile.edit')}}"  data-tw-target="#account" role="tab" class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary flex items-center py-4"><i data-tw-merge="" data-lucide="shield" class="stroke-1.5 mr-2 h-4 w-4"></i>
                       Update Profile</a>
                </li>
                <li id="change-password-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                    <a href="{{route('backend.user-profile.change-password')}}"  data-tw-target="#change-password" role="tab" class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary flex items-center py-4"><i data-tw-merge="" data-lucide="lock" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Change Password</a>
                </li>
                {{-- <li id="settings-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                    <a data-tw-merge="" data-tw-target="#settings" role="tab" class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary flex items-center py-4"><i data-tw-merge="" data-lucide="settings" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Settings</a>
                </li> --}}
            </ul>
        </div>
        <!-- END: Profile Info -->
        <div class="tab-content mt-5">
            <div data-transition="" data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150" data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100" data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="" role="tabpanel" aria-labelledby="-tab" class="tab-pane active">
                <div class="grid grid-cols-12 gap-6">






                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->

@endsection
