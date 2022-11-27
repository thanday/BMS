<?php

namespace App\Http\Livewire\Eng\Events;

use App\Models\Channels;
use App\Models\Events;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

use function PHPUnit\Framework\returnCallback;

class EditEvent extends Component
{
    public $event_name, $channels_id, $channel, $refnum, $venue, $type, $qouted_type, $client, $focalname, $focalnum, $requestdate, $event_date, $event_stime, $event_etime, $psmchannel_id = [], $localchannel_id = [], $local_qtype;
    public $input;

    public function EventUpdate()
    {
        $validateData = Validator::make($this->state, [
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
            'channels_id' => '',

        ])->validate();;


       $this->event->update($validateData);

      //  $event = Events::create($validateData);

      //  $event->psmtvchannel()->attach($this->channels_id);

      //  $event->tvchannel()->attach($this->localchannel_id);



        $this->dispatchBrowserEvent('Updated');

        return redirect('eng/events');
        

    }

    public function mount($id)
    {
        $events = Events::with('psmtvchannel', 'tvchannel')->findOrfail($id);

        $this->event = $events;

       // dd($events);

        $this->state = $events->toArray();
      
    }

    public function render()
    {
        $channelspsm = Channels::where('title', 'PSM Channel')->get();
        $channelslocal = Channels::where('title', 'Local Channel')->get();
        $users = User::where('role', 'user')->get();
        return view('livewire.eng.events.edit-event', [
            'users' => $users,
            'channelspsm' => $channelspsm,
            'channelslocal' => $channelslocal,
        ]);
    }
}

