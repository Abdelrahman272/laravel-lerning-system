@extends('admin.layouts.master')

@section('title', 'الرئيسية')

@section('css')
@endsection

@section('title-one')
@endsection

@section('title-two')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.exams.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header text-right">
                        <div class="card-title">إضافة اختبار</div>
                    </div>
                    <div class="card-body text-right">
                        <div class="form-group">
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">اسم الاختبار:</label>
                                <div class="col-md-9">
                                    <input name="name" type="text" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">الصف الدراسي:</label>
                            <div class="col-md-9">
                                <select name="level_id" class="form-control form-select select2 select2-hidden-accessible"
                                    data-bs-placeholder="اختر الصف" tabindex="-1" aria-hidden="true">
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('level_id'))
                                    <span class="text-danger">{{ $errors->first('level_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">اسم الحلقة:</label>
                            <div class="col-md-9">
                                <select name="session_id" class="form-control form-select select2 select2-hidden-accessible"
                                    data-bs-placeholder="اختر الحلقة" tabindex="-1" aria-hidden="true">
                                    @foreach ($sessions as $session)
                                        <option value="{{ $session->id }}">{{ $session->episode }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('session_id'))
                                    <span class="text-danger">{{ $errors->first('session_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">عدد الأسئلة:</label>
                            <div class="col-md-9">
                                <input type="number" name="question_count" class="form-control">
                                @if ($errors->has('question_count'))
                                    <span class="text-danger">{{ $errors->first('question_count') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">إجمالي الدرجات:</label>
                            <div class="col-md-9">
                                <input type="number" name="score" class="form-control">
                                @if ($errors->has('score'))
                                    <span class="text-danger">{{ $errors->first('score') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">وقت بدء الاختبار:</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="datetime-local" name="start_time" id="start_time" required
                                        class="form-control">
                                    <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                </div>
                                @if ($errors->has('start_time'))
                                <span class="text-danger">{{ $errors->first('start_time') }}</span>
                            @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">مدة الاختبار (بالدقائق):</label>
                            <div class="col-md-9">
                                <input type="number" name="duration" class="form-control">
                                @if ($errors->has('duration'))
                                    <span class="text-danger">{{ $errors->first('duration') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-9 text-right">
                                <button type="submit" class="btn btn-success">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('admin.exams.index') }}" class="btn btn-primary p-2">الغاء والرجوع
                    للرئيسية</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
