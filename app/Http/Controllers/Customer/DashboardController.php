<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Duration;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RequestModelRequest;
use App\Models\RequestModel;

class DashboardController extends Controller
{
    public function index($id)
    {

        $user = User::find($id);

        return view('customer.dashboard.index', compact('user'));
    }

    public function create()
    {

        $fetchDuration = Duration::all();
        return view('panel.request.create', compact('fetchDuration'));
        return view('components.create-request-modal', compact('fetchDuration'));
    }


    public function store(RequestModelRequest $reqValid)
    {
        $userId  = auth()->id();
        $this->createRequest($reqValid,$userId );
        // return redirect()->route('panel.request.index')->with('success', 'Request updated successfully');
    }


    public function createRequest(RequestModelRequest $reqValid ,$userId)
    {
        $validated = $reqValid->validated();

        $requestModel = RequestModel::create([
            'url' => $validated['url'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'duration_id' => $validated['duration_id'],
            'user_id' =>  $userId ,
            'status' => 'active',
            'last_visited' => null,
        ]);

        return $requestModel;
    }
}
