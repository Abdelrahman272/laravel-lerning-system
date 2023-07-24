@extends('admin.layouts.master')

@section('title')
    جميع الحصص
@endsection

@section('css')
@endsection

@section('title-one')
    الحصص
@endsection

@section('title-two')
    الحصص
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
                            <th>عنوان الحصة</th>
                            <th>السنة الدراسية</th>
                            <th>رقم الحلقة</th>
                            <th>تاريخ الانشاء </th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @forelse ($sessions as $session)
                        <tr>
                            <td>{{$session->name}}</td>
                            <td>{{$session->level->name}}</td>
                            <td>{{$session->episode}}</td>
                            <td>{{$session->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-12 col-md-auto">
                                        <a href="{{ route('admin.sessions.edit', $session->id)}}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">تحديث</a>
                                        <form action="{{ route('admin.sessions.destroy', $session->id)}}" method="post" class="d-inline">
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
                {{ $sessions->links() }}
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
