<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Duration;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('components.create-request-modal',compact('fetchDuration'));
    }
}
