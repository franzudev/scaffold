<?php

namespace App\Http\Controllers\Profile;

use App\Http\Helpers\Initials;
use App\Http\Requests\UsersFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Http\Helpers\Upload;
use Avatar;

use App\Models\User;

class ProfileController extends Controller
{
    public function getAuthUser ()
    {
        return Auth::user();
    }

    public function uploadAvatarAuthUser(Request $request)
    {
        $upload = new Upload();
        $avatar = $upload->upload($request->file, 'avatars/'.Auth::id())->resize(200, 200)->getData();

        $user = User::find(Auth::id());
        $user->avatar = $avatar['basename'];
        $user->save();

        return $user;
    }

    public function removeAvatarAuthUser()
    {
        $user = User::find(Auth::id());
        $user->avatar = 'avatar.png';
        $user->save();

        return $user;
    }
}
