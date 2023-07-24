@extends('frontend.layouts.master')


@section('css')
    <style>
        /* Adjust the styles as needed */
        .lessons {
            background-color: #f9f9f9;
            padding: 20px 0;
        }

        .title-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .exam-table {
            width: 100%;
        }

        .exam-table th,
        .exam-table td {
            padding: 12px;
            text-align: center;
            vertical-align: middle;
        }

        .exam-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .exam-table tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        .exam-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
@endsection

@section('الامتحانات')
@endsection


@section('content')

    <section class="lessons mt-5">
        <div class="container">
            <div class="title-section">
                <h2> الامتحانات</h2>
            </div>
            @if ($exams->isEmpty())
                <p>No exams available</p>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="exam-table table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>معاد الامتحان</th>
                                        <th>معاد الانتهاء</th>
                                        <th>مدة الامتحان</th>
                                        <th>عدد الأسئلة</th>
                                        <th>درجات الامتحان</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $exam)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $exam->name }}</td>
                                            <td>{{ $exam->start_time->format('H:i m-d') }}</td>
                                            <td>{{ $exam->end_time->format('H:i m-d') }}</td>
                                            <td>{{ $exam->duration }} دقيقة</td>
                                            <td>{{ $exam->question_count }}</td>
                                            <td>{{ $exam->score }}</td>
                                            <td>
                                                <a href="{{route('show-question', $exam->id )}}" class="btn btn-primary">اسئلة الامتحانات </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>


@endsection

@section('js')


@endsection
