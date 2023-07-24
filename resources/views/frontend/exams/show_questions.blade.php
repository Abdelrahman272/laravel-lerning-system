@extends('frontend.layouts.master')

@section('css')
@endsection

@section('الرئيسية')
@endsection

@section('content')

    <section class="exam-page mt-5" id="exam-page">
        <div class="container">
            <div class="container">
                <!-- -------------------------- -->
                <div class="text">
                    <h3 class="title-section">الامتحانات</h3>
                    <h6 class="mb-4">اختر الإجابة الصحيحة<span>ملحوظة: يجب حل الاختبار قبل الوقت المحدد حتى لا يقفل عليك
                            الامتحان ولم يتم بعث الامتحان</span></h6>
                </div>
                <form action="{{ route('submit-answers') }}" method="POST" id="exam-form">
                    @csrf
                    <div id="questions-container">
                        <!-- Questions will be dynamically loaded here -->
                        @foreach ($questions as $question)
                            <div class="row mt-4">
                                <div class="col-12 mb-4">
                                    <div class="question mb-1 d-flex flex-column">
                                        <div class="num_question mb-2">
                                            <span class="ms-2 mb-2 fs-5">({{ $loop->iteration }}</span>
                                            <h4 class="mb-0">{{ $question->question_text }}</h4>
                                        </div>
                                        <div class="answers">
                                            @foreach (explode("\n", $question->answers) as $answer)
                                                <div class="answer">
                                                    <input type="radio" name="answers[{{ $question->id }}]"
                                                        value="{{ $answer }}"
                                                        {{ (old('answers.' . $question->id) == $answer || (isset($selectedValues[$question->id]) && $selectedValues[$question->id] == $answer)) ? 'checked' : '' }}>
                                                    <span>{{ $answer }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($questions->count() > 0)
                    <div class="row mt-4">
                        <div class="col-12 mb-4 text-center">
                            <button type="submit" class="btn btn-primary">تسليم الامتحان</button>
                            @if ($questions->currentPage() > 1)
                                <a href="{{ $questions->previousPageUrl() }}"
                                    class="btn btn-primary prev-btn">السابق</a>
                            @endif
                            @if ($questions->hasMorePages())
                                <a href="{{ $questions->nextPageUrl() }}"
                                    class="btn btn-primary next-btn">التالي</a>
                            @elseif ($questions->currentPage() === 1)
                                <a href="{{ route('show-question', ['id' => $exam->id, 'page' => 1]) }}"
                                    class="btn btn-primary prev-btn">السابق</a>
                            @endif
                        </div>
                    </div>
                @endif

                </form>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to store the selected values
        function storeSelectedValues() {
            $('input[type="radio"]:checked').each(function() {
                var questionId = $(this).attr('name').split('[')[1].split(']')[0];
                var selectedValue = $(this).val();
                sessionStorage.setItem('question_' + questionId, selectedValue);
            });
        }

        // Function to restore the selected values
        function restoreSelectedValues() {
            $('input[type="radio"]').each(function() {
                var questionId = $(this).attr('name').split('[')[1].split(']')[0];
                var selectedValue = sessionStorage.getItem('question_' + questionId);
                if (selectedValue && selectedValue === $(this).val()) {
                    $(this).prop('checked', true);
                }
            });
        }

        // Handle form submission
        $('#exam-form').on('submit', function() {
            storeSelectedValues(); // Store selected values before submitting the form
        });

        // Restore selected values on page load
        $(document).ready(function() {
            restoreSelectedValues();
        });

        // Store selected values before navigating to the previous or next page
        $('a.next-btn').on('click', function(e) {
            e.preventDefault();
            storeSelectedValues();
            var url = $(this).attr('href');

            // Use AJAX to load the next page content
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                success: function(response) {
                    // Update the questions container with the new content
                    $('#questions-container').html($(response).find('#questions-container').html());

                    // Restore the selected values
                    restoreSelectedValues();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection

