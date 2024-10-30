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
                    <li class="nav-item {{ isActiveRoute('student.dashboard') }}">
                        <a class="nav-link" href="{{ route('student.dashboard') }}">
                            <i class="fe fe-home nav-icon"></i>
                            لوحة التحكم خاصتي </a>
                    </li>

                    <!-- Nav item -->
                    <li class="nav-item {{ isActiveRoute('student.subjects') }}">
                        <a class="nav-link" href="{{ route('student.subjects') }}">
                            <i class="fe fe-book nav-icon"></i>
                            المواد الدراسية 
                        </a>
                    </li>

                    <!-- Nav item -->
                    <li class="nav-item {{ isActiveRoute('student.formations') }}">
                        <a class="nav-link" href="{{ route('student.formations') }}">
                            <i class="fe fe-book nav-icon"></i>
                            الدورات
                        </a>
                    </li>
                    <!-- Nav item -->
                    <!-- <li class="nav-item {{ isActiveRoute('student.reviews') }}">
                        <a class="nav-link" href="{{ route('student.reviews') }}">
                            <i class="fe fe-book nav-icon"></i>
                            المراجعات
                        </a>
                    </li> -->
                    <!-- Nav item -->
                    <!-- <li class="nav-item  {{ isActiveRoute('student.earnings') }}">
                        <a class="nav-link" href="{{ route('student.earnings') }}">
                            <i class="fe fe-pie-chart nav-icon"></i>
                            الأرباح </a>
                    </li> -->
                    <!-- Nav item -->
                    <!-- <li class="nav-item  {{ isActiveRoute('student.orders') }}">
                        <a class="nav-link" href="{{ route('student.orders') }}">
                            <i class="fe fe-shopping-bag nav-icon"></i>
                            الطلبات </a>
                    </li> -->
                    <!-- Nav item -->
                    <!-- <li class="nav-item  {{ isActiveRoute('student.students') }}">
                        <a class="nav-link" href="{{ route('student.students') }}">
                            <i class="fe fe-user nav-icon"></i>
                            الطلاب
                        </a>
                    </li> -->
                    <!-- Nav item -->
                    <!-- <li class="nav-item  {{ isActiveRoute('student.payouts') }}">
                        <a class="nav-link" href="{{ route('student.payouts') }}">
                            <i class="fe fe-dollar-sign nav-icon"></i>
                            الدفعات </a>
                    </li> -->
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('student.competition') }}">
                        <a class="nav-link" href="{{ route('student.competition') }}">
                            <i class="fe fe-help-circle nav-icon"></i>
                            المسابقات  </a>
                    </li>
                    <!-- Nav item -->
                    <!-- <li class="nav-item  {{ isActiveRoute('student.quizresult') }}">
                        <a class="nav-link" href="{{ route('student.quizresult') }}">
                            <i class="fe fe-help-circle nav-icon"></i>
                            نتائج المسابقات  </a>
                    </li> -->
                </ul>

                <!-- Navbar header -->
                <span class="navbar-header">الاشتراك</span>
                <ul class="list-unstyled ms-n2 mb-4">
                    <!-- Nav item -->
                    <li class="nav-item {{ isActiveRoute('student.subscriptions') }}">
                        <a class="nav-link" href="{{ route('student.subscriptions') }}">
                            <i class="fe fe-calendar nav-icon"></i>
                            اشتراكاتي
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item {{ isActiveRoute('student.billinginfo') }}">
                        <a class="nav-link" href="{{ route('student.billinginfo') }}">
                            <i class="fe fe-credit-card nav-icon"></i>
                            معلومات الفواتير
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item {{ isActiveRoute('student.paymentmethod') }}">
                        <a class="nav-link" href="{{ route('student.paymentmethod') }}">
                            <i class="fe fe-credit-card nav-icon"></i>
                            الدفع
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item {{ isActiveRoute('student.invoice') }}">
                        <a class="nav-link" href="{{ route('student.invoice') }}">
                            <i class="fe fe-clipboard nav-icon"></i>
                            الفاتورة
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item {{ isActiveRoute('student.studentquiz') }}">
                        <a class="nav-link" href="{{ route('student.studentquiz') }}">
                            <i class="fe fe-help-circle nav-icon"></i>
                            محاولات الاختبار الخاصة بي
                        </a>
                    </li>
                </ul>

                <!-- Navbar header -->
                <span class="navbar-header">إعدادت الحساب</span>
                <ul class="list-unstyled ms-n2 mb-0">
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('student.profiledit') }}">
                        <a class="nav-link" href="{{ route('student.profiledit') }}">
                            <i class="fe fe-settings nav-icon"></i>
                            تعديل الملف الشخصي </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('student.security') }}">
                        <a class="nav-link" href="{{ route('student.security') }}">
                            <i class="fe fe-user nav-icon"></i>
                            الحماية </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('student.socialprofile') }}">
                        <a class="nav-link" href="{{ route('student.socialprofile') }}">
                            <i class="fe fe-refresh-cw nav-icon"></i>
                            صفحات التواصل الاجتماعي </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('student.notifications') }}">
                        <a class="nav-link" href="{{ route('student.notifications') }}">
                            <i class="fe fe-bell nav-icon"></i>
                            الإشعارات </a>
                    </li>
                    <!-- Nav item -->
                    <!-- <li class="nav-item  {{ isActiveRoute('student.profileprivacy') }}">
                        <a class="nav-link" href="{{ route('student.profileprivacy') }}">
                            <i class="fe fe-lock nav-icon"></i>
                            ملف الخصوصية </a>
                    </li> -->
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('student.deleteprofile') }}">
                        <a class="nav-link" href="{{ route('student.deleteprofile') }}">
                            <i class="fe fe-trash nav-icon"></i>
                            حذف الملف الشخصي </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item  {{ isActiveRoute('student.linkedaccounts') }}">
                        <a class="nav-link" href="{{ route('student.linkedaccounts') }}">
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