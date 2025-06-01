<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Models\Question;
use App\Models\Choice;
use App\Models\KategoriSurvey;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Surveyor;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $questions = Question::with('choices')->get();

        return view('user.answer.index', compact('questions'));
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
                $newAnswer->choices()->attach($answer); // $answer bisa array
            }
        }

        return redirect()->route('dashboard.user')->with('success', 'Jawaban berhasil disimpan.');
    }

    public function indexKuisioner()
    {

        $user = Auth::user();
        $surveyor = $user->surveyor;

        // Ambil semua jawaban surveyor dengan relasi tema dan choices
        $answers = Answer::with(['question.tema', 'choices'])
            ->where('surveyor_id', $surveyor->id)
            ->get();

        // Hitung skor total dan rata-rata per tema
        $scoresByTema = $answers->groupBy('question.tema.id')->map(function ($group) {
            $tema = $group->first()->question->tema;

            $totalBobot = 0;

            foreach ($group as $answer) {
                foreach ($answer->choices as $choice) {
                    $totalBobot += $choice->bobot ?? 0;
                }
            }

            return [
                'tema' => $tema,
                'total_score' => $totalBobot,
            ];
        })->values();

        return view('user.answer.review-home', compact('scoresByTema', 'surveyor'));
    }




    public function review()
    {
        $user = Auth::user();
        $surveyor = $user->surveyor;

        // Ambil jawaban user beserta relasi question dan choices
        $answers = Answer::with(['question.choices', 'choices'])
            ->where('surveyor_id', $surveyor->id)
            ->get();

        return view('user.answer.review', compact('answers'));
    }
    public function edit($id)
    {
        $surveyor = Surveyor::findOrFail($id); // Ambil surveyor berdasarkan ID yang dikirim
        $answers = Answer::with(['question.choices', 'choices'])
            ->where('surveyor_id', $surveyor->id)
            ->get();

        return view('user.answer.edit', compact('answers', 'surveyor'));
    }

    public function update(Request $request, $id)
    {
        $surveyor = Surveyor::findOrFail($id);
        foreach ($request->input('answers') as $answerId => $value) {
            $answer = Answer::find($answerId);
            if ($answer->question->type === 'multiple_choice') {
                $answer->choices()->sync($value); // sync pilihan baru
            } else {
                $answer->text_answer = $value;
                $answer->save();
            }
        }

        return redirect()->route('answer.review')->with('success', 'Jawaban berhasil diperbarui!');
    }
}
