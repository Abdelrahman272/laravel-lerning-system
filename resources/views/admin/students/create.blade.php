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
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card d-flex justify-content-center">
                <div class="card-header">
                    <h3 class="card-title text-danger mb-0">انت الأن على وشك تعديل بيانات الطاالب ( أدهم أسامة )</h3>
                </div>
                <div class="card-body pt-4">
                    <div class="grid-margin">
                        <form method="post" action="{{ route('admin.students.store')}}">
                            @csrf
                            <div class="form-row row mb-4">
                                <div class="col-md-6 form-group text-right">
                                    <input name="name" autofocus type="text" id="" class="form-control"
                                        placeholder="اسم الطالب / الطالبه" />
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group text-right">
                                    <select name="level_id" id="" class="form-control">
                                        <option value="">اختر المستوى</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('level_id'))
                                        <span class="text-danger">{{ $errors->first('level_id') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group text-right">
                                    <input name="phone" type="text" maxlength="12" id="" class="form-control"
                                        placeholder="رقم هاتف الطالب" />
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group text-right">
                                    <input name="parent_phone" type="text" maxlength="11" id=""
                                        class="form-control" placeholder="رقم ولي الامر" />
                                    @if ($errors->has('parent_phone'))
                                        <span class="text-danger">{{ $errors->first('parent_phone') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group text-right">
                                    <input name="password" autofocus type="password" id="" class="form-control"
                                        placeholder="كلمة المرور" />
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group text-right">
                                    <input name="password_confirmation" autofocus type="password" id="" class="form-control"
                                        placeholder="كلمة المرور" />
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
