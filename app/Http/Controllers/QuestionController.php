<?php

namespace App\Http\Controllers;


use App\Models\Question;
use App\Models\Choice;
use App\Models\TemaKuisioner;
use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $questions = Question::with('choices')->get();

        if ($user->role->value === 'admin') {
            return view('admin.questions.index', compact('questions'));
        } else {

            return view('questions.index', compact('questions'));
        }
    }

    public function indexList()
    {

        $user = Auth::user();
        $surveyor = $user->surveyor;

        // Ambil semua tema yang dibuat admin
        $allTemas = TemaKuisioner::all();

        // Ambil tema yang sudah pernah dikerjakan surveyor
        $answeredTemaIds = Answer::where('surveyor_id', $surveyor->id)
            ->with('question.tema')
            ->get()
            ->pluck('question.tema.id')
            ->unique();

        // Filter tema yang belum pernah dikerjakan surveyor
        $unansweredTemas = $allTemas->filter(function ($tema) use ($answeredTemaIds) {
            return !$answeredTemaIds->contains($tema->id);
        })->values();

        return view('user.questioner.list', compact('unansweredTemas'));
    }




    public function create()
    {
        $temaList = TemaKuisioner::all();
        return view('admin.questions.create', compact('temaList'));
    }




    public function store(Request $request)
    {


        $validated = $request->validate([
            'text' => 'required|string',
            'type' => 'required|in:short_answer,multiple_choice',
            'tema_id' => 'required|exists:tema_quisioners,id',
        ]);

        $question = Question::create([
            'text' => $validated['text'],
            'type' => $validated['type'],
            'tema_id' => $validated['tema_id'],
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
    public function storeJawaban(Request $request)
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
    public function review()
    {
        $user = Auth::user();
        $surveyor = $user->surveyor;

        // Ambil jawaban user beserta relasi question dan choices
        $answers = Answer::with(['question.choices', 'choices'])
            ->where('surveyor_id', $surveyor->id)
            ->get();

        return view('questions.review', compact('answers'));
    }
}
