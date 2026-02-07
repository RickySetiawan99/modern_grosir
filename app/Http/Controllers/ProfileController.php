<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    protected $fileService;

    public function __construct(FileUploadService $fileService)
    {
        $this->fileService = $fileService;
    }

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

        try {
            $data = $request->only('name', 'email');

            if ($request->hasFile('avatar')) {
                $data['avatar'] = $this->fileService->upload($request->file('avatar'), 'uploads/avatars', $user->avatar);
            } elseif ($request->filled('selected_avatar')) {
                if ($user->avatar && str_contains($user->avatar, 'uploads/')) {
                    $this->fileService->delete($user->avatar);
                }
                $data['avatar'] = $request->selected_avatar;
            }

            $user->update($data);

            return back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to update profile: '.$e->getMessage());
        }
    }

    public function resetAvatar()
    {
        try {
            $user = Auth::user();

            if ($user->avatar && str_contains($user->avatar, 'uploads/')) {
                $this->fileService->delete($user->avatar);
            }

            $user->update(['avatar' => null]);

            return back()->with('success', 'Profile picture reset to default.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to reset avatar: '.$e->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        try {
            Auth::user()->update([
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success', 'Password updated successfully.');
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to update password: '.$e->getMessage());
        }
    }
}
