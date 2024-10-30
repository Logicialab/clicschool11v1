@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header border-bottom-0">
        <h3 class="mb-0">الفواتير</h3>
        <p class="mb-0">يمكنك العثور على جميع فواتير طلباتك هنا.</p>
    </div>
    <!-- Table -->
    <div class="table-invoice table-responsive">
        <table class="table mb-0 text-nowrap table-centered table-hover">
            <thead class="table-light">
                <tr>
                    <th>رقم الطلب</th>
                    <th>التاريخ</th>
                    <th>المبلغ</th>
                    <th>الحالة</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="invoice-details.html">#1008</a></td>
                    <td>17 أبريل 2020، 10:45م</td>
                    <td>$39.00</td>
                    <td><span class="badge bg-danger">مستحق</span></td>
                    <td>
                        <a href="/assets/images/pdf/#.pdf" class="fe fe-download" download=""></a>
                    </td>
                </tr>
                <tr>
                    <td><a href="invoice-details.html">#1007</a></td>
                    <td>17 أبريل 2020، 10:45م</td>
                    <td>$39.00</td>
                    <td>
                        <span class="badge bg-success">مكتمل</span>
                    </td>
                    <td>
                        <a href="/assets/images/pdf/#.pdf" class="fe fe-download" download=""></a>
                    </td>
                </tr>
                <tr>
                    <td><a href="invoice-details.html">#1006</a></td>
                    <td>17 فبراير 2020، 10:45م</td>
                    <td>$39.00</td>
                    <td>
                        <span class="badge bg-success">مكتمل</span>
                    </td>
                    <td>
                        <a href="/assets/images/pdf/#.pdf" class="fe fe-download" download=""></a>
                    </td>
                </tr>
                <tr>
                    <td><a href="invoice-details.html">#1005</a></td>
                    <td>17 يناير 2020، 10:45م</td>
                    <td>$39.00</td>
                    <td>
                        <span class="badge bg-success">مكتمل</span>
                    </td>
                    <td>
                        <a href="/assets/images/pdf/#.pdf" class="fe fe-download" download=""></a>
                    </td>
                </tr>
                <tr>
                    <td><a href="invoice-details.html">#1004</a></td>
                    <td>17 ديسمبر 2019، 10:45م</td>
                    <td>$39.00</td>
                    <td>
                        <span class="badge bg-success">مكتمل</span>
                    </td>
                    <td>
                        <a href="/assets/images/pdf/#.pdf" class="fe fe-download" download=""></a>
                    </td>
                </tr>
                <tr>
                    <td><a href="invoice-details.html">#1003</a></td>
                    <td>17 نوفمبر 2019، 10:45م</td>
                    <td>$39.00</td>
                    <td>
                        <span class="badge bg-success">مكتمل</span>
                    </td>
                    <td>
                        <a href="/assets/images/pdf/#.pdf" class="fe fe-download" download=""></a>
                    </td>
                </tr>
                <tr>
                    <td><a href="invoice-details.html">#1002</a></td>
                    <td>17 أكتوبر 2019، 10:45م</td>
                    <td>$39.00</td>
                    <td>
                        <span class="badge bg-success">مكتمل</span>
                    </td>
                    <td>
                        <a href="/assets/images/pdf/#.pdf" class="fe fe-download" download=""></a>
                    </td>
                </tr>
                <tr>
                    <td><a href="invoice-details.html">#1001</a></td>
                    <td>17 سبتمبر 2019، 10:45م</td>
                    <td>$39.00</td>
                    <td>
                        <span class="badge bg-success">مكتمل</span>
                    </td>
                    <td>
                        <a href="/assets/images/pdf/#.pdf" class="fe fe-download" download=""></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection