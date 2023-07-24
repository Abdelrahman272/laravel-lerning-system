@extends('frontend.layouts.master')


@section('css')
@endsection

@section('الرئيسية')
@endsection



@section('content')

    <section class="ask-teacher-page">
        <div class="container">

            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
            <div class="text">
                <h3 class="title-section">اسأل معلمك</h3>
            </div>
            <div class="row mt-2">
                <div class="col-12 big">
                    <h4>ضع سؤالك هنا</h4>
                    <form action="{{ route('ask.store') }}" method="post">
                        @csrf

                        <textarea name="question" class="form-control" placeholder="السؤال هنا"></textarea>

                        <div>
                            @if ($errors->has('question'))
                                <span class="text-danger">{{ $errors->first('question') }}</span>
                            @endif
                        </div>

                        <button class="btn">ابعت سؤالك</button>
                    </form>
                </div>
            </div>

            <hr class="mt-5">
        </div>

    </section>
@endsection

@section('js')
@endsection
