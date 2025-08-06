<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CourseController;
use Modules\Course\Http\Controllers\LessonController;
use Modules\Course\Http\Controllers\TopicController;
use Modules\Course\Http\Controllers\ContentController;

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//     Route::apiResource('courses', CourseController::class)->names('course');
// });
Route::apiResource('courses', CourseController::class)->names('course');
Route::apiResource('lessons', LessonController::class)->names('lesson');
Route::apiResource('topics', TopicController::class)->names('topic');
Route::apiResource('contents', ContentController::class)->names('content');
Route::get('/contents/show_course/{content}', [ContentController::class, 'show_course']);