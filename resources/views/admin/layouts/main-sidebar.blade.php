<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{asset('backend/assets/images/brand/logo-2.png')}}" style="width: 70px;" alt="Logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>الرئيسية</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.home') }}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">الصفحة
                            الرئيسية</span></a>
                </li>
                <li class="sub-category">
                    <h3>العام</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-shopping-bag"></i><span class="side-menu__label">الملف الشخصي
                        </span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">الملف الشخصي </a>
                        </li>
                        <li><a href="{{route('admin.profile.index')}}" class="slide-item">صفحة البروفايل</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">
                            الطلاب</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{route('admin.students.index')}}" class="slide-item">احصائيات الطلاب</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-shopping-bag"></i><span class="side-menu__label">
                            السنة الدراسية</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{route('admin.levels.index')}}" class="slide-item">جميع السنين الدراسية</a></li>
                        <li><a href="{{route('admin.levels.create')}}" class="slide-item">اضافة سنة دراسية</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-shopping-bag"></i><span class="side-menu__label">
                            الحصص</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">الحصص</a></li>
                        <li><a href="{{route('admin.sessions.index')}}" class="slide-item">جميع الحصص</a></li>
                        <li><a href="{{route('admin.sessions.create')}}" class="slide-item">اضافه حصة جديد</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-shopping-bag"></i><span class="side-menu__label">
                            الاكواد</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{route('admin.codes.index')}}" class="slide-item">اضافة الاكواد</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-shopping-bag"></i><span class="side-menu__label">
                            اسئلة الطلبة</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{route('admin.student-asks.index')}}" class="slide-item">اسئلة الطلبة</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">الامتحانات </span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">الامتحانات </a>
                        </li>
                        <li><a href="{{route('admin.exams.index')}}" class="slide-item"> الامتحانات</a></li>
                        <li><a href="{{route('admin.exams.create')}}" class="slide-item">اضافة امتحان</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">اسئلة الامتحانات  </span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a>
                        </li>
                        <li><a href="{{route('admin.questions.create')}}" class="slide-item"> اضافة سؤال</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">
                            نتيجة الامتحانات</span><span class="badge bg-pink side-badge"></span><i
                            class="angle fe fe-chevron-right hor-angle"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">عرض النتائج</a></li>
                        <li><a href="add-exams done.html" class="slide-item">عرض النتائج</a></li>
                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>
