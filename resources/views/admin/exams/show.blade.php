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
        <div class="col-12 col-sm-12">
            <div class="card d-flex justify-content-center">
                <div class="card-body pt-4">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> السؤال</th>
                                <th> الاجابة الصحيحة</th>
                                <th> الاجابات</th>
                                <th> الدرجة </th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @forelse ($questions as $question)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$question->question_text}}</td>
                                    <td>{{$question->answers}}</td>
                                    <td>
                                        <select class="form-control">
                                            @foreach (explode("\n", $question->answers) as $answer)
                                                <option value="{{$answer}}">{{$answer}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>{{$question->score}}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-12 col-md-auto">
                                                <a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-primary btn-sm">تحديث</a>
                                                <form action="{{ route('admin.questions.destroy', $question->id)}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger" role="alert">
                                    لا يوجد سؤال
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
@endsection
