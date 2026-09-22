<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\UserRole;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index', [
            'users' => User::query()->orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('users.create', [
            'roles' => UserRole::cases(),
            'defaultRole' => UserRole::Consulta,
        ]);
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::query()->create($request->safe()->only([
            'name',
            'email',
            'password',
            'role',
        ]));

        return to_route('users.index')->with('status', 'Usuario dado de alta.');
    }
}
