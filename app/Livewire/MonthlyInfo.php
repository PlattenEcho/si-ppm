<?php

namespace App\Livewire;

use Livewire\Component;

class MonthlyInfo extends Component
{
    public $selectedMonth; // Default to January

    public function render()
    {   
        $month = $this->selectedMonth;
        $info = [
            'revenue' => rand(1000, 5000),
            'expenses' => rand(500, 2000),
            'profit' => rand(500, 3000),
        ];

        return view('livewire.monthly-info', ['info' => $info, 'month' => $month]);
    }
}
