<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;

class Menu extends Model
{
    use HasFactory, HasPermissions;

    public function subMenus()
    {
        return $this->hasMany(Menu::class, 'menu_parent_id')->with('subMenus')->orderBy('sequence');
    }

    /**
     * Get the parent that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'menu_parent_id')->withTrashed();
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
