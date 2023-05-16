<?php

namespace App\Http\Controllers\Adminpanel;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function show()
    {
        // if (is_null($this->user) || !$this->user->can('admin.view')) {
        //     return abort(403, 'You are not allowed to access this page !');
        // }
        $userID = Auth::user()->id;
        $user = User::where('id',$userID)->first();
        return view('adminpanel.pages.profile.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // if (is_null($this->user) || !$this->user->can('admin.view')) {
        //     return abort(403, 'You are not allowed to access this page !');
        // }

        $userID = Auth::user()->id;
        $user = User::where('id',$userID)->first();
        return view('adminpanel.pages.profile.edit', compact('user'));
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.view')) {
        //     return abort(403, 'You are not allowed to access this page !');
        // }

        $request->validate([
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'username' => 'required|string|max:20|unique:users,username,'.$id,
            'email' => 'required|unique:users,email,'.$id,
            'phone' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::where('id', $id)->first();
        try {
        DB::beginTransaction();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->image)
        {
            UploadHelper::deleteFile('public/adminpanel/assets/profile/'.$user->image);
            $user->image = UploadHelper::upload('image', $request->image, $request->username . '-' . time() . '-image', 'public/adminpanel/assets/profile/', $user->image);
        }
        $user->update();
        DB::commit();
        $notification = array(
        'Message' => 'Admin Profile Updated Successfully!',
        'alert-type' => 'success'
        );
        return redirect()->route('admin.profile.view')->with($notification);

        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    public function userPasswordChangeView()
    {
        // if (is_null($this->user) || !$this->user->can('admin.view')) {
        //     return abort(403, 'You are not allowed to access this page !');
        // }
        return view('adminpanel.pages.profile.editPassword');
    }

    public function userPasswordChangeUpdate(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.view')) {
        //     return abort(403, 'You are not allowed to access this page !');
        // }
        $request->validate([
            'currentPassword' => 'required',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->currentPassword])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->password);
            $user->update();
            $notification = array(
                'Message' => 'Password Changed Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.profile.view')->with($notification);
        }else{
            $notification = array(
                'Message' => 'Sorry! your current password does not matched',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.password.change')->with($notification);
        }
    }
}
