<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pertanyaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-100">
    
<div class="flex min-h-screen bg-[#f1f1e8]">
    <!-- Left Panel -->
    <div class="w-1/2 bg-[#e9cfc4] p-12 flex flex-col justify-center">
        <p class="text-sm font-semibold">Pertanyaan {{ $question->id }}/10</p>
        <h1 class="text-4xl font-extrabold mt-2 text-[#4a0000]">{{ $question->question_text }}</h1>
        <p class="text-sm mt-4">Pilih satu jawaban</p>
    </div>

    <!-- Right Panel -->
    <div class="w-1/2 p-12 flex flex-col h-screen">
        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset('img/Logo Project revisi.png') }}" alt="Stay Buddy" class="h-40">
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('questionnaire.next') }}" class="flex flex-col flex-grow">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">

            <!-- Opsi -->
            <div class="flex flex-col flex-grow justify-center space-y-4">
                @foreach (['option_1', 'option_2', 'option_3', 'option_4'] as $opt)
                    @if (!empty($question->$opt))
                        <label class="flex items-center justify-between border border-red-300 rounded-md px-4 py-3 bg-[#f0f6f3] cursor-pointer hover:bg-orange-500 transition">
                            <div class="flex items-center space-x-3">
                                <input type="radio" name="answer" value="{{ $question->$opt }}" class="form-radio text-red-600" required>
                                <span class="text-gray-800">{{ $question->$opt }}</span>
                            </div>
                            {{-- <span class="text-yellow-400 text-xl">⚡</span> --}}
                        </label>
                    @endif
                @endforeach
            </div>

            <!-- Navigation -->
            <div class="flex justify-center mt-8 space-x-4">
                @if ($question->id > 1)
                    <a href="{{ route('questionnaire.show', ['id' => $question->id - 1]) }}" class="px-6 py-2 border border-red-900 text-red-900 rounded-md">Previous</a>
                @endif
                <button type="submit" class="px-6 py-2 bg-red-900 text-white rounded-md">Next →</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>