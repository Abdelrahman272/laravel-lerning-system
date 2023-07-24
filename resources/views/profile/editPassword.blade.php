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
                <h3 class="title-section mb-5"> تغير كلمة المرور</h3>
            </div>

            <form method="POST" action="{{ route('profile.update.password') }}" class="mt-6 space-y-6">
                @csrf

                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">كلمة المرور الحالية</label>
                            <div class="input-group">
                                <input name="old_password" type="password" class="form-control" id="old_password"
                                    aria-describedby="emailHelp">
                                <button type="button" class="btn btn-light toggle-password" data-target="#old_password">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            @if ($errors->has('old_password'))
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">كلمة المرور الجديدة</label>
                            <div class="input-group">
                                <input name="new_password" type="password" class="form-control" id="new_password">
                                <button type="button" class="btn btn-light toggle-password" data-target="#new_password">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            @if ($errors->has('new_password'))
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">تأكيد كلمة المرور</label>
                            <div class="input-group">
                                <input name="new_password_confirmation" type="password" class="form-control"
                                    id="new_password_confirmation">
                                <button type="button" class="btn btn-light toggle-password"
                                    data-target="#new_password_confirmation">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            @if ($errors->has('new_password_confirmation'))
                                <span class="text-danger">{{ $errors->first('new_password_confirmation') }}</span>
                            @endif
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Toggle password visibility
            $('.toggle-password').click(function() {
                const passwordInput = $($(this).data('target'));
                const passwordIcon = $(this).find('i');

                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    passwordIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    passwordIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
@endsection
