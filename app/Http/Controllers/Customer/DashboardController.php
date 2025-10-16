<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Duration;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RequestModelRequest;
use App\Models\RequestModel;
use App\Models\StatusUrl;

class DashboardController extends Controller
{
    public function index($id)
    {

        $user = User::find($id);

        $userId = auth()->user()->id;
        $fetchRequest = RequestModel::where('user_id', $userId)->get();

        return view('customer.dashboard.index', compact('user', 'fetchRequest'));
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
        $this->createRequest($reqValid, $userId);

        return redirect()->back()->with('success', 'Request created successfully');
    }


    public function createRequest(RequestModelRequest $reqValid, $userId)
    {
        $validated = $reqValid->validated();

        $requestModel = RequestModel::create([
            'url' => $validated['url'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'duration_id' => $validated['duration_id'],
            'user_id' =>  $userId,
            'status' => 1,
            'last_visited' => null,
        ]);

        return $requestModel;
    }

    public function analysis($id, $linkId)
    {
        $user = User::find($id);
        $fetchUrls = RequestModel::where('user_id', $id)->where('id', $linkId)->first();


        $fetchRequestStatus = StatusUrl::with('request')->where('request_id', $linkId)->paginate(20);

        return view('customer.dashboard.analysis', compact('user', 'fetchUrls', 'fetchRequestStatus'));
    }
    public function delete($linkId, $id)
    {
        $this->deleteAction($linkId, $id);
        return redirect()->back()->with('success', 'Request created successfully');
    }


    public function deleteAction($linkId, $id)
    {

        $findRequest = RequestModel::where('id', $linkId)->first();
        $findRequest->delete();
    }


    public function updateStatus(Request $request, $id)
    {
        $item = RequestModel::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        return response()->json(['success' => true]);
    }
}
