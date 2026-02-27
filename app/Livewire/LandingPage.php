<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CompanyPresentation;
use App\Models\Servicio;

class LandingPage extends Component
{
    public function render()
    {
        return view('livewire.landing-page', [
            'presentation' => CompanyPresentation::first(),
            'servicios' => Servicio::all(),
        ])->layout('layouts.landing');
    }
}
