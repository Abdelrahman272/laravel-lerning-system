@extends('admin.layouts.master')

@section('title')
    الاسئلة
@endsection

@section('css')
@endsection

@section('title-one')
    الاسئلة
@endsection

@section('title-two')
    الاسئلة
@endsection


@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.questions.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">إضافة سؤال</div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">الصف الدراسي</label>
                            <div class="col-md-9">
                                <select name="exam_id" class="form-select" aria-label="Default select example">
                                    <option>اختر الامتحان</option>
                                    @foreach ($exams as $exam)
                                        <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('exam_id'))
                                    <span class="text-danger">{{ $errors->first('exam_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">السؤال:</label>
                            <div class="col-md-9">
                                <input name="question_text" type="text" class="form-control">
                                @if ($errors->has('question_text'))
                                    <span class="text-danger">{{ $errors->first('question_text') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">الدرجات</label>
                            <div class="col-md-9">
                                <input name="score" type="number" class="form-control">
                                @if ($errors->has('score'))
                                    <span class="text-danger">{{ $errors->first('score') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">
                                الاجابه
                                <span class="text-danger"> - ضع الخيارات في كل سطر بمفرده </span>
                            </label>
                            <div class="col-md-9">
                                <textarea name="answers" id="options" required class="form-control"></textarea>
                                @if ($errors->has('answers'))
                                    <span class="text-danger">{{ $errors->first('answers') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">الإجابة الصحيحة:</label>
                            <div class="col-md-9">
                                <input name="is_correct" type="text" class="form-control">
                                @if ($errors->has('is_correct'))
                                    <span class="text-danger">{{ $errors->first('is_correct') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-6 text-start">
                                <button type="submit" class="btn btn-success p-2">حفظ وإضافة سؤال اخر</button>
                            </div>
                        </div>
                        <!--End Row-->
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
