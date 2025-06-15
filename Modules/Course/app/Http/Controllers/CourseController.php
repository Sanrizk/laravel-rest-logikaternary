<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Course\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return view('course::index');
        $response = [
            "message" => "Bad Request",
            "status" => 400
        ];
        
        if($request->header('x-api-key') == env('APP_API_KEY')) {
            $response = [
                "data" => Course::all(),
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
        return view('course::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $response = [
            "message" => "Bad Request",
            "status" => 400
        ];

        if($request->header('x-api-key') == env('APP_API_KEY')) {
            $data = $request->validate([
                "title" => "required|max:255",
                "description" => "required|max:255",
                "requiredPoints" => "required",
            ]);
            Course::create($data);

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
        // return view('course::show');
        $response = [
            "message" => "Bad Request",
            "status" => 400
        ];
        
        if($request->header('x-api-key') == env('APP_API_KEY')) {
            $response = [
                "data" => Course::find($id),
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
        return view('course::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {

        $response = [
            "message" => "Bad Request",
            "status" => 400
        ];

        if($request->header('x-api-key') == env('APP_API_KEY')) {

            Course::where('id', $id)->update([
                "title" => $request["title"],
                "description" => $request["description"],
                "requiredPoints" => $request["requiredPoints"]
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
        $response = [
            "message" => "Bad Request",
            "status" => 400
        ];

        if($request->header('x-api-key') == env('APP_API_KEY')) {

            $data = Course::find($id);
            $data->delete();

            $response = [
                "message" => "Success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);
    }
}
