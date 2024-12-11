<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Diagnosis - Menpy AI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-white">
    <x-navbar />

    <div class="min-h-[calc(100vh-100px)] max-w-7xl mx-auto px-4 pb-24 pt-8 md:pt-12 lg:pt-8 xl:pt-12">
        <form id="diagnosis-form" action="{{ route('front.diagnosis.process') }}" method="POST">
            @csrf
            <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold tracking-tighter text-center">
                Answer the Questions
            </h1>
            <p class="px-2 my-6 md:max-w-xl lg:max-w-2xl text-sm lg:text-base mx-auto text-center">
                Silahkan jawab beberapa pertanyaan ini dengan senang hati ya, Menpy AI akan membantu kamu untuk
                mengetahui kemungkinan penyakit mental kamu yaa.
            </p>
            <div class="relative overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out" id="questions-container">
                    @foreach ($questions as $index => $question)
                        <div class="w-full flex-shrink-0 p-2 lg:p-8" data-question="{{ $index + 1 }}">
                            <div
                                class="lg:h-72 mb-8 mx-4 p-8 flex flex-col items-center justify-center rounded-xl border border-gray-200 shadow-xl lg:shadow-2xl">
                                {{-- <h2 class="mb-8 text-gray-900 text-3xl font-bold text-center">

                                </h2> --}}

                                <p class="text-gray-700 text-2xl text-center mb-12">
                                    <strong>Pertanyaan {{ $index + 1 }}:</strong> {{ $question->question_text }}
                                </p>

                                <div class="w-full xl:w-3/4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                                    <label class="col-span-1 cursor-pointer group">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="never"
                                            class="hidden" required>
                                        <div
                                            class="bg-white border-2 border-gray-200 rounded-xl p-4 text-center transition-all duration-200 group-hover:border-gray-400 group-hover:shadow-md">
                                            <span class="text-gray-500 group-hover:text-gray-500">Tidak
                                                Pernah</span>
                                        </div>
                                    </label>
                                    <label class="col-span-1 cursor-pointer group">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="rarely"
                                            class="hidden" required>
                                        <div
                                            class="bg-white border-2 border-gray-200 rounded-xl p-4 text-center transition-all duration-200 group-hover:border-gray-400 group-hover:shadow-md">
                                            <span class="text-gray-500 group-hover:text-gray-500">Jarang</span>
                                        </div>
                                    </label>
                                    <label class="col-span-1 cursor-pointer group">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="sometimes"
                                            class="hidden" required>
                                        <div
                                            class="bg-white border-2 border-gray-200 rounded-xl p-4 text-center transition-all duration-200 group-hover:border-gray-400 group-hover:shadow-md">
                                            <span class="text-gray-500 group-hover:text-gray-500">Kadang-kadang</span>
                                        </div>
                                    </label>
                                    <label class="col-span-1 cursor-pointer group">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="often"
                                            class="hidden" required>
                                        <div
                                            class="bg-white border-2 border-gray-200 rounded-xl p-4 text-center transition-all duration-200 group-hover:border-gray-400 group-hover:shadow-md">
                                            <span class="text-gray-500 group-hover:text-gray-500">Sering</span>
                                        </div>
                                    </label>
                                    <label class="col-span-1 cursor-pointer group">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="very_often"
                                            class="hidden" required>
                                        <div
                                            class="bg-white border-2 border-gray-200 rounded-xl p-4 text-center transition-all duration-200 group-hover:border-gray-400 group-hover:shadow-md">
                                            <span class="text-gray-500 group-hover:text-gray-500">Sangat
                                                Sering</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="">
                <div class="w-1/2 mx-auto bg-gray-200 rounded-full h-2 mb-2">
                    <div class="bg-gray-900 h-2 rounded-full transition-all duration-500" id="progress-bar"
                        style="width: 0%">
                    </div>
                </div>
                <p class="text-center text-gray-600" id="question-counter">Question 1 of {{ $questions->count() }}</p>
            </div>
        </form>
    </div>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('diagnosis-form');
            const container = document.getElementById('questions-container');
            const progressBar = document.getElementById('progress-bar');
            const questionCounter = document.getElementById('question-counter');
            const totalQuestions = {{ $questions->count() }};
            let currentQuestion = 1;

            // Handle radio button changes
            form.addEventListener('change', function(e) {
                if (e.target.type === 'radio') {
                    if (currentQuestion < totalQuestions) {
                        // Move to next question
                        currentQuestion++;
                        updateQuestion();
                    } else {
                        // Submit form on last question
                        form.submit();
                    }
                }
            });

            function updateQuestion() {
                // Update container position
                const offset = -(currentQuestion - 1) * 100;
                container.style.transform = `translateX(${offset}%)`;

                // Update progress bar
                const progress = (currentQuestion / totalQuestions) * 100;
                progressBar.style.width = `${progress}%`;

                // Update counter text
                questionCounter.textContent = `Question ${currentQuestion} of ${totalQuestions}`;
            }

            // Style selected answers
            form.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    const parentQuestion = this.closest('[data-question]');
                    parentQuestion.querySelectorAll('.border-2').forEach(div => {
                        div.classList.remove('border-gray-400', 'bg-gray-50');
                        div.classList.add('border-gray-200');
                    });
                    this.parentElement.querySelector('div').classList.remove('border-gray-200');
                    this.parentElement.querySelector('div').classList.add('border-gray-400',
                        'bg-gray-50');
                });
            });
        });
    </script>
</body>

</html>
