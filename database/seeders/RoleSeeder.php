<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder{

    public function run(){

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role1 = Role::create(['name' => 'Master']);
        $role2 = Role::create(['name' => 'Administradores']);
        $role3 = Role::create(['name' => 'Basico']);
        $role4 = Role::create(['name' => 'Revisor']);

        Permission::create(['name' => 'admin.index','description'=> 'Ver Dashboard'])->syncRoles($role1, $role2, $role3, $role4);

        Permission::create(['name' => 'admin.users.index','description'=> 'Ver listado de usuarios'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.users.edit','description'=> 'Asignar un rol'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.users.create','description'=> 'Crear usuarios'])->syncRoles($role1, $role2);

        Permission::create(['name' => 'admin.accounts.index','description'=> 'Ver listado de Cuentas'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.accounts.create','description'=> 'Crear Cuentas'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.accounts.edit','description'=> 'Editar Cuentas'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.accounts.destroy','description'=> 'Eliminar Cuentas'])->syncRoles($role1, $role2);

        Permission::create(['name' => 'admin.costs.index','description'=> 'Ver listado de centros de costos'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.costs.create','description'=> 'Crear centros de costos'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.costs.edit','description'=> 'Editar centros de costos'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.costs.destroy','description'=> 'Eliminar centros de costos'])->syncRoles($role1, $role2);
        
        Permission::create(['name' => 'admin.persons.index','description'=> 'Ver listado de clientes'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.persons.create','description'=> 'Crear clientes'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.persons.edit','description'=> 'Editar clientes'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.persons.destroy','description'=> 'Eliminar clientes'])->syncRoles($role1, $role2);
        
        Permission::create(['name' => 'binnacles.index','description'=> 'Ver listado de bitacoras'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'binnacles.create','description'=> 'Crear bitacoras'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'binnacles.edit','description'=> 'Editar bitacoras'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'binnacles.destroy','description'=> 'Eliminar bitacoras'])->syncRoles($role1, $role2, $role3, $role4);

    }
}
