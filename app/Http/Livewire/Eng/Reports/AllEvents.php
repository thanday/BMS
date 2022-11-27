<?php

namespace App\Http\Livewire\Eng\Reports;

use App\Models\Channels;
use App\Models\Events;
use Livewire\Component;
use PDF;

class AllEvents extends Component
{
    public $searchTerm;
    public $searchDate;
    public $byPerpage = 10;
    public $byEventType = null;


    public function downloadPDF()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $searchDate = '%' . $this->searchDate . '%';
        $events = Events::latest()->where('event_name',  'like', $searchTerm)->where('created_at', 'like', '%' . $searchDate . '%')->whereNotNull('live_end_time')->orderBy('event_date')->get();
        view()->share('events',$events);
        $pdf = PDF::loadView('livewire.eng.reports.EventsAllPdf', compact('events'));
        return $pdf->download('events_report.pdf');
    }

    public function render()
    {
        $allchannels = Channels::all();   
        $searchTerm = '%' . $this->searchTerm . '%';
        $searchDate = '%' . $this->searchDate . '%';
        return view('livewire.eng.reports.all-events', [
            'allchannels' => $allchannels,
            'events' => Events::when($this->byEventType, function($query){
                                $query->where('type', $this->byEventType);
            })
                ->where('event_name',  'like', $searchTerm)
                ->where('event_date', 'like', '%' . $searchDate . '%')
                ->whereNotNull('live_end_time')
                ->orderBy('event_date')
                ->paginate($this->byPerpage)
        ]);
    }
}
