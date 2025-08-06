<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Course\Models\Lesson;

class LessonController extends Controller
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
        $response = $this->response;

        if($request->header('x-api-key') == env('APP_API_KEY')) {
            $response = [
                "data" => Lesson::with(['course', 'menthor'])->get(),
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
                "title" => "required|max:55",
                "description" => "required|max:255",
                "price" => "required|integer",
                "course_id" => "required|integer",
                "menthor_id" => "required|integer"
            ]);

            Lesson::create($data);

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
            $data = Lesson::find($id);
            $data["course"] = Lesson::find($id)->course["title"];
            $data["menthor"] = Lesson::find($id)->menthor["admin_name"];

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
            Lesson::find($id)->update([
                'title' => $request["title"],
                'description' => $request["description"],
                'price' => $request["price"],
                'course_id' => $request["course_id"],
                'menthor_id' => $request["menthor_id"],
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
            $data = Lesson::find($id);
            $data->delete();

            $response = [
                "message" => "success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);    
    }
}
