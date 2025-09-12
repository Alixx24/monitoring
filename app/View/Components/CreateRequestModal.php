<?php
namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Duration;

class CreateRequestModal extends Component
{
    public $fetchDuration;

    public function __construct()
    {
        $this->fetchDuration = Duration::all();
    }

    public function render()
    {
        return view('components.create-request-modal');
    }
}