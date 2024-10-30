@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card mb-4">
								<!-- Card header -->
								<div class="card-header border-bottom-0">
									<h3 class="mb-0">الطلبات</h3>
									<span>لوحة معلومات الطلبات هي نظرة عامة سريعة على جميع الطلبات الحالية.</span>
								</div>
								<!-- Table -->
								<div class="table-responsive">
									<table class="table mb-0 text-nowrap table-hover table-centered">
										<thead class="table-light">
											<tr>
												<th>الدورات</th>
												<th>المبلغ</th>
												<th>الفاتورة</th>
												<th>التاريخ</th>
												<th>الطريقة</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<h5 class="mb-0">
														<a href="#" class="text-inherit">Building Scalable APIs with GraphQL</a>
													</h5>
												</td>
												<td>$89</td>
												<td>#10023</td>
												<td>June 9, 2020</td>
												<td>Amex</td>
												<td>
													<span class="dropdown dropstart">
														<a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown1" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
															<i class="fe fe-more-vertical"></i>
														</a>
														<span class="dropdown-menu" aria-labelledby="courseDropdown1">
															<span class="dropdown-header">الإعدادات</span>
															<a class="dropdown-item" href="#">
																<i class="fe fe-edit dropdown-item-icon"></i>
																تعديل
															</a>
															<a class="dropdown-item" href="#">
																<i class="fe fe-trash dropdown-item-icon"></i>
																ازالة
															</a>
														</span>
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<h5 class="mb-0">
														<a href="#" class="text-inherit">HTML5 Web Front End Development</a>
													</h5>
												</td>
												<td>$129</td>
												<td>#10020</td>
												<td>June 9, 2020</td>
												<td>Mastercard</td>
												<td>
													<span class="dropdown dropstart">
														<a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown2" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
															<i class="fe fe-more-vertical"></i>
														</a>
														<span class="dropdown-menu" aria-labelledby="courseDropdown2">
															<span class="dropdown-header">الإعدادات</span>
															<a class="dropdown-item" href="#">
																<i class="fe fe-edit dropdown-item-icon"></i>
																تعديل
															</a>
															<a class="dropdown-item" href="#">
																<i class="fe fe-trash dropdown-item-icon"></i>
																ازالة
															</a>
														</span>
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<h5 class="mb-0">
														<a href="#" class="text-inherit">Learn BasicJavaScript Courses</a>
													</h5>
												</td>
												<td>$29</td>
												<td>#10018</td>
												<td>June 8, 2020</td>
												<td>PayPal</td>
												<td>
													<span class="dropdown dropstart">
														<a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown3" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
															<i class="fe fe-more-vertical"></i>
														</a>
														<span class="dropdown-menu" aria-labelledby="courseDropdown3">
															<span class="dropdown-header">الإعدادات</span>
															<a class="dropdown-item" href="#">
																<i class="fe fe-edit dropdown-item-icon"></i>
																تعديل
															</a>
															<a class="dropdown-item" href="#">
																<i class="fe fe-trash dropdown-item-icon"></i>
																ازالة
															</a>
														</span>
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<h5 class="mb-0">
														<a href="#" class="text-inherit">Get Started: React Js Courses</a>
													</h5>
												</td>
												<td>$59</td>
												<td>#10003</td>
												<td>June 9, 2020</td>
												<td>Visa</td>
												<td>
													<span class="dropdown dropstart">
														<a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown4" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
															<i class="fe fe-more-vertical"></i>
														</a>
														<span class="dropdown-menu" aria-labelledby="courseDropdown4">
															<span class="dropdown-header">الإعدادات</span>
															<a class="dropdown-item" href="#">
																<i class="fe fe-edit dropdown-item-icon"></i>
																تعديل
															</a>
															<a class="dropdown-item" href="#">
																<i class="fe fe-trash dropdown-item-icon"></i>
																ازالة
															</a>
														</span>
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<h5 class="mb-0">
														<a href="#" class="text-inherit">Building Scalable APIs with GraphQL</a>
													</h5>
												</td>
												<td>$129</td>
												<td>#10020</td>
												<td>June 7, 2020</td>
												<td>Mastercard</td>
												<td>
													<span class="dropdown dropstart">
														<a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown5" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
															<i class="fe fe-more-vertical"></i>
														</a>
														<span class="dropdown-menu" aria-labelledby="courseDropdown5">
															<span class="dropdown-header">الإعدادات</span>
															<a class="dropdown-item" href="#">
																<i class="fe fe-settings dropdown-item-icon"></i>
																تعديل
															</a>
															<a class="dropdown-item" href="#">
																<i class="fe fe-trash dropdown-item-icon"></i>
																ازالة
															</a>
														</span>
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<h5 class="mb-0">
														<a href="#" class="text-inherit">Master in CSS3 Courses Online</a>
													</h5>
												</td>
												<td>$29</td>
												<td>#10018</td>
												<td>June 8, 2020</td>
												<td>PayPal</td>
												<td>
													<span class="dropdown dropstart">
														<a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown7" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
															<i class="fe fe-more-vertical"></i>
														</a>
														<span class="dropdown-menu" aria-labelledby="courseDropdown7">
															<span class="dropdown-header">الإعدادات</span>
															<a class="dropdown-item" href="#">
																<i class="fe fe-edit dropdown-item-icon"></i>
																تعديل
															</a>
															<a class="dropdown-item" href="#">
																<i class="fe fe-trash dropdown-item-icon"></i>
																ازالة
															</a>
														</span>
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<h5 class="mb-0">
														<a href="#" class="text-inherit">Online Angular Courses</a>
													</h5>
												</td>
												<td>$59</td>
												<td>#10003</td>
												<td>June 6, 2020</td>
												<td>Visa</td>
												<td>
													<span class="dropdown dropstart">
														<a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown8" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
															<i class="fe fe-more-vertical"></i>
														</a>
														<span class="dropdown-menu" aria-labelledby="courseDropdown8">
															<span class="dropdown-header">الإعدادات</span>
															<a class="dropdown-item" href="#">
																<i class="fe fe-edit dropdown-item-icon"></i>
																تعديل
															</a>
															<a class="dropdown-item" href="#">
																<i class="fe fe-trash dropdown-item-icon"></i>
																ازالة
															</a>
														</span>
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<h5 class="mb-0">
														<a href="#" class="text-inherit">Master in CSS3 Courses Online</a>
													</h5>
												</td>
												<td>$29</td>
												<td>#10018</td>
												<td>June 8, 2020</td>
												<td>PayPal</td>
												<td>
													<span class="dropdown dropstart">
														<a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown9" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
															<i class="fe fe-more-vertical"></i>
														</a>
														<span class="dropdown-menu" aria-labelledby="courseDropdown9">
															<span class="dropdown-header">الإعدادات</span>
															<a class="dropdown-item" href="#">
																<i class="fe fe-edit dropdown-item-icon"></i>
																تعديل
															</a>
															<a class="dropdown-item" href="#">
																<i class="fe fe-trash dropdown-item-icon"></i>
																ازالة
															</a>
														</span>
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<h5 class="mb-0">
														<a href="#" class="text-inherit">Online Angular Courses</a>
													</h5>
												</td>
												<td>$59</td>
												<td>#10003</td>
												<td>June 6, 2020</td>
												<td>Visa</td>
												<td class="align-middle border-bottom-0">
													<span class="dropdown dropstart">
														<a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown10" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
															<i class="fe fe-more-vertical"></i>
														</a>
														<span class="dropdown-menu" aria-labelledby="courseDropdown10">
															<span class="dropdown-header">الإعدادات</span>
															<a class="dropdown-item" href="#">
																<i class="fe fe-edit dropdown-item-icon"></i>
																تعديل
															</a>
															<a class="dropdown-item" href="#">
																<i class="fe fe-trash dropdown-item-icon"></i>
																ازالة
															</a>
														</span>
													</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
@endsection