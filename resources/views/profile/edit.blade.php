@extends('frontend.layouts.master')


@section('css')
@endsection

@section('تحديث البيانات')
@endsection



@section('content')
    <section class="profile-page mt-5">
        <div class="container">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="text">
                <h3 class="title-section mb-5">البيانات الشخصية</h3>
            </div>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">الاسم</label>
                            <input name="name" type="text" class="form-control" placeholder="ادهم اسامة" autofocus
                                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">رقم هاتف الطالب</label>
                            <input name="phone" type="text" class="form-control" placeholder="رقم هاتف"
                                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->phone }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">رقم هاتف ولي الامر</label>
                            <input name="parent_phone" type="text" class="form-control" placeholder="رقم هاتف ولي الامر"
                                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->parent_phone }}">
                            @if ($errors->has('parent_phone'))
                                <span class="text-danger">{{ $errors->first('parent_phone') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="grade" class="form-label">الصف الدراسي</label>
                            <div class="d-flex align-items-center">
                                <select name="level_id" id="grade" class="form-select">
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}"
                                            {{ $level->id == $user->level_id ? 'selected' : '' }}>
                                            {{ $level->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('level_id'))
                                    <span class="text-danger">{{ $errors->first('level_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-danger edit-profile">حفظ البيانات</button>
                    </div>
                </div>
            </form>

            <hr class="my-5">

        </div>
    </section>
@endsection

@section('js')

@endsection
