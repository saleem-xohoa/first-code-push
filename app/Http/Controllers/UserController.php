<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * Polymorphic.
         */
        $users = User::find(1);
        return $users->image;
        /**
         * one to many.
         */
        // $users = User::with('post')->get();
        // return $users;
        /**
         * Has one through.
         */
        // $users = User::with('company')->with('phoneNumber')->get();
        // return $users;
        /**
         * Many to many.
         */
        // $user = User::with('roles')->find(1);
        // return $user->roles;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {/**
     * Many to many.
     */
        // $user  = User::find(4);
        // $roles = [1, 2, 3]; // Array of role IDs to assign to the user
        // $user->roles()->sync($roles);
        /**
         * Polymorphic.
         */
        $user = User::find(3);
        $user->image()->create([
            'url' => 'images/user2.jpeg',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
