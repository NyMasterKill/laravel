<?php
namespace Database\Seeders;
use App\Models\Permission;
use Illuminate\Database\Seeder;
class PermissionSeeder extends Seeder
{
    public function run()
    {
        $entities = ['user', 'role', 'permission'];
        $actions = ['get-list', 'read', 'create', 'update', 'delete', 'restore'];
        foreach ($entities as $entity) {
            foreach ($actions as $action) {
                Permission::create([
                    'name' => "$action-$entity",
                    'code' => "$action-$entity",
                    'description' => ucfirst("$action $entity"),
                    'created_by' => 1,
                ]);
            }
        }
        $specificPermissions = [
            'assign-role' => 'Assign Role',
            'get-user-roles' => 'Get User Roles',
            'remove-role' => 'Remove Role',
            'soft-delete-role' => 'Soft Remove Role',
            'restore-user-role' => 'Restore User Role',
            'get-user-role-permissions' => 'User Role Permission',
            'get-role-permissions' => 'Get Role Permissions',
            'assign-permission-to-role'=> 'Assign Permission to Role',
            'remove-permission-from-role' => 'Remove Permission to Role',
            'soft-delete-permission-from-role' => 'Soft Delete Permission from Role',
            'restore-permission-to-role' => 'Restore Permission to Role',
            'get-users-with-role' => 'Get User with role',
        ];
        foreach ($specificPermissions as $code => $name) {
            Permission::create([
                'name' => $name,
                'code' => $code,
                'description' => $name,
                'created_by' => 1,
            ]);
        }
    }
}