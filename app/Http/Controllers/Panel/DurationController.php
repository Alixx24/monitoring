<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\DurationtModelRequest;
use App\Models\Duration;
use Illuminate\Http\Request;

class DurationController extends Controller
{
    public function index()
    {
        $fatchDuration = Duration::all();
        return view('panel.duration.index', compact('fatchDuration'));
    }

    public function create()
    {
        dd(3);
        return view('panel.duration.create');
    }

    public function store(DurationtModelRequest $reqValid)
    {
        $this->createRequest($reqValid);
        return redirect()->route('panel.duration.index')->with('success', 'Request updated successfully');
    }

    public function createRequest(DurationtModelRequest $reqValid)
    {
        $validated = $reqValid->validated();

        $result = Duration::create([
            'duration' => $validated->duration,
            'user_id' => $validated->user_id,
        ]);

        dd($result);
    }
}
