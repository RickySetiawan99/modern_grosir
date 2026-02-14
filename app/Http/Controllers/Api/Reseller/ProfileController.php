<?php

namespace App\Http\Controllers\Api\Reseller;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResellerProfileResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        try {
            $user = $request->user();
            if (!$user || !$user->reseller) {
                return response()->json(['error' => 'Reseller profile not found'], 403);
            }

            return new ResellerProfileResource($user->reseller->load(['user', 'tier']));
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load profile: '.$e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $user = $request->user();
            $request->validate([
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|unique:users,email,'.$user->id,
            ]);

            $user->update($request->only(['name', 'email']));

            return response()->json(['message' => 'Profile updated successfully', 'user' => $user]);
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to update profile: '.$e->getMessage());
        }
    }
}
