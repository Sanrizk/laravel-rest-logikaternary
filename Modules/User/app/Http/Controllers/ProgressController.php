<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Models\Progress;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $response = [
        "message" => "Bad Request",
        "status" => 400
    ]; 

    public function index(Request $request)
    {
        $response = $this->response;
        
        if($request->header('x-api-key') == env('APP_API_KEY')) {
            $response = [
                "data" => Progress::all(),
                "message" => "Success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $response = $this->response;

        if($request->header('x-api-key') == env('APP_API_KEY')) {
            $data = $request->validate([
                "transaction_id" => "required|integer",
                "lesson_id" => "required|integer",
                "progress" => "required|integer",
                "progress_timestamp" => "required|integer",
            ]);
            Progress::create($data);

            $response = [
                "message" => "Success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);
    }

    /**
     * Show the specified resource.
     */
    public function show(Request $request, $id)
    {
        $response = $this->response;
        
        if($request->header('x-api-key') == env('APP_API_KEY')) {
            $response = [
                "data" => Progress::find($id),
                "message" => "Success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $response = $this->response;

        if($request->header('x-api-key') == env('APP_API_KEY')) {

            Progress::where('id', $id)->update([
                "transaction_id" => $request["transaction_id"],
                "lesson_id" => $request["lesson_id"],
                "progress" => $request["progress"],
                "progress_timestamp" => $request["progress_timestamp"],
            ]);

            $response = [
                "message" => "Success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id) {
        $response = $this->response;

        if($request->header('x-api-key') == env('APP_API_KEY')) {

            $data = Progress::find($id);
            $data->delete();

            $response = [
                "message" => "Success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);
    }
}
