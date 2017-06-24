<?php
/**
 * Created by PhpStorm.
 * User: Rainier
 * Date: 21-6-2017
 * Time: 20:59
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

trait checkIfUserHasOwnership
{

    public function checkOwnershipTopic($topic) {
        if (Auth::user()->role_id == 2 || (Auth::user()->id == $topic->user_id)) {
            return view('topics.edit');
        } else {
            //
        }
    }

    public function checkOwnershipProfile() {
        if (Auth::user()->username == profileusername) {
            return view('user.editprofile');
        } else {
            // Dont show the button at all
        }
    }


}