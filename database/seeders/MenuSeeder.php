<?php

namespace Database\Seeders;

use App\Enums\Module;
use App\Models\Menu;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = $this->menus();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::beginTransaction();

        try {
            $newPermissions = [];
            foreach ($menus as $menu) {
                // echo "{$menu['name']} registered..." . PHP_EOL;
                $permissions = ["{$menu['modul']}.{$menu['name']}.viewAny", "{$menu['modul']}.{$menu['name']}.view", "{$menu['modul']}.{$menu['name']}.create", "{$menu['modul']}.{$menu['name']}.read", "{$menu['modul']}.{$menu['name']}.update", "{$menu['modul']}.{$menu['name']}.delete"];
                $menu        = Menu::updateOrCreate(['modul' => $menu['modul'], 'name' => $menu['name']], $menu);

                foreach ($permissions as $permission) {
                    $menu->permissions()->updateOrCreate(['name' => $permission]);
                    $newPermissions[] = $permission;
                }
            }

            $role = Role::whereName('Super Admin')->first();
            if ($role) {
                $role->givePermissionTo($newPermissions);
            }   

            DB::commit();
            Cache::flush();
        } catch (\Throwable $th) {
            echo $th;
            echo "Rollback changes..." . PHP_EOL;
            DB::rollBack();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function menus()
    {
        $menus = [
            [
                'id'             => 1,
                'modul'          => Module::Umum->value,
                'name'           => 'Dashboard',
                'route_name'     => 'dashboard',
                'icon'           => 'ni ni-tv-2',
                'sequence'       => 1,
                'menu_parent_id' => null,
            ],
            [
                'id'             => 2,
                'modul'          => Module::Umum->value,
                'name'           => 'User Management',
                'route_name'     => 'user-management',
                'icon'           => 'ni ni-tv-2',
                'sequence'       => 2,
                'menu_parent_id' => null,
            ],
            [
                'id'             => 3,
                'modul'          => Module::Umum->value,
                'name'           => 'Master User',
                'route_name'     => 'master-user',
                'icon'           => 'ni ni-single-02',
                'sequence'       => 3,
                'menu_parent_id' => 2,
            ],
            [
                'id'             => 4,
                'modul'          => Module::Umum->value,
                'name'           => 'Roles and Permissions',
                'route_name'     => 'roles-permissions',
                'icon'           => 'ni ni-single-02',
                'sequence'       => 4,
                'menu_parent_id' => 2,
            ],
        ];

        return $menus;
    }
}
