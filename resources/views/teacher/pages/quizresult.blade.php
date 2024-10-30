@section('title', 'Home tetcher')

@extends('layouts.teacher')



@section('teacher.content')
<!-- Card -->
<div class="card mb-4">
								<!-- Card body -->
								<div class="card-header">
									<h3 class="mb-0">النتيجة - اختبار React الأساسي</h3>
								</div>
								<!-- card -->
								<div class="card-body border-bottom">
									<!-- row -->
									<div class="row row-cols-lg-3 row-cols-1">
										<div class="col">
											<!-- card -->
											<div class="card bg-gray-100 shadow-none mb-3 mb-lg-0">
												<!-- card body -->
												<div class="card-body">
													<h4 class="mb-0">المشاركين</h4>
													<div class="mt-5 d-flex justify-content-between align-items-center lh-1">
														<div>
															<span class="fs-3 text-dark fw-semibold">27</span>
														</div>
														<div class="align-middle">
															<i class="fe fe-users h2 text-danger"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- col -->
										<div class="col">
											<!-- card -->
											<div class="card bg-gray-100 shadow-none mb-3 mb-lg-0">
												<!-- card body -->
												<div class="card-body">
													<h4 class="mb-0">النتائج</h4>
													<div class="mt-5 d-flex justify-content-between align-items-center lh-1">
														<div>
															<span class="fs-3 text-dark fw-semibold">82</span>
														</div>
														<div class="align-middle">
															<i class="fe fe-clipboard h2 text-primary"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col">
											<!-- card -->
											<div class="card bg-gray-100 shadow-none mb-3 mb-lg-0">
												<!-- card body -->
												<div class="card-body">
													<h4 class="mb-0">متوسط ​​الوقت</h4>
													<div class="mt-5 d-flex justify-content-between align-items-center lh-1">
														<div>
															<span class="fs-3 text-dark fw-semibold">00:00:42</span>
														</div>
														<div class="align-middle">
															<i class="fe fe-clock h2 text-success"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- card body -->
								<div class="card-body border-bottom">
									<form class="row">
										<div class="col-lg-9 col-md-7 col-12 mb-lg-0 mb-2">
											<input type="search" class="form-control" placeholder="Search">
										</div>
										<div class="col-lg-3 col-md-5 col-12">
											<!-- select -->
											<select class="form-select">
												<option value="">ترتيب حسب</option>
												<option value="Free">حر</option>
												<option value="Newest">الأحدث</option>
												<option value="Oldest">الأقدم</option>
											</select>
										</div>
									</form>
								</div>
								<!-- table -->
								<div class="table-responsive">
									<table class="table table-hover table-centered text-nowrap">
										<thead class="table-light">
											<tr>
												<th>الطلاب</th>
												<th>النتيجة</th>
												<th>المحاولة</th>
												<th>وقت الانتهاء</th>
												</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<a href="#">
														<div class="d-flex align-items-center">
															<img src="/assets/images/avatar/avatar-3.jpg" alt="avatar" class="rounded-circle avatar-sm me-2">
															<h5 class="mb-0">Dianna Smiley</h5>
														</div>
													</a>
												</td>
												<td>75</td>
												<td>3 attempts</td>
												<td>20 July, 9:39am</td>
											</tr>
											<tr>
												<td>
													<a href="#">
														<div class="d-flex align-items-center">
															<img src="/assets/images/avatar/avatar-4.jpg" alt="avatar" class="rounded-circle avatar-sm me-2">
															<h5 class="mb-0">Wade Warren</h5>
														</div>
													</a>
												</td>
												<td>42</td>
												<td>3 attempts</td>
												<td>20 July, 10:39am</td>
											</tr>
											<tr>
												<td>
													<a href="#">
														<div class="d-flex align-items-center">
															<img src="/assets/images/avatar/avatar-5.jpg" alt="avatar" class="rounded-circle avatar-sm me-2">
															<h5 class="mb-0">Esther Howard</h5>
														</div>
													</a>
												</td>
												<td>74</td>
												<td>5 attempts</td>
												<td>20 July, 11:39am</td>
											</tr>
											<tr>
												<td>
													<a href="#">
														<div class="d-flex align-items-center">
															<img src="/assets/images/avatar/avatar-6.jpg" alt="avatar" class="rounded-circle avatar-sm me-2">
															<h5 class="mb-0">Kristin Watson</h5>
														</div>
													</a>
												</td>
												<td>32</td>
												<td>3 attempts</td>
												<td>20 July, 09:39am</td>
											</tr>
											<tr>
												<td>
													<a href="#">
														<div class="d-flex align-items-center">
															<img src="/assets/images/avatar/avatar-7.jpg" alt="avatar" class="rounded-circle avatar-sm me-2">
															<h5 class="mb-0">Margare McGrath</h5>
														</div>
													</a>
												</td>
												<td>98</td>
												<td>3 attempts</td>
												<td>19 July, 04:00am</td>
											</tr>
											<tr>
												<td>
													<a href="#">
														<div class="d-flex align-items-center">
															<img src="/assets/images/avatar/avatar-8.jpg" alt="avatar" class="rounded-circle avatar-sm me-2">
															<h5 class="mb-0">Carlos Rhodes</h5>
														</div>
													</a>
												</td>
												<td>100</td>
												<td>3 attempts</td>
												<td>19 July, 06:00am</td>
											</tr>
											<tr>
												<td>
													<a href="#">
														<div class="d-flex align-items-center">
															<img src="/assets/images/avatar/avatar-9.jpg" alt="avatar" class="rounded-circle avatar-sm me-2">
															<h5 class="mb-0">Alice Marshall</h5>
														</div>
													</a>
												</td>
												<td>35</td>
												<td>2 attempts</td>
												<td>19 July, 12:00pm</td>
											</tr>
										</tbody>
									</table>
								</div>

								<div class="card-footer">
									<!-- Pagination -->
									<div class="d-md-flex align-items-center w-100 justify-content-between">
										<span>Showing 1 to 8 of 20 entries</span>
										<nav>
											<ul class="pagination mb-0 mt-3">
												<li class="page-item disabled">
													<a class="page-link mx-1 rounded" href="#">
														<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
															<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
														</svg>
													</a>
												</li>
												<li class="page-item active">
													<a class="page-link mx-1 rounded" href="#">1</a>
												</li>
												<li class="page-item">
													<a class="page-link mx-1 rounded" href="#">2</a>
												</li>
												<li class="page-item">
													<a class="page-link mx-1 rounded" href="#">3</a>
												</li>
												<li class="page-item">
													<a class="page-link mx-1 rounded" href="#">
														<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
															<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
														</svg>
													</a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
@endsection