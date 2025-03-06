<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard()
    {
        $totalUsers = User::whereNotNull('email_verified_at')->count();
        $verifiedMunicipalUsers = User::where('role', 'Municipal User')->whereNotNull('email_verified_at')->count();
        $pendingMunicipalUsers = User::where('role', 'Municipal User')->whereNull('email_verified_at')->count();

        return view('dashboard', compact('totalUsers', 'verifiedMunicipalUsers', 'pendingMunicipalUsers'));
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        $user->sendEmailVerificationNotification();

        Alert::success('User Added', 'The new user has been created.');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'];
        } else {
            unset($data['password']); // Remove password field so it doesn't override the old one
        }

        $user->update($data);

        Alert::success('User Updated', 'The user details have been updated.');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('User Deleted', 'The user has been deleted.');
        return redirect()->route('users.index');
    }
}
