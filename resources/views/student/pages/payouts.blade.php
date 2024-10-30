@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card mb-4">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">طريقة الدفع</h3>
                                    <p class="mb-0">لوحة معلومات الطلبات هي نظرة عامة سريعة على جميع الطلبات الحالية.</p>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="alert bg-light-warning text-dark-warning alert-dismissible fade show" role="alert">
                                        <strong>payout@geeks.com</strong>
                                        <p class="mb-0">تم تأكيد طريقة الدفع التي اخترتها في عملية الدفع التالية في 15 يوليو 2020</p>
                                        <!-- Button -->
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <div class="row mt-6">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-12 mb-3 mb-lg-0">
                                            <div class="text-center">
                                                <!-- PayOut chart -->
                                                <div id="payoutChart" class="apex-charts" style="min-height: 165px;"><div id="apexchartst0q97afb" class="apexcharts-canvas apexchartst0q97afb apexcharts-theme-light" style="width: 286px; height: 150px;"><svg id="SvgjsSvg1001" width="286" height="150" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1048" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1003" class="apexcharts-inner apexcharts-graphical" transform="translate(49.599999999999994, 19)"><defs id="SvgjsDefs1002"><linearGradient id="SvgjsLinearGradient1006" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1007" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1008" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1009" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskt0q97afb"><rect id="SvgjsRect1011" width="268" height="105" x="-35.599999999999994" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskt0q97afb"></clipPath><clipPath id="nonForecastMaskt0q97afb"></clipPath><clipPath id="gridRectMarkerMaskt0q97afb"><rect id="SvgjsRect1012" width="200.8" height="109" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect1010" width="0" height="105" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1006)" class="apexcharts-xcrosshairs" y2="105" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG1027" class="apexcharts-grid"><g id="SvgjsG1028" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1032" x1="-33.599999999999994" y1="26.25" x2="230.4" y2="26.25" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1033" x1="-33.599999999999994" y1="52.5" x2="230.4" y2="52.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1034" x1="-33.599999999999994" y1="78.75" x2="230.4" y2="78.75" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1029" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1037" x1="0" y1="105" x2="196.8" y2="105" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1036" x1="0" y1="1" x2="0" y2="105" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1013" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1014" class="apexcharts-series" rel="1" seriesName="Inflation" data:realIndex="0"><path id="SvgjsPath1018" d="M-15.99 105.001L-15.99 52.501L15.99 52.501L15.99 105.001L-15.99 105.001C-15.99 105.001 -15.99 105.001 -15.99 105.001C-15.99 105.001 -15.99 105.001 -15.99 105.001C-15.99 105.001 -15.99 105.001 -15.99 105.001C-15.99 105.001 -15.99 105.001 -15.99 105.001 " fill="var(--gk-light-primary)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskt0q97afb)" pathTo="M -15.99 105.001 L -15.99 52.501 L 15.99 52.501 L 15.99 105.001 Z" pathFrom="M -15.99 105.001 L -15.99 105.001 L 15.99 105.001 L 15.99 105.001 L 15.99 105.001 L 15.99 105.001 L 15.99 105.001 L -15.99 105.001 Z" cy="52.5" cx="15.99" j="0" val="40" barHeight="52.5" barWidth="31.98"></path><path id="SvgjsPath1020" d="M33.21 105.001L33.21 78.751L65.19 78.751L65.19 105.001L33.21 105.001C33.21 105.001 33.21 105.001 33.21 105.001C33.21 105.001 33.21 105.001 33.21 105.001C33.21 105.001 33.21 105.001 33.21 105.001C33.21 105.001 33.21 105.001 33.21 105.001 " fill="var(--gk-light-primary)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskt0q97afb)" pathTo="M 33.21 105.001 L 33.21 78.751 L 65.19 78.751 L 65.19 105.001 Z" pathFrom="M 33.21 105.001 L 33.21 105.001 L 65.19 105.001 L 65.19 105.001 L 65.19 105.001 L 65.19 105.001 L 65.19 105.001 L 33.21 105.001 Z" cy="78.75" cx="65.19" j="1" val="20" barHeight="26.25" barWidth="31.98"></path><path id="SvgjsPath1022" d="M82.41000000000001 105.001L82.41000000000001 39.376000000000005L114.39000000000001 39.376000000000005L114.39000000000001 105.001L82.41000000000001 105.001C82.41000000000001 105.001 82.41000000000001 105.001 82.41000000000001 105.001C82.41000000000001 105.001 82.41000000000001 105.001 82.41000000000001 105.001C82.41000000000001 105.001 82.41000000000001 105.001 82.41000000000001 105.001C82.41000000000001 105.001 82.41000000000001 105.001 82.41000000000001 105.001 " fill="var(--gk-light-primary)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskt0q97afb)" pathTo="M 82.41000000000001 105.001 L 82.41000000000001 39.376 L 114.39000000000001 39.376 L 114.39000000000001 105.001 Z" pathFrom="M 82.41000000000001 105.001 L 82.41000000000001 105.001 L 114.39000000000001 105.001 L 114.39000000000001 105.001 L 114.39000000000001 105.001 L 114.39000000000001 105.001 L 114.39000000000001 105.001 L 82.41000000000001 105.001 Z" cy="39.375" cx="114.39000000000001" j="2" val="50" barHeight="65.625" barWidth="31.98"></path><path id="SvgjsPath1024" d="M131.60999999999999 105.001L131.60999999999999 0.0010000000000047748L163.58999999999997 0.0010000000000047748L163.58999999999997 105.001L131.60999999999999 105.001C131.60999999999999 105.001 131.60999999999999 105.001 131.60999999999999 105.001C131.60999999999999 105.001 131.60999999999999 105.001 131.60999999999999 105.001C131.60999999999999 105.001 131.60999999999999 105.001 131.60999999999999 105.001C131.60999999999999 105.001 131.60999999999999 105.001 131.60999999999999 105.001 " fill="var(--gk-light-primary)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskt0q97afb)" pathTo="M 131.60999999999999 105.001 L 131.60999999999999 0.001 L 163.58999999999997 0.001 L 163.58999999999997 105.001 Z" pathFrom="M 131.60999999999999 105.001 L 131.60999999999999 105.001 L 163.58999999999997 105.001 L 163.58999999999997 105.001 L 163.58999999999997 105.001 L 163.58999999999997 105.001 L 163.58999999999997 105.001 L 131.60999999999999 105.001 Z" cy="0" cx="163.58999999999997" j="3" val="80" barHeight="105" barWidth="31.98"></path><path id="SvgjsPath1026" d="M180.81 105.001L180.81 19.688500000000005L212.79 19.688500000000005L212.79 105.001L180.81 105.001C180.81 105.001 180.81 105.001 180.81 105.001C180.81 105.001 180.81 105.001 180.81 105.001C180.81 105.001 180.81 105.001 180.81 105.001C180.81 105.001 180.81 105.001 180.81 105.001 " fill="var(--gk-light-primary)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskt0q97afb)" pathTo="M 180.81 105.001 L 180.81 19.6885 L 212.79 19.6885 L 212.79 105.001 Z" pathFrom="M 180.81 105.001 L 180.81 105.001 L 212.79 105.001 L 212.79 105.001 L 212.79 105.001 L 212.79 105.001 L 212.79 105.001 L 180.81 105.001 Z" cy="19.6875" cx="212.79" j="4" val="65" barHeight="85.3125" barWidth="31.98"></path><g id="SvgjsG1016" class="apexcharts-bar-goals-markers" style="pointer-events: none"><g id="SvgjsG1017" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1019" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1021" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1023" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1025" className="apexcharts-bar-goals-groups"></g></g></g><g id="SvgjsG1015" class="apexcharts-datalabels" data:realIndex="0"></g></g><g id="SvgjsG1030" class="apexcharts-grid-borders" style="display: none;"><line id="SvgjsLine1031" x1="-33.599999999999994" y1="0" x2="230.4" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1035" x1="-33.599999999999994" y1="105" x2="230.4" y2="105" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><line id="SvgjsLine1038" x1="-33.599999999999994" y1="0" x2="230.4" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1039" x1="-33.599999999999994" y1="0" x2="230.4" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1040" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1041" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1049" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1050" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1051" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1052" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1053" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><g id="SvgjsG1004" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 75px;"></div></div></div>
                                                <h4 class="mb-1">أرباحك هذا الشهر</h4>
                                                <h5 class="mb-0 display-4 fw-bold">$3,210</h5>
                                                <p class="px-4">قم بتحديث طريقة الدفع الخاصة بك في الإعدادات</p>
                                                <a href="#" class="btn btn-primary">سحب الأرباح</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                                            <!-- Check box -->
                                            <div class="border p-4 rounded-3 mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="form-check-input" checked="">
                                                    <label class="form-check-label" for="customRadio1">
                                                        <img src="/assets/images/brand/paypal-small.svg" alt="paypal">
                                                    </label>
                                                    <p>لقد تمت الموافقة على حساب PayPal الخاص بك لإجراء الدفعات.</p>
                                                    <a href="#" class="btn btn-outline-primary">إزالة حساب</a>
                                                </div>
                                            </div>
                                            <!-- Check box -->
                                            <div class="border p-4 rounded-3 mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                                    <label class="form-check-label ps-1" for="customRadio2">
                                                        <img src="/assets/images/brand/payoneer.svg" alt="payoneer">
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- Check box -->
                                            <div class="border p-4 rounded-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio3" name="customRadio" class="form-check-input">
                                                    <label class="form-check-label ps-1 h4" for="customRadio3">التحويل المصرفي</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <!-- Card header -->
                                <div class="card-header border-bottom-0">
                                    <h3 class="h4 mb-3">سحب التاريخ</h3>
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-6 pe-md-0 mb-2 mb-lg-0">
                                            <!-- Custom select -->
                                            <select class="form-select">
                                                <option value="">13 أيام</option>
                                                <option value="Last 7 days">4 شهور</option>
                                                <option value="High Rated">6 شهور</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 pe-md-0 mb-2 mb-lg-0">
                                            <!-- Custom select -->
                                            <select class="form-select">
                                                <option value="">Oct 2020</option>
                                                <option value="Jan 2021">Jan 2021</option>
                                                <option value="May 2021">May 2021</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-2 mb-lg-0">
                                            <!-- Custom select -->
                                            <select class="form-select">
                                                <option value="">نوع المعاملة</option>
                                                <option value="cash transactions">المعاملات النقدية</option>
                                                <option value="non-cash transactions">المعاملات غير النقدية</option>
                                                <option value="credit transactions">معاملات الائتمان</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-6 text-lg-end">
                                            <!-- Button -->
                                            <a href="#" class="btn btn-outline-secondary btn-icon" download="">
                                                <i class="fe fe-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table mb-0 text-nowrap table-hover table-centered table-with-checkbox">
                                        <thead class="table-light">
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th>المعرف</th>
												<th>الطريقة</th>
												<th>الحالة</th>
												<th>المبلغ</th>
												<th>التاريخ</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="withdrawTwo">
                                                        <label class="form-check-label" for="withdrawTwo"></label>
                                                    </div>
                                                </td>
                                                <td>#1060</td>
                                                <td>PayPal</td>
                                                <td>
                                                    <span class="badge bg-warning">قيد الانتظار</span>
                                                </td>
                                                <td>$1200</td>
                                                <td>Sept 15, 2020</td>
                                                <td>
                                                    <span class="dropdown dropstart">
                                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown">
                                                            <span class="dropdown-header">الإعدادات</span>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                                تعديل
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                                إزالة
                                                            </a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="withdrawThree">
                                                        <label class="form-check-label" for="withdrawThree"></label>
                                                    </div>
                                                </td>
                                                <td>#1038</td>
                                                <td>PayPal</td>
                                                <td>
                                                    <span class="badge bg-success">مدفوع</span>
                                                </td>
                                                <td>$2000</td>
                                                <td>Aug 15, 2020</td>
                                                <td>
                                                    <span class="dropdown dropstart">
                                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown1" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown1">
                                                            <span class="dropdown-header">الإعدادات</span>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                                تعديل
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                                إزالة
                                                            </a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="withdrawFour">
                                                        <label class="form-check-label" for="withdrawFour"></label>
                                                    </div>
                                                </td>
                                                <td>#1016</td>
                                                <td>PayPal</td>
                                                <td>
                                                    <span class="badge bg-success">مدفوع</span>
                                                </td>
                                                <td>$3590</td>
                                                <td>July 15, 2020</td>
                                                <td>
                                                    <span class="dropdown dropstart">
                                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown2" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown2">
                                                            <span class="dropdown-header">الإعدادات</span>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                                تعديل
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                                إزالة
                                                            </a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="withdrawFive">
                                                        <label class="form-check-label" for="withdrawFive"></label>
                                                    </div>
                                                </td>
                                                <td>#1008</td>
                                                <td>PayPal</td>
                                                <td>
                                                    <span class="badge bg-success">مدفوع</span>
                                                </td>
                                                <td>$4500</td>
                                                <td>Aug 15, 2020</td>
                                                <td>
                                                    <span class="dropdown dropstart">
                                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown3" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown3">
                                                            <span class="dropdown-header">الإعدادات</span>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                                تعديل
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                                إزالة
                                                            </a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="withdrawSix">
                                                        <label class="form-check-label" for="withdrawSix"></label>
                                                    </div>
                                                </td>
                                                <td>#1002</td>
                                                <td>PayPal</td>
                                                <td>
                                                    <span class="badge bg-success">مدفوع</span>
                                                </td>
                                                <td>$4500</td>
                                                <td>May 15, 2020</td>
                                                <td>
                                                    <span class="dropdown dropstart">
                                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown4" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown4">
                                                            <span class="dropdown-header">الإعدادات</span>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                                تعديل
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                                إزالة
                                                            </a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="withdrawSeven">
                                                        <label class="form-check-label" for="withdrawSeven"></label>
                                                    </div>
                                                </td>
                                                <td>#982</td>
                                                <td>PayPal</td>
                                                <td>
                                                    <span class="badge bg-success">مدفوع</span>
                                                </td>
                                                <td>$1232</td>
                                                <td>April 15, 2020</td>
                                                <td>
                                                    <span class="dropdown dropstart">
                                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown5" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown5">
                                                            <span class="dropdown-header">الإعدادات</span>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                                تعديل
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                                إزالة
                                                            </a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="withdrawEight">
                                                        <label class="form-check-label" for="withdrawEight"></label>
                                                    </div>
                                                </td>
                                                <td>#970</td>
                                                <td>PayPal</td>
                                                <td>
                                                    <span class="badge bg-danger">إلغاء</span>
                                                </td>
                                                <td>$4235</td>
                                                <td>March 15, 2020</td>
                                                <td>
                                                    <span class="dropdown dropstart">
                                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown6" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown6">
                                                            <span class="dropdown-header">الإعدادات</span>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                                تعديل
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                                إزالة
                                                            </a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="withdrawNine">
                                                        <label class="form-check-label" for="withdrawNine"></label>
                                                    </div>
                                                </td>
                                                <td>#965</td>
                                                <td>PayPal</td>
                                                <td>
                                                    <span class="badge bg-success">مدفوع</span>
                                                </td>
                                                <td>$1231</td>
                                                <td>Feb 15, 2020</td>
                                                <td>
                                                    <span class="dropdown dropstart">
                                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown7" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown7">
                                                            <span class="dropdown-header">الإعدادات</span>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                                تعديل
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                                إزالة
                                                            </a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="withdrawTen">
                                                        <label class="form-check-label" for="withdrawTen"></label>
                                                    </div>
                                                </td>
                                                <td>#953</td>
                                                <td>PayPal</td>
                                                <td>
                                                    <span class="badge bg-success">مدفوع</span>
                                                </td>
                                                <td>$5435</td>
                                                <td>Jan 15, 2020</td>
                                                <td>
                                                    <span class="dropdown dropstart">
                                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown8" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown8">
                                                            <span class="dropdown-header">الإعدادات</span>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                                تعديل
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                                إزالة
                                                            </a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-footer">
                                        <nav>
                                            <ul class="pagination justify-content-center mb-0">
                                                <li class="page-item disabled">
                                                    <a class="page-link mx-1 rounded" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z">
                                                        </path></svg>
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