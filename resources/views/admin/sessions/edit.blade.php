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
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.sessions.update', $session->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="old_video" value="{{ $session->video }}">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">إضافة حصة</div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">اسم الحلقة:</label>
                            <div class="col-md-9">
                                <input name="name" type="text" class="form-control" value="{{ $session->name }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">الصف الدراسي</label>
                            <div class="col-md-9">
                                <select name="level_id" class="form-select" aria-label="Default select example">
                                    <option selected>اختر المستوي</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}"
                                            {{ $level->id == $session->level_id ? 'selected' : '' }}>
                                            {{ $level->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('level_id'))
                                    <span class="text-danger">{{ $errors->first('level_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">رقم الحلقه</label>
                            <div class="col-md-9">
                                <div class="form-outline">
                                    <input name="episode" min="10" max="20" type="number" id="typeNumber"
                                        class="form-control" value="{{ $session->episode }}" />
                                    @if ($errors->has('episode'))
                                        <span class="text-danger">{{ $errors->first('episode') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!--Row-->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4"></label>
                            <div class="col-md-9">
                                <input type="file" name="video" id="video-input">
                                @if ($errors->has('video'))
                                    <span class="text-danger">{{ $errors->first('video') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-2 mt-5 text-center">
                                <video id="preview-video" width="400" controls>
                                    <source id="video-source" src="{{asset($session->video)}}" type="video/mp4">
                                </video>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const videoInput = document.getElementById('video-input');
            const videoPreview = document.getElementById('preview-video');
            const videoSource = document.getElementById('video-source');

            videoInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                const url = URL.createObjectURL(file);
                videoSource.setAttribute('src', url);
                videoPreview.load();
            });
        });
    </script>
@endsection
