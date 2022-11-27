<?php

namespace App\Http\Livewire\Eng\Events;

use App\Models\Events;
use Livewire\Component;
use Livewire\WithPagination;

class ListEvents extends Component
{
    use WithPagination;
    protected $listeners = ['deleteConfirmed' => 'deleteEvent'];
    public $isOpen = 0;
    public $isView = 0;
    public $searchTerm;

    public $eventIdBeingRemoved = null;
    
    public function confirmEventRemoval($events_id)
    {
        $this->eventIdBeingRemoved = $events_id;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteEvent()
    {
        $event = Events::findOrFail($this->eventIdBeingRemoved);

        $event->delete();

        $this->dispatchBrowserEvent('deleted');
    }


    public function create()
    {
        //$this->resetInputFields();
        $this->openModalCreate();

    }

    public function view()
    {
        //$this->resetInputFields();
        $this->openModal();
    }

    public function openModalCreate()
    {
        $this->isOpen = true;
    }

    public function openModal()
    {
        $this->isView = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isView = false;
    }

    public function render()
    {
        //$events = Events::latest()->paginate(10);
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.eng.events.list-events', [
            //'events' => $events,
            'events' => Events::latest()->where('event_name',  'like', $searchTerm)->orWhere('venue',  'like', $searchTerm)->orWhere('type',  'like', $searchTerm)->orderBy('event_date')->paginate(8)
        ]);
    }
}
