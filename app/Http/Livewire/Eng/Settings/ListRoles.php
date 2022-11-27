<?php

namespace App\Http\Livewire\Eng\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ListRoles extends Component
{
    use WithPagination;

    protected $listeners = ['deleteConfirmed' => 'deleteRole'];
    public $state = [];
    public  $name;
    public $permission;
    public $isOpen = 0;
    public $isOpenEdit = 0;
    public $isOpenPRole = 0;
    public $searchTerm;

    public $roleIdBeingRemoved = null;

    public function store()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required',

        ])->validate();

        Role::create($validateData);

        $this->dispatchBrowserEvent('added');

        //session()->flash('message', $this->user_id ? 'User Updated Successfully.' : 'User Created Successfully.');

        $this->closeModal();

        $this->resetInputFields();
    }

    public function confirmRoleRemoval($role_id)
    {

        $this->roleIdBeingRemoved = $role_id;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteRole()
    {
        $role = Role::findOrFail($this->roleIdBeingRemoved);

        $role->delete();

        $this->dispatchBrowserEvent('deleted');
    }

    public function edit()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required',
        ])->validate();

        $this->role->update($validateData);

        $this->dispatchBrowserEvent('Updated');

        $this->closeEditModal();
    }

    public function givePermission()
    {
        
        $validated = $this->validate(['permission' => ['required']]);

        $this->role_data->givePermissionTo($validated);

        $this->dispatchBrowserEvent('PermissionAdded');

        $this->closeProleModal();
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
        }
        return back();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function editModel(Role $role)
    {
        $this->openEditModal();

        $this->role = $role;
        $this->state = $role->toArray();
    }

    public function assignPermission(Role $role_data, Permission $permission)
    {
        
        $this->openProleModal();
        $permissions = Permission::all();
        $this->role_data = $role_data;
        $this->permissions = $permissions;
        $this->role_data->hasPermissionTo($permission);
    }


    public function openModal()
    {
        $this->isOpen = true;
    }

    public function openEditModal()
    {
        $this->isOpenEdit = true;
    }

    public function closeEditModal()
    {
        $this->isOpenEdit = false;
    }
    public function openProleModal()
    {
        $this->isOpenPRole = true;
    }

    public function closeProleModal()
    {
        $this->isOpenPRole = false;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->user_id = '';
        $this->password = '';
        $this->role = '';
    }
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $allpermissions = Permission::all();
        $allroles = Role::latest()->where('name',  'like', $searchTerm)->paginate(10);
        return view('livewire.eng.settings.list-roles', [
            'allroles' => $allroles,
            'allpermissions' => $allpermissions,


        ]);
    }
}
