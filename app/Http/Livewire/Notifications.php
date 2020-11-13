<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\SalesDisposition;
use Illuminate\Support\Facades\Log;

class Notifications extends Component
{
    protected $listeners = ['echo:users,LeadAcknowledged' => 'decrement'];

    public $notificationCount;

    public $count;

    public function decrement($data)
    {
        if ($data['userId'] == auth()->id()) {
            $this->notificationCount = $this->notificationCount - 1;
        }
    }

    public function mount()
    {
        $this->notificationCount = auth()->user()->leads()->where('sales_disposition_id', SalesDisposition::NEW)->count();
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
