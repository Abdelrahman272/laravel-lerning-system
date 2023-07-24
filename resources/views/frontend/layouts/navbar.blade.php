<header>
    <div class="container">
        <a href="{{ route('dashboard') }}" class="logo">
            <span>M</span>onsieur Moustafa
            <br>
            <span>الموقع الرسمي لاستاذ مصطفى قطب</span>
        </a>
        <ul class="navbar-nav flex-row">
            <li><a class="nav-link" href="{{ route('dashboard') }}"> الصفحة الرئيسية</a></li>
            <li><a class="nav-link" href="{{route('sessions.index')}}">الدروس</a></li>
            <li><a class="nav-link" href="{{ route('exams')}}">الامتحانات</a></li>
            <li><a class="nav-link" href="{{ route('ask.index')}}">اسأل المعلم</a></li>
            <li><a class="nav-link" href="{{ route('answer.showAnswer')}}">اجابة المعلم</a></li>
        </ul>
        <div class="links">
            <div class="dropdown notifaication">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bell bell"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="dropdown-item">قام المعلم بتنزيل حصه</li>
                    <li class="dropdown-item">قام المعلم بتنزيل امتحان</li>
                    <li class="dropdown-item">المتبقي على وقت الامتحان 3 ايام</li>
                </ul>
            </div>
            <div class="dropdown user">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="nav-link dropdown-item" href="{{ route('profile.edit') }}"><i class="fa-solid fa-user"></i>الملف
                            الشخصي</a>
                    </li>
                    <li class="pass"><a class="nav-link dropdown-item" href="{{ route('profile.edit.password') }}"><i
                                class="fa-solid fa-lock"></i>
                            تغيير كلمة المرور</a></li>
                    <li><a class="nav-link dropdown-item" href="{{ route('logout') }}"><i
                                class="fa-sharp fa-solid fa-right-to-bracket"></i>تسجيل خروج</a></li>
                </ul>
            </div>
            {{-- <div class="dropdown bars bars-home">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="nav-link dropdown-item" href="{{ route('profile.edit') }}"><i
                                class="fa-solid fa-user"></i>الملف
                            الشخصي</a>
                    </li>
                    <li><a class="nav-link dropdown-item" href="lessons.html"><i
                                class="fa-solid fa-graduation-cap"></i>دروسي</a></li>

                    <li><a class="nav-link dropdown-item" href="chat.html"><i
                                class="fa-sharp fa-solid fa-file-circle-question"></i>اسأل المعلم</a></li>
                    <li><a class="nav-link dropdown-item" href="main-exam.html"><i
                                class="fa-solid fa-newspaper"></i>الامتحانات</a></li>
                    <li class="pass"><a class="nav-link dropdown-item" href="#"><i
                                class="fa-solid fa-lock"></i>
                            تغيير كلمة المرور</a></li>
                    <li><a class="nav-link dropdown-item" href="index.html"><i
                                class="fa-sharp fa-solid fa-right-to-bracket"></i>تسجيل خروج</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
</header>
