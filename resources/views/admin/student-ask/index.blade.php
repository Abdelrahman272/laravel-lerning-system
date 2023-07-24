@extends('admin.layouts.master')

@section('title')
    جميع اسئلة الطلبة
@endsection

@section('css')
@endsection

@section('title-one')
    اسئلة الطلبة
@endsection

@section('title-two')
    اسئلة الطلبة
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
                            <th>#</th>
                            <th>اسئلة الطلبة </th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @forelse ($asks as $ask)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Str::limit($ask->question, 100) }}</td>
                            <td class="text-center">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-auto">
                                        <a href="{{ route('admin.student-asks.answer', $ask->id)}}" data-toggle="tooltip" data-original-title="show" class="edit btn btn-primary btn-sm editPost">الرد على السؤال</a>
                                        <form action="{{ route('admin.student-asks.destroy', $ask->id)}}" method="post" class="d-inline">
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
                {{ $asks->links() }}
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
