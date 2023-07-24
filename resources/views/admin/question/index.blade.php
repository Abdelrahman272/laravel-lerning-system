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
                                <th>عنوان الحصة</th>
                                <th>السنة الدراسية</th>
                                <th>رقم الحلقة</th>
                                <th>تاريخ الانشاء </th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @forelse ($questions as $question)
                            <tr>
                                <td>{{$question->question_text}}</td>
                                {{-- @foreach ( as )

                                @endforeach --}}
                                <td>
                                    <select>
                                @foreach (explode("\n", $question->answers) as $option)

                                        <option>{{$option}}</option>

                                @endforeach
                                </select>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger" role="alert">
                                <p class="text-center">لا يوجد بيانات</p>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
@endsection
