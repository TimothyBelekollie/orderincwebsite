<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{

     //
  /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;

    }
    //
    // Show the user profile
    public function show()
    {
        $user = Auth::user();
        return view('backend.user-profile.show', compact('user'));
    }

    // Show the form to edit the user profile
    public function edit()
    {
        $user = Auth::user();
        return view('backend.user-profile.edit', compact('user'));
    }

    // Update the user profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update($request->only('name', 'email', 'phone'));

        return redirect()->route('backend.user-profile.show')->with('success', 'Profile updated successfully.');
    }

    public function changepassword(){

        return view('backend.user-profile.change_password');
    }

    // Change the user password
    public function updatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::User()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $id=Auth::User()->id;
            $updatepassword=User::find($id);
            $updatepassword->password = bcrypt($request->newpassword);
            $updatepassword->save();

            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        } else{
            session()->flash('message','Old password is not match');
            return redirect()->back();
        }
    }

    public function userlogout(Request $request){
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
}
