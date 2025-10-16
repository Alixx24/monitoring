<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserPanelController extends Controller
{
    public function index()
    {
        $fatchUsers = User::withCount('requests')->get();
        
        return view('panel.users.index', compact('fatchUsers'));
    }
}
