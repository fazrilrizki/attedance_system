<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MenuService extends Controller
{
    protected Model $model;

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function renderMenu(User $user): Collection
    {
        $userId    = $user->id ?? 0;

        return Cache::remember('menu-'. $userId, now()->addWeeks(2), function () use ($user) {
            return $this->renderMenuFromDb($user);
        });
    }

    public function renderMenuFromDb(User $user): Collection
    {
        $userMenu = $user->getAllPermissions()
            ->unique('menu_id')
            ->pluck('menu_id');

        return $this->model
            ->with(['subMenus'])
            ->orderBy('sequence')
            ->find($userMenu);
    }
}
