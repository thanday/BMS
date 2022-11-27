<?php

namespace App\Http\Livewire\Eng\Reports;

use App\Models\Events;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class EventTechCount extends Component
{
    use WithPagination;
    public $searchTerm;
  
    public function downloadPDF()
    {
    
        $tech_lives = User::withCount('events_live_tech')->where('role', 'technician')->get();
        $pdf = PDF::loadView('livewire.eng.reports.TotalLiveTechPdf', compact('tech_lives'));
       return $pdf->download('total_live_by_technician.pdf');
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $tech_lives = User::withCount('events_live_tech')
                    ->where('role', 'technician')
                    ->where('name',  'like', $searchTerm)
                  //  ->orWhere('created_at','like', '%'.$searchTerm.'%')
                    ->paginate(10);
        return view('livewire.eng.reports.event-tech-count', [
            'tech_lives' => $tech_lives,
     
        ]);
    }
}
