<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->all();

        return view('users.index', compact('users'));
    }
}
