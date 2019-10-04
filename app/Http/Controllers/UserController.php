<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\File;


class UserController extends Controller
{

    public function profile($username) {

        $user = User::where('username', $username)->first();


        return view('user.profile', array('user' => $user));
    }


    public function update_avatar(Request $request) {

        $this->middleware('auth');

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = Auth::user()->username . time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(300,300)->save( public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            //Verwijderd vorige foto
            if ($user->avatar != 'default.jpg') {
                $path = public_path('uploads'.DIRECTORY_SEPARATOR.'avatars'. DIRECTORY_SEPARATOR.Auth::user()->Avatarpath);
                if (file_exists($path)) {
                    Storage::delete($path);
                }
            }
        }

        return view('user.profile', array('user' => Auth::user()));
        //Image intervention
    }

    public function update_banner(Request $request) {

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $filename = Auth::user()->username . time() . '.' . $banner->getClientOriginalExtension();
            Image::make($banner)->fit(1050,250)->save( public_path('/uploads/banners/' . $filename));

            $user = Auth::user();
            $user->banner = $filename;
            $user->save();

            //Verwijderd vorige foto
            if ($user->banner!= 'defaultbanner.jpg') {
                $path = 'uploads/banners/';
                $lastpath = Auth::user()->Bannerpath;
                File::delete(public_path($path . $lastpath));
            }
        }

        return view('user.profile', array('user' => Auth::user()));
        //Image intervention
    }

    public function settings() {
        dd('lmao got here lololol');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::where('username', $username)->first();


        return view('user.editprofile', array('user' => $user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {

        $user = User::where('username', $username)->first();

        $user->fill($request->input());
        $user->save();

        return redirect()->route('showprofile', ['username' => $username]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}