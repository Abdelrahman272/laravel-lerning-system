@extends('admin.layouts.master')

@section('title', 'السنين الدراسية')

@section('css')
@endsection

@section('title-one')
السنين الدراسية
@endsection

@section('title-two')
السنين الدراسية
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
                            <th>السنة الدراسية</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @forelse ($levels as $level)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$level->name}}</td>
                            <td class="text-center">
                                <div class="row justify-content-center"> <!-- Add justify-content-center class to center align the content -->
                                    <div class="col-12 col-md-auto">
                                        <a href="{{ route('admin.levels.edit', $level->id) }}" class="btn btn-primary btn-sm">تحديث</a>
                                        <form action="{{ route('admin.levels.destroy', $level->id)}}" method="post" class="d-inline">
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
                {{ $levels->links() }}
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
// </script>
@endsection
