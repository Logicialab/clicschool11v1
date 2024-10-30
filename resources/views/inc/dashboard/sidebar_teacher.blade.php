<div class="col-lg-3 col-md-4 col-12">
    <!-- Side navabar -->
    <nav class="navbar navbar-expand-md shadow-sm mb-4 mb-lg-0 sidenav">
        <!-- Menu -->
        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
        <!-- Button -->
        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="fe fe-menu"></span>
        </button>
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse" id="sidenav">
            <div class="navbar-nav flex-column">
                <!-- Navbar header -->
                <span class="navbar-header">لوحة التحكم</span>
                <ul class="list-unstyled ms-n2 mb-4">
                    <!-- Nav item -->
                    <li class="nav-item {{ isActiveRoute('teacher.dashboard') }}">
                        <a class="nav-link" href="{{ route('teacher.dashboard') }}">
                            <i class="fe fe-home nav-icon"></i>
                            لوحة التحكم خاصتي </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item {{ isActiveRoute('teacher.formations') }}">
                        <a class="nav-link" href="{{ route('teacher.formations') }}">
                            <i class="fe fe-book nav-icon"></i>
                            الدورات
                        </a>
                    </li>
                    <li class="nav-item {{ isActiveRoute('teacher.courses') }}">
                        <a class="nav-link" href="{{ route('teacher.courses') }}">
                            <i class="fe fe-book nav-icon"></i>
                            الدرس
                        </a>
                    </li>
                    <!-- Nav item -->
                    <!-- <li class="nav-item {{ isActiveRoute('teacher.reviews') }}">
                        <a class="nav-link" href="{{ route('teacher.reviews') }}">
                            <i class="fe fe-book nav-icon"></i>
                            المراجعات
                        </a>
                    </li> -->
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.earnings') }}">
                        <a class="nav-link" href="{{ route('teacher.earnings') }}">
                            <i class="fe fe-pie-chart nav-icon"></i>
                            الأرباح </a>
                    </li>
                    <!-- Nav item -->
                    <!-- <li class="nav-item  {{ isActiveRoute('teacher.orders') }}">
                        <a class="nav-link" href="{{ route('teacher.orders') }}">
                            <i class="fe fe-shopping-bag nav-icon"></i>
                            الطلبات </a>
                    </li> -->
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.students') }}">
                        <a class="nav-link" href="{{ route('teacher.students') }}">
                            <i class="fe fe-user nav-icon"></i>
                            الطلاب
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.payouts') }}">
                        <a class="nav-link" href="{{ route('teacher.payouts') }}">
                            <i class="fe fe-dollar-sign nav-icon"></i>
                            الدفعات </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.quiz') }}">
                        <a class="nav-link" href="{{ route('teacher.quiz') }}">
                            <i class="fe fe-help-circle nav-icon"></i>
                            الاختبارات </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.quizresult') }}">
                        <a class="nav-link" href="{{ route('teacher.quizresult') }}">
                            <i class="fe fe-help-circle nav-icon"></i>
                            نتائج الاختبارات </a>
                    </li>
                </ul>
                <!-- Navbar header -->
                <span class="navbar-header">إعدادت الحساب</span>
                <ul class="list-unstyled ms-n2 mb-0">
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.profiledit') }}">
                        <a class="nav-link" href="{{ route('teacher.profiledit') }}">
                            <i class="fe fe-settings nav-icon"></i>
                            تعديل الملف الشخصي </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.security') }}">
                        <a class="nav-link" href="{{ route('teacher.security') }}">
                            <i class="fe fe-user nav-icon"></i>
                            الحماية </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.socialprofile') }}">
                        <a class="nav-link" href="{{ route('teacher.socialprofile') }}">
                            <i class="fe fe-refresh-cw nav-icon"></i>
                            صفحات التواصل الاجتماعي </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.notifications') }}">
                        <a class="nav-link" href="{{ route('teacher.notifications') }}">
                            <i class="fe fe-bell nav-icon"></i>
                            الإشعارات </a>
                    </li>
                    <!-- Nav item -->
                    <!-- <li class="nav-item  {{ isActiveRoute('teacher.profileprivacy') }}">
                        <a class="nav-link" href="{{ route('teacher.profileprivacy') }}">
                            <i class="fe fe-lock nav-icon"></i>
                            ملف الخصوصية </a>
                    </li> -->
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.deleteprofile') }}">
                        <a class="nav-link" href="{{ route('teacher.deleteprofile') }}">
                            <i class="fe fe-trash nav-icon"></i>
                            حذف الملف الشخصي </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('teacher.linkedaccounts') }}">
                        <a class="nav-link" href="{{ route('teacher.linkedaccounts') }}">
                            <i class="fe fe-trash nav-icon"></i>
                            حسابات متصلة</a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="fe fe-power nav-icon"></i>
                            تسجيل الخروج </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>