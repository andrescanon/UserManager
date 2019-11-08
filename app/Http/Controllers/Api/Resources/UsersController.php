<?php

namespace App\Http\Controllers\Api\Resources;

use App\Http\Resources\UserCollection;
use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UsersController extends Controller
{

    public function index()
    {
        return new UserCollection(User::all());
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(User $user, Request $request)
    {
        $user->update(
            $request->only(['name', 'email'])
        );

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->deleted();
    }


    protected function deleted()
    {
        return response()->json([
            'accepted-at' => Carbon::now()->toW3cString()
        ], 202);
    }


}
