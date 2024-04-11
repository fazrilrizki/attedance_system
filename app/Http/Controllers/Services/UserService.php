<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserService extends Controller
{
    protected Model $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function model(): User
    {
        return $this->model;
    }

    public function all(): Collection
    {
        $users = $this->model->all();

        return $users;
    }
}
