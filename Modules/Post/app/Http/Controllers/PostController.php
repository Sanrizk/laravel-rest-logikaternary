<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Post\Models\Post;

class PostController extends Controller
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
        // return view('post::index');
        $response = $this->response;

        if($request->header("x-api-key") == env("APP_API_KEY")) {
            $response = [
                // "data" => $data,
                "data" => Post::with(['category', 'menthor'])->get(),
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
        // return view('post::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $response = $this->response;

        if($request->header('x-api-key') == env('APP_API_KEY')) {
            $data = $request->validate([
                "title" => "required|max:55",
                "content" => "required",
                "category_id" => "required|integer",
                "menthor_id" => "required|integer"
            ]);

            Post::create($data);

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
        // return view('post::show');
        $response = $this->response;

        if($request->header("x-api-key") == env("APP_API_KEY")) {
            
            $data = Post::find($id);
            $data["category"] = Post::find($id)->category["category"];
            $data["menthor"] = Post::find($id)->menthor["admin_name"];
            $response = [
                "data" => $data,
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
        // return view('post::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $response = $this->response;

        if($request->header("x-api-key") == env("APP_API_KEY")) {
            Post::where('id', $id)->update([
                "title" => $request["title"],
                "content" => $request["content"],
                "category_id" => $request["category_id"],
                "menthor_id" => $request["menthor_id"]
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

        if($request->header("x-api-key") == env("APP_API_KEY")) {
            $data = Post::find($id);
            $data->delete();

            $response = [
                "message" => "Success",
                "status" => 200
            ];            
        }

        return response()->json($response, $response["status"]);
    }
}
