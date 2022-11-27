<?php

namespace App\Http\Livewire\Eng\Users;

use App\Models\User;
use App\View\Components\AppLayout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ListUsers extends Component
{
    use WithPagination;

    protected $listeners = ['deleteConfirmed' => 'deleteUser'];
    public $state = [];
    public  $name, $email, $user_id, $role, $password;
    public $isOpen = 0;
    public $searchTerm;
    public $isOpenEdit = 0;
    public $userIdBeingRemoved = null;

     public function store()
    {
        $validateData = Validator::make($this->state,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',

            ])->validate();

         //   $this->$validateData->assignRole('role');

            $validateData['password'] = bcrypt($validateData['password']);

            User::create($validateData);

            $this->dispatchBrowserEvent('added');

            //session()->flash('message', $this->user_id ? 'User Updated Successfully.' : 'User Created Successfully.');

            $this->closeModal();

            $this->resetInputFields();
    }



    public function confirmUserRemoval($user_id){
        $this->userIdBeingRemoved = $user_id;

        $this->dispatchBrowserEvent('show-delete-confirmation');

    }

    public function deleteUser(){
        $user = User::findOrFail($this->userIdBeingRemoved);

        $user->delete();

        $this->dispatchBrowserEvent('deleted');
    }

    public function edit()
    {
        $validateData = Validator::make($this->state, [
            'name' => '',
            'email' => 'email',
            'password' => 'min:6',
            'role' => '',
        ])->validate();

        $validateData['password'] = bcrypt($validateData['password']);

       // User::update($validateData);


        $this->user->update($validateData);

        $this->dispatchBrowserEvent('Updated');

        $this->closeEditModal();
    }

    public function editModel(User $user)
    {
        $this->openEditModal();

        $this->user = $user;
        $this->state = $user->toArray();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
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

    public function resetInputFields()
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
        $roles = Role::all();

        return view('livewire.eng.users.list-users',[

            'users' => User::latest()->where('name',  'like', $searchTerm)->orWhere('email',  'like', $searchTerm)->orderBy('id')->paginate(10),

            'roles' => $roles,
        ]);
    }
}



