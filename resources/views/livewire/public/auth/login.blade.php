<html lang="ar" dir="rtl">
	<head>
		<!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Codescandy" />

        <!-- Favicon icon-->
        <link rel="shortcut icon" type="image/x-icon" href="/assets/images/lg.png" />

        <!-- darkmode js -->
        <script src="/assets/js/vendors/darkMode.js"></script>

        <!-- Libs CSS -->
        <link href="/assets/fonts/feather/feather.css" rel="stylesheet" />
        <link href="/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
        <link href="/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="/assets/css/theme-rtl.min.css">

		<title>تسجيل الدخول | Clic School </title>
	</head>

	<body>
		<!-- Page content -->
		<main>
			<section class="container d-flex flex-column vh-100">
				<div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
					<div class="col-lg-5 col-md-8 py-8 py-xl-0">
						<!-- Card -->
						<div class="card shadow">
							<!-- Card body -->
							<div class="card-body p-6">
								<div class="mb-4">
									<a href="/"><img src="/assets/images/lg.png" class="mb-4" alt="logo-icon" /></a>
									<h1 class="mb-1 fw-bold">تسجيل الدخول</h1>
									<span>
										ليس لديك حساب؟
										<a href="#" class="ms-1">سجل الآن</a>
									</span>
								</div>
								<!-- Form -->
								<form class="needs-validation" action="{{ route('public.login') }}" method="Post" novalidate>
                                @csrf
									<!-- Username -->
									<div class="mb-3">
										<label for="email" class="form-label">اسم المستخدم أو البريد الإلكتروني</label>
										<input type="email" id="email" class="form-control" name="email" placeholder="أدخل بريدك الإلكتروني هنا" required />
										<div class="invalid-feedback">يرجى إدخال اسم مستخدم صحيح.</div>
									</div>
									<!-- Password -->
									<div class="mb-3">
										<label for="password" class="form-label">كلمة المرور</label>
										<input type="password" id="password" class="form-control" name="password" placeholder="**************" required />
										<div class="invalid-feedback">يرجى إدخال كلمة مرور صحيحة.</div>
									</div>
									<!-- Checkbox -->
									<div class="d-lg-flex justify-content-between align-items-center mb-4">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="rememberme"  />
											<label class="form-check-label" for="rememberme">تذكرني</label>
											<div class="invalid-feedback">يجب أن توافق قبل الإرسال.</div>
										</div>
										<div>
											<a href="#">هل نسيت كلمة المرور؟</a>
										</div>
									</div>
									<div>
										<!-- Button -->
										<div class="d-grid">
											<button type="submit" class="btn btn-primary">تسجيل الدخول</button>
										</div>
									</div>
									<!-- <hr class="my-4" /> -->
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<!-- Scripts -->
		<!-- Libs JS -->
        <script src="/assets/libs/@popperjs/core/dist/umd/popper.min.js"></script>
        <script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/assets/libs/simplebar/dist/simplebar.min.js"></script>

        <!-- Theme JS -->
        <script src="/assets/js/theme.min.js"></script>

		<script src="/assets/js/vendors/validation.js"></script>
	</body>
</html>
