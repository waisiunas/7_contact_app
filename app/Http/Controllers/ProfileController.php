<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show', [
            'user' => Auth::user(),
        ]);
    }

    public function details(Request $request)
    {
        $user = User::find(Auth::id());

        $data = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email,' . $user->id . ',id'],
        ]);

        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        // ];

        if ($user->update($data)) {
            return redirect()->back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    public function password(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'password' => ['required', 'min:2', 'max:255', 'confirmed'],
            'current_password' => ['required'],
        ]);

        $data = [
            'password' => $request->password,
        ];

        if (Hash::check($request->current_password, $user->password)) {
            if ($user->update($data)) {
                return redirect()->back()->with(['success' => 'Magic has been spelled!']);
            } else {
                return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
            }
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match!']);
        }
    }

    public function picture(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg,webp'],
        ]);

        $target_directory = 'template/img/photos/';

        if ($user->picture && File::exists($target_directory . $user->picture)) {
            unlink($target_directory . $user->picture);
        }

        $file_name = "ACI-SHOPPERS-" . microtime(true) . "." . $request->picture->extension();

        if ($request->picture->move(public_path($target_directory), $file_name)) {
            $data = [
                'picture' => $file_name,
            ];

            if ($user->update($data)) {
                return redirect()->back()->with(['success' => 'Magic has been spelled!']);
            } else {
                return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
            }
        } else {
            return redirect()->back()->with(['failure' => 'Unable to upload picture!']);
        }
    }
}
