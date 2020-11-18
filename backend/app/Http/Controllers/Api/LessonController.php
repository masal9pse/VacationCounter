<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lesson;

class LessonController extends Controller
{
    public function allIndex(Request $request)
    {
        $data = Lesson::where('user_id', $request->user()->id)->get();

        return $data;
    }

    public function lessonCreate(Request $request)
    {
        $request->validate([
            'lesson' => 'required',
            'memo' => 'nullable',
        ]);

        $lesson = Lesson::create([
            'lesson' => $request->lesson,
        ]);

        //return response()->json([
        //    'lesson' => $lesson,
        //    'message' => '投稿に成功しました。'
        //], 200);
        return ['lesson' => $lesson];
    }

    public function destroy($id)
    {
        $lesson = Lesson::find($id)->delete();
        //return ['lesson' => $lesson];

        return response()->json([
            'lesson' => $lesson, // boolean
            'message' => '投稿の削除に成功しました。'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $lesson->count = $request->count;
        $lesson->save();

        return response()->json([
            'lesson' => $lesson,
            'message' => 'カウントアップに成功しました。'
        ], 200);
    }
}
