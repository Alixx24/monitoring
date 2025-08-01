<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestModelRequest;
use App\Models\RequestModel;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {

        return view('panel.request.index');
    }

    public function create()
    {
        return view('panel.request.create');
    }

    public function store(RequestModelRequest $reqValid)
    {
        $this->createRequest($reqValid);
        return redirect()->back();
    }

    public function createRequest(RequestModelRequest $reqValid)
    {
        $validated = $reqValid->validated();
        return RequestModel::create($validated);
    }
}
