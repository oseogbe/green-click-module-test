<?php

namespace Modules\User;

use App\Models\User;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        if (request()->wantsJson()) {
            return response()->json([
                "success" => true,
                "data" => $users
            ]);
        }

        return view('users.index', compact('users'));
    }

    public function disable($userId)
    {
        $user = User::findOrFail($userId);

        $user->enabled = false;
        $user->save();

        return response()->json([
            "success" => true,
            "data" => $user
        ]);
    }

    public function enable($userId)
    {
        $user = User::findOrFail($userId);

        $user->enabled = true;
        $user->save();

        return response()->json([
            "success" => true,
            "data" => $user
        ]);
    }
}
