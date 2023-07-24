@extends('admin.layouts.master')

@section('title')
     تحديث سنة دراسية
@endsection

@section('css')
@endsection

@section('title-one')
    السنة الدراسية
@endsection

@section('title-two')
    النسية الدراسية
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.levels.update', $level->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"> تحديث سنة دراسية</div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">اسم السنة الدراسية:</label>
                            <div class="col-md-9">
                                <input name="name" type="text" class="form-control" value="{{ $level->name }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <!--End Row-->
                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-6">
                                <button type="Submit" class="btn btn-primary btn-lg">حفظ البيانات</button>
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
