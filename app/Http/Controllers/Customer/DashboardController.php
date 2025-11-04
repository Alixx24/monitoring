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

    private $userId;

    public function __construct()
    {
        $this->userId = auth()->id();
    }

    public function index($id)
    {

        $user = User::find($id);

       $userId = $this->userId;
        $fetchRequest = RequestModel::with('duration')->where('user_id', $userId)->get();

        return view('customer.dashboard.index', compact('user', 'fetchRequest'));
    }

    public function create()
    {

        $fetchDuration = Duration::all();
        return view('panel.request.create', compact('fetchDuration'));
        return view('components.create-request-modal', compact('fetchDuration'));
    }



    public function countRequests(RequestModelRequest $reqValid)
    {
        $userId  = $this->userId;
        return RequestModel::where('user_id', $userId)->count();
    }

    public function store(RequestModelRequest $reqValid)
    {

        $userId  = $this->userId;
        $requestCount = $this->countRequests($reqValid);

        if ($requestCount >= 5) {
            return redirect()->back()->with('error', 'نمیتونید بیش از 5request ایجاد کنید');
        }

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
