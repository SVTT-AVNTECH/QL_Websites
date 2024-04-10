<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if (!$request->user()->hasVerifiedEmail()) {
            return Redirect::back()->with('error', 'Bạn cần xác minh email trước khi thực hiện thao tác này.');
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (!$request->user()->hasVerifiedEmail()) {
            return Redirect::back()->with('error', 'Bạn cần xác minh email trước khi thực hiện thao tác này.');
        }

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Check if user has verified their email
        if (!$request->user()->hasVerifiedEmail()) {
            return Redirect::back()->with('error', 'Bạn cần xác minh email trước khi thực hiện thao tác này.');
        }

        // Your logic for storing user data goes here

        return Redirect::route('dashboard')->with('success', 'Tài khoản của bạn đã được tạo.');
    }

    public function insert_tele(Request $request)
    {
        $user = Auth::user();
        $user->tele_id = $request->id;
        $user->tele_name = $request->name;
        $user->tele_avatar =$request->avatar;
        $user->save();
        return $user;
    }

    public function delete_tele(Request $request)
    {
        $user = Auth::user();
        $user->tele_id = "";
        $user->tele_name = "";
        $user->tele_avatar ="";
        $user->save();
        return $user;
    }
}
