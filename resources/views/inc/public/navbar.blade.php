<nav dir="rtl" class="navbar navbar-expand-lg shadow-none">
    <div class="container px-0" bis_skin_checked="1">
        <a class="navbar-brand" href="/"><img src="/assets/images/lg.png" loading="lazy" width="55" height="55" alt=""></a>
        @if (auth()->check())
        <div class="d-flex align-items-center order-lg-3" bis_skin_checked="1">
            <div class="d-flex align-items-center" bis_skin_checked="1">
                <div class="d-none d-md-block me-2" bis_skin_checked="1">
                    <a href="#" class="btn btn-transparent border-black text-black">تسجيل الخروج</a>
                </div>
                
            </div>
            
        </div>
         @else
        <div class="d-flex align-items-center order-lg-3" bis_skin_checked="1">
            <div class="d-flex align-items-center" bis_skin_checked="1">
                <div class="d-none d-md-block me-2" bis_skin_checked="1">
                    <a href="/account/login" class="btn btn-transparent border-black text-black">تسجيل الدخول</a>
                </div>
                <div class="d-none d-md-block me-2" bis_skin_checked="1">
                    <a href="/account/create" class="btn btn-dark">سجل معنا</a>
                </div>
            </div>
            <div bis_skin_checked="1">
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar top-bar mt-0"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>
        </div>
        @endif
      
        <!-- Button -->

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default" bis_skin_checked="1">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/" id="navbarLanding">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about" id="navbarLanding">حول المنصة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/formations" id="navbarLanding">الدورات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pricing" id="navbarLanding">الأسعار</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact" id="navbarLanding">تواصل معنا</a>
                </li>
            </ul>
        </div>
    </div>
</nav>