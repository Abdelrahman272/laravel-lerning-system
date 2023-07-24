@extends('frontend.layouts.master')


@section('css')
@endsection

@section('الرئيسية')
@endsection



@section('content')

<section class="answer-teacher-page">
    <div class="container">
        <div class="text">
            <h3 class="title-section mb-4">اجابة سؤالك</h3>
        </div>
        @foreach ($asks as $ask)
        <div class="row mb-3">
            <div class="col-12 answer">
                <p>سؤالك هو: <span>{{ $ask->question }}</span></p>
                @if ($ask->answers->isNotEmpty())
                    @foreach ($ask->answers as $answer)
                    <p class="answer-question">اجابة سؤالك هو: <span>{{ $answer->answer }}</span></p>
                    @endforeach
                @else
                    <p class="answer-question">لا يوجد إجابة حاليًا.</p>
                @endif
            </div>
        </div>
        @endforeach
        {{ $asks->links() }} <!-- Pagination links -->
    </div>
</section>


@endsection

@section('js')
@endsection
