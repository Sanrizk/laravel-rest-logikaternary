<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\User\Models\Reply;

class ReplyController extends Controller
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
                "data" => Reply::all(),
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
                "content_reply" => "required|max:255",
                "forum_id" => "required|integer",

                // field which is not required
                // "user_reply_id" => "required|integer",
                // "admin_reply_id" => "required|integer",
            ]);
            Reply::create($data);

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
                "data" => Reply::find($id),
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
            // ['content_reply', 'forum_id', 'user_reply_id', 'admin_reply_id']
            Reply::where('id', $id)->update([
                "content_reply" => $request["content_reply"],
                "forum_id" => $request["forum_id"],
                "user_reply_id" => $request["user_reply_id"],
                "admin_reply_id" => $request["admin_reply_id"],
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

            $data = Reply::find($id);
            $data->delete();

            $response = [
                "message" => "Success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);
    }
}
