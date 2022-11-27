<?php

namespace App\Http\Livewire\Eng\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ViewUser extends Component
{
    public $role;
    public $user;
    public $permission;

    public function mount($id)
    {
        $users = User::findOrfail($id);
        $this->user = $users;
      
    }

    public function giveRole()
    {
        $validated = $this->validate(['role' => ['required']]);

        $this->user->assignRole($validated);
      
        $this->dispatchBrowserEvent('AssignRole');

    }

    public function giveDirectPermission()
    {
        $validated = $this->validate(['permission' => ['required']]);

        $this->user->givePermissionTo($validated);
      
        $this->dispatchBrowserEvent('GiveDirectPermission');

    }


    public function deleteRole(Role $role, User $user)
    {
         if ($user->hasRole($role)) {
            $user->removeRole($role);
         }
        return back();
    }

    public function revokePermission(Permission $permission, User $user)
    {
         if ($user->hasDirectPermission($permission)) {
              $user->revokePermissionTo($permission);
          }

        return back();
    }


    public function render()
    {
        $roles = Role::all();
        $allpermissions = Permission::all();

        return view('livewire.eng.users.view-user', [
            'roles' => $roles,
            'allpermissions' => $allpermissions,


        ]);
    }
}

