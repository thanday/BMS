<?php

namespace App\Http\Livewire\Eng\Channels;

use App\Models\Channels;
use App\Models\Events;
use Livewire\Component;
use Livewire\WithPagination;

class ChannelEvents extends Component
{
    use WithPagination;
    public function mount($id)
    {
        $channels = Channels::findOrfail($id);

        $this->channels = $channels;
      
    }

    public function render()
    {
        // $events = Events::latest()->paginate(1);
        return view('livewire.eng.channels.channel-events', [
            // 'events' => $events,
        ]);
    }
}
