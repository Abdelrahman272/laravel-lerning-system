@extends('admin.layouts.master')

@section('title')
    الاجابة على السؤال الطالب
@endsection

@section('css')
@endsection

@section('title-one')
الاجابة على السؤال الطالب
@endsection

@section('title-two')
الاجابة على السؤال الطالب
@endsection

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    سؤال الطالب
                </div>
                <div class="card-body">
                    <p>{{ $ask->question }}</p>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    الإجابة
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.student-asks.store', $ask->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="answer">إجابتك</label>
                            <textarea class="form-control" name="answer" id="answer" rows="5">
                                @foreach ($answers as $answer)
                                    {{ $answer->answer }}
                                @endforeach
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ الإجابة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
