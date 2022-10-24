<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\SettingUpdateRequest;
use Illuminate\Support\Facades\Log;
// use Intervention\Image\Facades\Image;
use File;
// use \Illuminate\Contracts\Validation\Validator;


class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('backend.settings.index')->with(compact('setting'));
    }

    public function update(SettingUpdateRequest $request ,$id)
    {
        $setting = Setting::find($id);

        if ($request->hasFile('logo')) {
            $path = 'assets/uploads/settings'.$setting->logo;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/settings',$filename);
            $setting->logo = $filename;
        }

        if ($request->hasFile('favico')) {
            $path = $setting->favico;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('favico');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/settings',$filename);
            $setting->favico = $filename;
        }

        $setting->title = $request->title;
        $setting->email = $request->email;
        $setting->description = $request->description;
        $setting->phone = $request->phone;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->tiktok = $request->tiktok;
        $setting->youtube = $request->youtube;
        $setting->update();

        if (! $setting) {
            toast('Something went wrong!','error');
        }
        
        toast('Settings Update successfully','success');
        return back();
        // $logo = Image::make($request->logo->path());
        // $logo->fit(200,200, function($constraint){
        //     $constraint->upsize();
        // });
        // dd($logo);
        // return $logo;
    }
}
