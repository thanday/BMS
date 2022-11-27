<?php

namespace App\Http\Livewire\Eng\Events;

use App\Models\Channels;
use App\Models\Events;
use App\Models\User;
use Livewire\Component;

class CreateEvents extends Component
{

    public $event_name, $channels_id, $channel, $refnum, $venue, $type, $qouted_type, $client, $focalname, $focalnum, $requestdate, $event_date, $event_stime, $event_etime, $psmchannel_id = [], $localchannel_id = [], $local_qtype;
    public $input;


    public function EventStore()
    {
        $validatedData = $this->validate([
            'event_name' => 'required',
            'refnum' => '',
            'venue'  => '',
            'type' => '',
            'qouted_type' => '',
            'client' => '',
            'focalname' => '',
            'focalnum' => '',
            'requestdate' => '',
            'event_date' => '',
            'event_stime' => '',
            'event_etime' => '',
            'psmchannel_id' => '',
            'psmchannel_id' => '',
            // 'localchannel_id' => '',
            'local_qtype' => '',

        ]);


        //    dd($validatedData);


        $event = Events::create($validatedData);

        $event->psmtvchannel()->attach($this->channels_id);

        $event->tvchannel()->attach($this->localchannel_id);

        $this->dispatchBrowserEvent('added');

        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->event_name = '';
        $this->refnum = '';
        $this->venue = '';
        $this->type = '';
        $this->qouted_type = '';
        $this->client = '';
        $this->focalname = '';
        $this->focalnum = '';
        $this->requestdate = '';
        $this->event_date = '';
        $this->event_stime = '';
        $this->event_etime = '';
        $this->psmchannel_id = '';
        $this->localchannel_id = '';
        $this->local_qtype = '';
    }


    public function render()
    {
        $channelspsm = Channels::where('title', 'PSM Channel')->get();
        $channelslocal = Channels::where('title', 'Local Channel')->get();
        $users = User::where('role', 'user')->get();
        return view('livewire.eng.events.create-events', [
            'users' => $users,
            'channelspsm' => $channelspsm,
            'channelslocal' => $channelslocal,
        ]);
    }
}
