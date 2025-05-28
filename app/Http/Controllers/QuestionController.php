<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Choice;
use App\Models\KategoriSurvey;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('choices')->get();

        return view('questions.index', compact('questions'));
    }
    public function create()
    {
        $kategoriList = KategoriSurvey::all();
        return view('questions.create', compact('kategoriList'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'text' => 'required|string',
    //         'type' => 'required|in:short_answer,multiple_choice',
    //         'bobot' => 'required|integer|min:1',
    //         'kategori_id' => 'required|exists:kategori_surveys,id',
    //         'choices' => 'array',
    //         'choices.*' => 'string|nullable',
    //     ]);

    //     $question = Question::create([
    //         'text' => $request->text,
    //         'type' => $request->type,
    //         'bobot' => $request->bobot,
    //         'kategori_id' => $request->kategori_id,
    //     ]);

    //     if ($request->type === 'multiple_choice' && $request->choices) {
    //         foreach ($request->choices as $choiceText) {
    //             if (!empty($choiceText)) {
    //                 $question->choices()->create([
    //                     'text' => $choiceText,
    //                 ]);
    //             }
    //         }
    //     }

    //     // if ($validated['type'] === 'multiple_choice' && !empty($validated['choices'])) {
    //     //         foreach ($validated['choices'] as $choiceText) {
    //     //             if (!empty($choiceText)) {
    //     //                 $question->choices()->create(['text' => $choiceText]);
    //     //             }
    //     //         }
    //     //     }




    //     return redirect()->route('questions.create')->with('success', 'Pertanyaan berhasil disimpan.');
    // }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string',
            'type' => 'required|in:short_answer,multiple_choice',
            'kategori_id' => 'required|exists:kategori_surveys,id',
        ]);

        $question = Question::create([
            'text' => $validated['text'],
            'type' => $validated['type'],
            'kategori_id' => $validated['kategori_id'],
        ]);

        if ($validated['type'] === 'multiple_choice' && $request->has('choices')) {
            foreach ($request->choices as $index => $choiceText) {
                if (trim($choiceText) !== '') {
                    $question->choices()->create([
                        'text' => $choiceText,
                        'bobot' => $request->bobot_choices[$index] ?? 1,
                    ]);
                }
            }
        }

        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil disimpan.');
    }
}
