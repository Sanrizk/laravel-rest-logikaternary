<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Course\Models\Topic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $response = [
        "message" => "Bad Request",
        "status" => 400,
    ];
    
    public function index(Request $request)
    {
        // return view('course::index');
        $response = $this->response;

        if($request->header('x-api-key') == env('APP_API_KEY')) {
            $response = [
                "data" => Topic::with('lesson')->get(),
                "message" => "success",
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
        return view('course::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $response = $this->response;

        if($request->header('x-api-key') == env('APP_API_KEY')) {
            $data = $request->validate([
                "topic_name" => "required|max:55",
                "lesson_id" => "required|integer"
            ]);

            Topic::create($data);

            $response = [
                "message" => "success",
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
            $data = Topic::find($id);
            $data["lesson"] = Topic::find($id)->lesson["title"];

            $response = [
                "data" => $data,
                "message" => "success",
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
        return view('course::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $response = $this->response;

        if($request->header('x-api-key') == env('APP_API_KEY')) {
            Topic::find($id)->update([
                'topic_name' => $request["topic_name"],
                'lesson_id' => $request["lesson_id"],
            ]);

            $response = [
                "message" => "success",
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
            $data = Topic::find($id);
            $data->delete();

            $response = [
                "message" => "success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);    
    }
}
