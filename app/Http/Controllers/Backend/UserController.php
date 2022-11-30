<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use File;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == UserRole::SUPPER_ADMIN) {
            $users = User::all();
        }

        if (Auth::user()->role == UserRole::ADMIN) {
            $users = User::whereIn('role' ,[UserRole::USER, UserRole::SELLER])->get();
        }

        return view('backend.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $currentUser = Auth::user();
        $user = new User;

        if ($request->hasFile('image')) {
            $path = 'assets/uploads/users'.$user->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/users',$filename);
            $user->image = $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = md5($request->password);
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();

        if ($user) {
            // Add activity logs
            activity($currentUser->name)
                ->performedOn($user)
                ->causedBy($currentUser)
                // ->withProperties(['customProperty' => 'customValue']) dùng cho update(lưu giá trị cũ và giá trị mới)
                ->log($request->name . 'created by ' . $currentUser->name);
            toast('User cretae successfully','success');
        } else {
            toast('Something went wrong!','error');
        }
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('backend.users.show')->with(compact('user'));
        }
        toast('User Data Not Found!','error');
        return redirect(route('user.index'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $currentUser = Auth::user();
        $user = User::find($id);

        if ($request->hasFile('image')) {
            $path = 'assets/uploads/users'.$user->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/user',$filename);
            $user->image = $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->created_at = Carbon::now()->toDateString();
        $user->updated_at = Carbon::now()->toDateString();
        $user->update();

        if ($user) {
            // Add activity logs
            activity($currentUser->name)
                ->performedOn($user)
                ->causedBy($currentUser)
                ->withProperties([ 
                    $user->name => $request->name, 
                    $user->email => $request->email])
                ->log($request->name . ' status changed by ' . $currentUser->name);
            toast('User updated successfully', 'success');
        }else{
            toast('Something went wrong!', 'error');
        }
        return redirect(route('user.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (! $user) {
            toast('Something went wrong!','error');
        }
        $user->delete();
        toast('User Delete successfully','success');
        return back();
    }
}
