<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display all users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('template::users.index');
    }

    /**
     * Display the specified User.
     *
     * @param User $user
     *
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('template::users.show', [
            'user' => $user->load('profile', 'role')
        ]);
    }

    /**
     * Display the User's edit form.
     *
     * @param User $user
     * @param EditUserRequest $request
     * @return \Illuminate\View\View
     */
    public function edit(User $user, EditUserRequest $request)
    {
        return view('template::users.edit', [
            'user' => $user->load(['role'])
        ]);
    }

    /**
     * Update the User resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update(
            $request->only(['name', 'email'])
        );

        if ($request->has('password')){
            //ToDo Refactor
            $credentials = $request->only('email', 'password');
            if (\Auth::attempt($credentials)) {
                // Authentication passed...
                $user->password = \Hash::make($request->password); //setPasswordMutator with hash
            }
        }

        $user->associateRole($request->role)->save();

        return redirect()->route('admin.users.show', $user);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
