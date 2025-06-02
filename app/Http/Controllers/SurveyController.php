<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Surveyor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function index()
    {
        $questions = Question::with('choice')->get();
        return view('survey.index', compact('questions'));
    }
    public function create()
    {

        return view('survey.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'answers' => 'required|array',
        ]);

        $user = Auth::user();
        $surveyor = $user->surveyor;

        foreach ($request->answers as $question_id => $answer) {
            $question = Question::findOrFail($question_id);

            // Simpan jawaban
            $newAnswer = Answer::create([
                'surveyor_id' => $surveyor->id,
                'question_id' => $question_id,
                'answer_text' => $question->type === 'short_answer' ? $answer : null,
            ]);

            // Jika pilihan ganda multi jawaban
            if ($question->type === 'multiple_choice') {
                $newAnswer->options()->attach($answer); // $answer bisa array
            }
        }

        return redirect()->route('survey.index')->with('success', 'Jawaban berhasil disimpan.');
    }
    public function storeQuestionSurvey(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string',
            'type' => 'required|in:short_answer,multiple_choice',
            'question_id' => 'required|exists:questions,id',
        ]);

        $question = Question::create([
            'text' => $validated['text'],
            'type' => $validated['type'],
            'question_id' => $validated['question_id'],
        ]);

        if ($validated['type'] === 'multiple_choice' && $request->has('choices')) {
            foreach ($request->choices as $index => $choiceText) {
                if (trim($choiceText) !== '') {
                    $question->options()->create([
                        'text' => $choiceText,
                        'bobot' => $request->bobot_choices[$index] ?? 1,
                    ]);
                }
            }
        }

        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil disimpan.');
    }
}
