<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function select_subject()
    {
        return view('pages.select-subject', [
            'subjects' => Subject::all(),
        ]);
    }

    public function select_topic(Subject $subject)
    {
        return view('pages.select-topic', [
            'topics' => Topic::where('subject_id', $subject->id)->get(),
        ]);
    }

    public function show_questions(Topic $topic)
    {
        return view('pages.questions', [
            'topic' => $topic,
        ]);
    }
}
