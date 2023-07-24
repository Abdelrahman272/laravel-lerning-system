@extends('admin.layouts.master')

@section('title', 'الملف الشخصي')

@section('css')
@endsection

@section('title-one')
    الملف الشخصي
@endsection

@section('title-two')
    الملف الشخصي
@endsection

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-xl-4">
            <form action="{{ route('admin.profile.update.password') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">تعديل الباسورد</div>
                    </div>
                    <div class="card-body">
                        <div class="text-center chat-image mb-5">
                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                <img src="{{ !empty($admin->photo) ? url('uploads/admin_images/' . $admin->photo) : url('uploads/no_image.jpg') }}"
                                    alt="Admin" class="rounded-circle p-1 bg-primary" width="100" height="90px">
                            </div>
                            <div class="main-chat-msg-name">
                                <a href="profile.html">
                                    <h5 class="mb-1 text-dark fw-semibold">مسيو مصطفى قطب</h5>
                                </a>
                                <p class="text-muted mt-0 mb-0 pt-0 fs-13">معلم اللغة الفرنسية</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">الباسورد القديم</label>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted toggle-password">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input name="old_password" class="input100 form-control" type="password"
                                    placeholder="الباسورد القديم">
                            </div>
                            @if ($errors->has('old_password'))
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">الباسورد الجديد</label>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted toggle-password">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input name="new_password" class="input100 form-control" type="password"
                                    placeholder="الباسورد الجديد">
                            </div>
                            @if ($errors->has('new_password'))
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                            @endif
                            <!-- <input type="password" class="form-control" value="password"> -->
                        </div>
                        <div class="form-group">
                            <label class="form-label">تأكيد الباسورد</label>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted toggle-password">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input name="new_password_confirmation" class="input100 form-control" type="password"
                                    placeholder="تأكيد الباسورد">
                            </div>
                            @if ($errors->has('new_password_confirmation'))
                                <span class="text-danger">{{ $errors->first('new_password_confirmation') }}</span>
                            @endif
                            <!-- <input type="password" class="form-control" value="password"> -->
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary my-1 p-2">تحديث</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-8">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">>
                @csrf

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تعديل البروفايل</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputname">الاسم الاول</label>
                                    <input name="first_name" type="text" class="form-control" id="exampleInputname"
                                        placeholder="الاسم الاول" value="{{ $admin->first_name }}">
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputname1">الاسم الاخير</label>
                                    <input name="last_name" type="text" class="form-control" id="exampleInputname1"
                                        placeholder="الاسم الاخير" value="{{ $admin->last_name }}">
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">البريد الالكتروني</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                placeholder="البريد الالكتروني" value="{{ $admin->email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputnumber">رقم التيليفون</label>
                            <input name="phone" type="number" class="form-control" id="exampleInputnumber"
                                placeholder="رقم الاتصال" value="{{ $admin->phone }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhoto">الصورة الشخصية</label>
                            <input name="photo" type="file" class="form-control" id="exampleInputPhoto">
                            <img id="previewImage"
                                src="{{ !empty($admin->photo) ? url('uploads/admin_images/' . $admin->photo) : url('uploads/no_image.jpg') }}"
                                alt="Selected Photo" style="max-width: 100px; margin-top: 10px;">
                            @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary my-1 p-2">تحديث</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        document.getElementById('exampleInputPhoto').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>

    <script>
        const togglePasswordButtons = document.querySelectorAll('.toggle-password');

        togglePasswordButtons.forEach(button => {
            button.addEventListener('click', () => {
                const passwordField = button.parentElement.querySelector('input');

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    button.innerHTML = '<i class="zmdi zmdi-eye-off text-muted" aria-hidden="true"></i>';
                } else {
                    passwordField.type = 'password';
                    button.innerHTML = '<i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>';
                }
            });
        });
    </script>

@endsection
