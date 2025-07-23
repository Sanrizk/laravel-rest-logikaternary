<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Post\Models\Category;

class CategoryController extends Controller
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

        if($request->header('x-api-key') == env("APP_API_KEY")) {
            $response = [
                "data" => Category::all(),
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
        return view('post::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $response = $this->response;

        if($request->header('x-api-key') == env("APP_API_KEY")) {
            $data = $request->validate([
                "category" => "required|max:255"
            ]);
            Category::create($data);

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
    public function show(Request $request,$id)
    {
        $response = $this->response;

        if($request->header('x-api-key') == env("APP_API_KEY")) {
            $response = [
                "data" => Category::find($id),
                "message" => "Success",
                "status" => 200,
            ];
        }

        return response()->json($response, $response["status"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // return view('post::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $response = $this->response;

        if($request->header('x-api-key') == env("APP_API_KEY")) {
            Category::where('id', $id)->update([
                "category" => $request["category"]
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

        if($request->header('x-api-key') == env("APP_API_KEY")) {
            $data = Category::find($id);
            $data->delete();
            
            $response = [
                "message" => "Success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);
    }
}
