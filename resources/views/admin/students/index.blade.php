@extends('admin.layouts.master')

@section('title')
    الرئيسية
@endsection

@section('title-one')
    الطلاب
@endsection

@section('title-two')
    الطلاب
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection



@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class=""> المستخدمين</h6>
                                <h2 class="mb-0 number-font">{{ $users->count() }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <canvas id="saleschart" class="h-8 w-9 chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">عدد الحصص</h6>
                                <h2 class="mb-0 number-font">0</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <canvas id="leadschart" class="h-8 w-9 chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">عدد الامتحانات</h6>
                                <h2 class="mb-0 number-font">0</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <canvas id="profitchart" class="h-8 w-9 chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-3 ml-5">
                                <a href="{{ route('admin.students.create') }}" class="btn btn-info" role="button">اضافة طالب جديد </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="addition d-flex align-items-center justify-content-center">
                            <!-- Button trigger modal -->
                            <a href="#link" class="btn btn-info" role="button">Link Button</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                اضافه طالب جديد يدويا
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="..">
                                                <div class="form-row row mb-4">
                                                    <div class="col-md-6 form-group text-right">
                                                        <input name="name" autofocus type="text" id=""
                                                            class="form-control" placeholder="اسم الطالب / الطالبه" />
                                                        <small id="name_help" class="form-text">الاسم رباعى باللغة
                                                            العربية</small>
                                                    </div>
                                                    <div class="col-md-6 form-group text-right">
                                                        <select name="" id="" class="form-control">
                                                            <option value="1" selected>الصف
                                                                الاول الثانوي</option>
                                                            <option value="2">الصف الثاني
                                                                الثانوي</option>
                                                            <option value="3">الصف الثالث
                                                                الثانوي</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 form-group text-right">
                                                        <input name="students_phone" type="text" maxlength="12"
                                                            id="" class="form-control"
                                                            placeholder="رقم هاتف الطالب" />
                                                        <small id="phone_help" class="form-text">يتوفر عليه واتساب
                                                        </small>
                                                    </div>
                                                    <div class="col-md-6 form-group text-right">
                                                        <input name="parents_phone" type="text" maxlength="11"
                                                            id="" class="form-control"
                                                            placeholder="رقم ولي الامر" />
                                                    </div>
                                                    <div class="col-md-6 form-group text-right">
                                                        <input name="password" type="password" id=""
                                                            class="form-control" placeholder="كلمة المرور" />
                                                        <small id="passHelp" class="form-text">
                                                            يسمح بحروف وأرقام انجليزية
                                                            فقط</small>
                                                    </div>
                                                    <div class="col-md-6 form-group text-right">
                                                        <input name="" type="password" id=""
                                                            class="form-control"
                                                            placeholder="تاكيد كلمة المرور" /><br />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn p-2  me-3 btn-primary">انشاء الحساب
                                            </button>
                                            <button type="button" class="btn p-2  btn-secondary"
                                                data-bs-dismiss="modal">الغاء</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<table class="table table-bordered yajra-datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>رقم الهاتف</th>
            <th>رقم ولي الامر</th>
            <th>الصف الدراسي</th>
            <th>العمليات</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.students.list') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'parent_phone',
                        name: 'parent_phone'
                    },
                    {
                        data: 'level.name',
                        name: 'level.name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endsection
