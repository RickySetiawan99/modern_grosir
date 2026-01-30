<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function settings()
    {
        $user = Auth::user();
        return view('profile.settings', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:800'],
            'selected_avatar' => ['nullable', 'string'],
        ]);

        $data = $request->only('name', 'email');

        if ($request->hasFile('avatar')) {
            // Delete old avatar if it's an uploaded one
            if ($user->avatar && str_contains($user->avatar, 'uploads/') && file_exists(public_path($user->avatar))) {
                unlink(public_path($user->avatar));
            }

            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('uploads/avatars'), $avatarName);
            $data['avatar'] = 'uploads/avatars/' . $avatarName;
        } elseif ($request->filled('selected_avatar')) {
            // If they picked a default avatar, delete old upload if exists
            if ($user->avatar && str_contains($user->avatar, 'uploads/') && file_exists(public_path($user->avatar))) {
                unlink(public_path($user->avatar));
            }
            $data['avatar'] = $request->selected_avatar;
        }

        $user->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function resetAvatar()
    {
        $user = Auth::user();

        if ($user->avatar && file_exists(public_path($user->avatar))) {
            unlink(public_path($user->avatar));
        }

        $user->update(['avatar' => null]);

        return back()->with('success', 'Profile picture reset to default.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
