<?php

// app/Http/Controllers/QuestionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function show($id = 1)
    {
        $question = Question::find($id);

        if (!$question) {
            return redirect()->route('questionnaire.show', ['id' => 1])
                ->with('error', 'Pertanyaan tidak ditemukan.');
        }

        return view('questionnaire', compact('question'));
    }

    public function next(Request $request)
    {
        // Ambil ID pertanyaan sekarang
        $currentId = $request->input('question_id'); // pastikan hidden input `question_id` dikirim dari form

        // Increment untuk pertanyaan selanjutnya
        $nextId = $currentId + 1;

        return redirect()->route('questionnaire.show', ['id' => $nextId]);
    }
}
