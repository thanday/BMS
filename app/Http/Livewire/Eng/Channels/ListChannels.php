<?php

namespace App\Http\Livewire\Eng\Channels;

use App\Models\Channels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ListChannels extends Component
{
    use WithPagination;
    protected $listeners = ['deleteConfirmed' => 'deleteChannel'];
    public $isOpen = 0;
    public $isOpenEdit = 0;
    public $image, $name, $title, $selected_id;
    public $allData = [];

    public $channelIdBeingRemoved = null;


    use WithFileUploads;


    public function ChannelStore()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'title' => 'required',
            'image' => 'required',

        ]);

        $image = $this->image->store('images/channels', 'public');

        $validatedData['image'] = $image;

        Channels::create($validatedData);

        $this->dispatchBrowserEvent('added');

        $this->resetInputFields();

        $this->closeModal();
    }

    // update
    public function update()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'title' => 'required',
            'image' => '',
            ])->validate();

            $image = $this->image->store('images/channels', 'public');

            $validateData['image'] = $image;

           // dd($validateData);

            $this->channel->update($validateData);

            $this->dispatchBrowserEvent('Updated');

            $this->closeEditModal();
    }

    public function confirmChannelRemoval($channel_id)
    {
        $this->channelIdBeingRemoved = $channel_id;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteChannel()
    {
        $channel = Channels::findOrFail($this->channelIdBeingRemoved);

        $channel->delete();

        $this->dispatchBrowserEvent('deleted');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function editChannel(Channels $channel)
    {
        $this->openEditModal();
        $this->channel = $channel;
     //   dd($channel);
        $this->state = $channel->toArray();
    }

    public function openEditModal()
    {
        $this->isOpenEdit = true;
    }
    
    public function closeEditModal()
    {
        $this->isOpenEdit = false;
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->title = '';
        $this->image = '';
    }

    public function render()
    {
        $allData = Channels::latest()->paginate(16);
        return view('livewire.eng.channels.list-channels', [
            'channels' => $allData,
        ]);
    }
}
