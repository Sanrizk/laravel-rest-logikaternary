<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Course\Models\Content;

use Modules\Course\Models\Lesson;
use Modules\Course\Models\Topic;
use Modules\Course\Models\Course;

class ContentController extends Controller
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
                "data" => Content::with('topic')->get(),
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
                "topic_id" => "required|integer",
                "title" => "required|max:55",
                "content" => "required|max:255"
            ]);

            Content::create($data);

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
            $data = Content::find($id);
            $data["topic"] = Content::find($id)->topic["topic_name"];

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
            Content::find($id)->update([
                'topic_id' => $request["topic_id"],
                'title' => $request["title"],
                'content' => $request["content"],
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
            $data = Content::find($id);
            $data->delete();

            $response = [
                "message" => "success",
                "status" => 200
            ];
        }

        return response()->json($response, $response["status"]);    
    }

    public function show_course(Request $request, $id) {
        $response = $this->response;

        if($request->header('x-api-key') == env('APP_API_KEY')) {
            // $data = Content::find($id);
            // $data["topic"] = Content::find($id)->topic["topic_name"];

            $topicId = Content::find($id)->topic["id"];
            $lessonId = Topic::find($topicId)->lesson["id"];
            $courseId = Lesson::find($lessonId)->course["id"];

            $data = Content::find($id);
            $data["topic"] = Content::find($id)->topic;
            $data["lesson"] = Lesson::find($lessonId);
            $data["course"] = Course::find($courseId);

            $response = [
                "data" => $data,
                // "data" => Content::find($id),
                // "data" => [
                //     Content::find($id),
                //     "topic" => Content::find($id)->topic,
                //     "lesson" => Lesson::find($lessonId),
                //     "course" => Course::find($courseId)
                // ],
                "message" => "success",
                "status" => 200
            ];            
        }

        return response()->json($response, $response["status"]);
    }
}
