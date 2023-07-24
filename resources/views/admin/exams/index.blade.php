@extends('admin.layouts.master')

@section('title', 'الامتحانات')

@section('css')
@endsection

@section('title-one')
الامتحانات
@endsection

@section('title-two')
الامتحانات
@endsection

@section('content')
@if(session()->has('message'))
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
                            <th>اسم الامتحان</th>
                            <th> الصف الدراسي</th>
                            <th>رقم الحلقة</th>
                            <th>تاريخ البدئ </th>
                            <th> مدة الامتحان </th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @forelse ($exams as $exam)
                        <tr>
                            <td>{{$exam->name}}</td>
                            <td>{{$exam->level->name}}</td>
                            <td>{{$exam->session->episode}}</td>
                            <td>{{ \Carbon\Carbon::parse($exam->start_time)->format('Y-m-d') }}</td>
                            <td>{{$exam->duration}}</td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col-12 col-md-auto">
                                        <a href="{{ route('admin.exams.show', $exam->id) }}" class="btn btn-primary btn-sm">اسئلة الامتحان</a>
                                        <form action="{{ route('admin.exams.destroy', $exam->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-sm deletePost">حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger" role="alert">
                            <p class="text-center">لا يوجد بيانات</p>
                        </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $exams->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection
