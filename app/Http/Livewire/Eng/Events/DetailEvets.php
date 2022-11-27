<?php

namespace App\Http\Livewire\Eng\Events;

use App\Models\Channels;
use App\Models\Events;
use App\Models\User;
use App\Notifications\UserAsignNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;


class DetailEvets extends Component
{
    public $isOpen = 0;
    public $modelisOpen = 0;
    public $modelLiveisOpen = 0;
    public  $techs_id, $live_set_date, $live_set_time, $link_medium, $techl_id, $live_attend_date, $live_attend_time, $sincharge_id, $feed_tested_user_id, $live_start_time, $live_end_time;
    public $techName = '';
    public $updateevent;
    public $events = [];

    public $events_pivot;

    public $state = [];


    public $eventsId;

    public function createliveset($event_id)
    {
        $this->eventsId = $event_id;
        $this->state = [];
        $this->resetInputFields();
        $this->openModal1();
    }

    public function create($event_id)
    {
        $this->eventsId = $event_id;
        $this->state = [];
        $this->resetInputFields();
        $this->openModal();
    }

    public function addlivedetail($event_id)
    {
        $this->eventsId = $event_id;
        $this->state = [];
        $this->resetInputFields();
        $this->openModalLive();
    }

    public function mount($id)
    {
        $events = Events::findOrfail($id);

        $this->events = $events;
        // dd($channelspsm);
    }

    public function LiveSetTechStore(Request $request)
    {

        $validatedData = Validator::make($this->state, [
            'techs_id' => '',
            'live_set_date' => '',
            'live_set_time' => '',
            'link_medium' => '',
        ])->validate();


        $validatedData = Events::findOrFail($this->eventsId)->fill([
            'techs_id' => $this->techs_id,
            'live_set_date' => $this->live_set_date,
            'live_set_time' => $this->live_set_time,
            'link_medium' => $this->link_medium
        ])->save($validatedData);
        //    $user = User::all();
      //  Notification::send($user, new UserAsignNotification($validatedData));

        $this->dispatchBrowserEvent('added');

        $this->resetInputFields();

        $this->closeModal1();


    }

    public function LiveTechStore()
    {
        $validatedData = Validator::make($this->state, [
            'techl_id' => '',
            'live_attend_date' => '',
            'live_attend_time' => '',
        ])->validate();

        $validatedData = Events::findOrFail($this->eventsId)->fill([
            'techl_id' => $this->techl_id,
            'live_attend_date' => $this->live_attend_date,
            'live_attend_time' => $this->live_attend_time
        ])->save($validatedData);
 
        
        $this->dispatchBrowserEvent('added');

        $this->resetInputFields();

        $this->closeModal();
    }

    public function LiveDetailAdd()
    {
        $validatedData = Validator::make($this->state, [
            'sincharge_id' => '',
            'feed_tested_user_id' => '',
            'live_start_time' => '',
            'live_end_time' => '',
        ])->validate();

        $validatedData = Events::findOrFail($this->eventsId)->fill([
            'sincharge_id' => $this->sincharge_id,
            'feed_tested_user_id' => $this->feed_tested_user_id,
            'live_start_time' => $this->live_start_time,
            'live_end_time' => $this->live_end_time

        ])->save($validatedData);

        $this->dispatchBrowserEvent('added');

        $this->resetInputFields();

        $this->closeModalLive();
    }


    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function openModal1()
    {
        $this->modelisOpen = true;
    }
    public function openModalLive()
    {
        $this->modelLiveisOpen = true;
    }

    public function closeModal1()
    {
        $this->modelisOpen = false;
    }
    public function closeModalLive()
    {
        $this->modelLiveisOpen = false;
    }

    private function resetInputFields()
    {
        $this->techs_id = '';
        $this->live_set_date = '';
        $this->live_set_time = '';
        $this->techl_id = '';
        $this->live_attend_date = '';
        $this->live_attend_time = '';
        $this->sincharge_id = '';
        $this->feed_tested_user_id = '';
        $this->live_start_time = '';
        $this->live_end_time = '';
    }

    public function render()
    {
        $users = User::where('role', 'technician')->get();
        return view('livewire.eng.events.detail-evets', [
            'users' => $users,
        ]);
    }
}
