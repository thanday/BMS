<?php

namespace App\Http\Livewire\Eng\Settings;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class ListPermissions extends Component
{
    use WithPagination;

    protected $listeners = ['deleteConfirmed' => 'deletePermission'];
    public $state = [];
    public  $name;
    public $isOpen = 0;
    public $isOpenEdit = 0;
    public $searchTerm;

    public $permissionIdBeingRemoved = null;

    public function store()
    {
        $validateData = Validator::make($this->state,[
            'name' => 'required',

            ])->validate();

            Permission::create($validateData);

            $this->dispatchBrowserEvent('added');

            $this->closeModal();

            $this->resetInputFields();
    }

    // public function givePermissionTo($role){
    //     $permission = Permission::findOrFail();
    //     $role->givePermissionTo($permission);
    // }

    public function confirmPermissionRemoval($permissiom_id){

        $this->permissionIdBeingRemoved = $permissiom_id;

        $this->dispatchBrowserEvent('show-delete-confirmation');

    }

    public function deletePermission(){
        $permission = Permission::findOrFail($this->permissionIdBeingRemoved);

        $permission->delete();

        $this->dispatchBrowserEvent('deleted');
    }

    public function edit()
    {
       $validateData = Validator::make($this->state, [
        'name' => 'required',
        ])->validate();

        $this->permission->update($validateData);

        $this->dispatchBrowserEvent('Updated');

        $this->closeEditModal();
       
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function editModel(Permission $permission)
    {
        $this->openEditModal();
        $this->permission = $permission;
        $this->state = $permission->toArray();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function openEditModal()
    {
        $this->isOpenEdit = true;
    }
    
    
    public function closeEditModal()
    {
        $this->isOpenEdit = false;
    }

    private function resetInputFields()
    {
        $this->name = '';

    }
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $permissions = Permission::latest()->where('name',  'like', $searchTerm)->paginate(15);
        return view('livewire.eng.settings.list-permissions',[
            'permissions' => $permissions,

        ]);
    }
}
