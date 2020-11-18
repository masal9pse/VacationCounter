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
        $lesson = new Lesson();
        $lesson->lesson = $request->lesson;
        $lesson->save();
        return redirect('api/lessoncreate');
    }

    public function destroy($id)
    {
        Lesson::find($id)->delete();
        return response('', 200);
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $lesson->count = $request->count;
        $lesson->save();

        return response('', 200);
    }
}
