<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Models\Transaction;

class TransactionController extends Controller
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
                "data" => Transaction::all(),
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
                "course_id" => "required|integer",
                "user_id" => "required|integer",
                "amount" => "required|integer",
                "status" => "required|max:55",
                "description" => "required|max:255",
            ]);
            Transaction::create($data);

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
                "data" => Transaction::find($id),
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

            Transaction::where('id', $id)->update([
                "course_id" => $request["course_id"],
                "user_id" => $request["user_id"],
                "amount" => $request["amount"],
                "status" => $request["status"],
                "description" => $request["description"],
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

            $data = Transaction::find($id);
            $data->delete();

            $response = [
                "message" => "Success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);
    }
}
