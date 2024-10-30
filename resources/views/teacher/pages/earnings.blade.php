@section('title', 'Home tetcher')

@extends('layouts.teacher')



@section('teacher.content')
<!-- Card -->

<!-- Card -->
<div class="card mb-4">
    <!-- Card body -->
    <div class="card-body">
        <h3 class="mb-0">الأرباح</h3>
        <p class="mb-0">لديك التحكم الكامل في إدارة إعدادات حسابك الخاص.</p>
    </div>
</div>
<!-- Card body -->
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">الأرباح</h4>
        <!-- Dropdown -->
        <div class="dropdown dropstart">
            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fe fe-more-vertical"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="paymentDropdown">
                <span class="dropdown-header">الإعدادات</span>
                <a class="dropdown-item" href="#">30 يوما</a>
                <a class="dropdown-item" href="#">3 أشهر</a>
            </div>
        </div>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 col-12 mb-3 mb-lg-0">
                <div>
                    <i
                        class="fe fe-shopping-cart icon-shape icon-sm rounded-3 bg-light-success text-dark-success mt-2"></i>
                    <h3 class="display-4 fw-bold mt-3 mb-0">$3,210</h3>
                    <span>إجمالي أرباحك</span>
                    <hr class="my-4">
                    <div class="row">
                        <!-- Total earning chart -->
                        <div class="col ps-0">
                            <div id="totalEarning" class="apex-charts mt-n4 mb-n3" style="min-height: 95.7453px;">
                                <div id="apexchartsurv0pwns"
                                    class="apexcharts-canvas apexchartsurv0pwns apexcharts-theme-light"
                                    style="width: 130px; height: 80.7453px;"><svg id="SvgjsSvg1373" width="130"
                                        height="80.74534161490682" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                        transform="translate(0, 0)" style="background: transparent;">
                                        <rect id="SvgjsRect1379" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                            opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                            fill="#fefefe"></rect>
                                        <g id="SvgjsG1421" class="apexcharts-yaxis" rel="0"
                                            transform="translate(-8, 0)">
                                            <g id="SvgjsG1422" class="apexcharts-yaxis-texts-g"></g>
                                        </g>
                                        <g id="SvgjsG1375" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(22, 30)">
                                            <defs id="SvgjsDefs1374">
                                                <clipPath id="gridRectMaskurv0pwns">
                                                    <rect id="SvgjsRect1381" width="104" height="20.74534161490682"
                                                        x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskurv0pwns"></clipPath>
                                                <clipPath id="nonForecastMaskurv0pwns"></clipPath>
                                                <clipPath id="gridRectMarkerMaskurv0pwns">
                                                    <rect id="SvgjsRect1382" width="102" height="22.74534161490682"
                                                        x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <line id="SvgjsLine1380" x1="0" y1="0" x2="0" y2="18.74534161490682"
                                                stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt"
                                                class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                                height="18.74534161490682" fill="#b1b9c4" filter="none"
                                                fill-opacity="0.9" stroke-width="1"></line>
                                            <line id="SvgjsLine1392" x1="0" y1="19.74534161490682" x2="0"
                                                y2="25.74534161490682" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1393" x1="12.25" y1="19.74534161490682" x2="12.25"
                                                y2="25.74534161490682" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1394" x1="24.5" y1="19.74534161490682" x2="24.5"
                                                y2="25.74534161490682" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1395" x1="36.75" y1="19.74534161490682" x2="36.75"
                                                y2="25.74534161490682" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1396" x1="49" y1="19.74534161490682" x2="49"
                                                y2="25.74534161490682" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1397" x1="61.25" y1="19.74534161490682" x2="61.25"
                                                y2="25.74534161490682" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1398" x1="73.5" y1="19.74534161490682" x2="73.5"
                                                y2="25.74534161490682" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1399" x1="85.75" y1="19.74534161490682" x2="85.75"
                                                y2="25.74534161490682" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1400" x1="98" y1="19.74534161490682" x2="98"
                                                y2="25.74534161490682" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <g id="SvgjsG1388" class="apexcharts-grid">
                                                <g id="SvgjsG1389" class="apexcharts-gridlines-horizontal"
                                                    style="display: none;">
                                                    <line id="SvgjsLine1402" x1="0" y1="4.686335403726705" x2="98"
                                                        y2="4.686335403726705" stroke="#e0e0e0" stroke-dasharray="0"
                                                        stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1403" x1="0" y1="9.37267080745341" x2="98"
                                                        y2="9.37267080745341" stroke="#e0e0e0" stroke-dasharray="0"
                                                        stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1404" x1="0" y1="14.059006211180115" x2="98"
                                                        y2="14.059006211180115" stroke="#e0e0e0" stroke-dasharray="0"
                                                        stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG1390" class="apexcharts-gridlines-vertical"
                                                    style="display: none;"></g>
                                                <line id="SvgjsLine1407" x1="0" y1="18.74534161490682" x2="98"
                                                    y2="18.74534161490682" stroke="transparent" stroke-dasharray="0"
                                                    stroke-linecap="butt"></line>
                                                <line id="SvgjsLine1406" x1="0" y1="1" x2="0" y2="18.74534161490682"
                                                    stroke="transparent" stroke-dasharray="0" stroke-linecap="butt">
                                                </line>
                                            </g>
                                            <g id="SvgjsG1383" class="apexcharts-line-series apexcharts-plot-series">
                                                <g id="SvgjsG1384" class="apexcharts-series" seriesName="series-1"
                                                    data:longestSeries="true" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath1387"
                                                        d="M 0 12.88742236024844C 4.2875000000000005 12.88742236024844 7.962500000000001 9.37267080745341 12.250000000000002 9.37267080745341C 16.5375 9.37267080745341 20.212500000000002 18.159549689440983 24.500000000000004 18.159549689440983C 28.7875 18.159549689440983 32.4625 8.201086956521735 36.75 8.201086956521735C 41.0375 8.201086956521735 44.712500000000006 17.33944099378881 49.00000000000001 17.33944099378881C 53.28750000000001 17.33944099378881 56.962500000000006 1.171583850931679 61.25000000000001 1.171583850931679C 65.53750000000001 1.171583850931679 69.2125 17.33944099378881 73.5 17.33944099378881C 77.7875 17.33944099378881 81.4625 9.37267080745341 85.75 9.37267080745341C 90.03750000000001 9.37267080745341 93.7125 1.171583850931679 98.00000000000001 1.171583850931679"
                                                        fill="none" fill-opacity="1" stroke="var(--gk-success)"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                                        stroke-dasharray="0" class="apexcharts-line" index="0"
                                                        clip-path="url(#gridRectMaskurv0pwns)"
                                                        pathTo="M 0 12.88742236024844C 4.2875000000000005 12.88742236024844 7.962500000000001 9.37267080745341 12.250000000000002 9.37267080745341C 16.5375 9.37267080745341 20.212500000000002 18.159549689440983 24.500000000000004 18.159549689440983C 28.7875 18.159549689440983 32.4625 8.201086956521735 36.75 8.201086956521735C 41.0375 8.201086956521735 44.712500000000006 17.33944099378881 49.00000000000001 17.33944099378881C 53.28750000000001 17.33944099378881 56.962500000000006 1.171583850931679 61.25000000000001 1.171583850931679C 65.53750000000001 1.171583850931679 69.2125 17.33944099378881 73.5 17.33944099378881C 77.7875 17.33944099378881 81.4625 9.37267080745341 85.75 9.37267080745341C 90.03750000000001 9.37267080745341 93.7125 1.171583850931679 98.00000000000001 1.171583850931679"
                                                        pathFrom="M -1 18.74534161490682 L -1 18.74534161490682 L 12.250000000000002 18.74534161490682 L 24.500000000000004 18.74534161490682 L 36.75 18.74534161490682 L 49.00000000000001 18.74534161490682 L 61.25000000000001 18.74534161490682 L 73.5 18.74534161490682 L 85.75 18.74534161490682 L 98.00000000000001 18.74534161490682"
                                                        fill-rule="evenodd"></path>
                                                    <g id="SvgjsG1385" class="apexcharts-series-markers-wrap"
                                                        data:realIndex="0"></g>
                                                </g>
                                                <g id="SvgjsG1386" class="apexcharts-datalabels" data:realIndex="0"></g>
                                            </g>
                                            <g id="SvgjsG1391" class="apexcharts-grid-borders" style="display: none;">
                                                <line id="SvgjsLine1401" x1="0" y1="0" x2="98" y2="0" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1405" x1="0" y1="18.74534161490682" x2="98"
                                                    y2="18.74534161490682" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            </g>
                                            <line id="SvgjsLine1408" x1="0" y1="0" x2="98" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1409" x1="0" y1="0" x2="98" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1410" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG1411" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, 4)"></g>
                                            </g>
                                            <g id="SvgjsG1423" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1424" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1425" class="apexcharts-point-annotations"></g>
                                            <rect id="SvgjsRect1426" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                            <rect id="SvgjsRect1427" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                        </g>
                                        <g id="SvgjsG1376" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 40.3727px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-success">
                                <i class="fe fe-trending-up fs-6 me-2"></i>
                                32%
                            </span>
                        </div>
                    </div>
                    <p class="mb-0 lh-1.5">قم بتحديث طريقة الدفع الخاصة بك في الإعدادات.</p>
                </div>
            </div>
            <!-- Earning chart -->
            <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                <div id="earning" class="apex-charts" style="min-height: 295px;">
                    <div id="apexchartsd0sw6wrq" class="apexcharts-canvas apexchartsd0sw6wrq apexcharts-theme-light"
                        style="width: 674px; height: 280px;"><svg id="SvgjsSvg1288" width="674" height="280"
                            xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable"
                            xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                            <rect id="SvgjsRect1294" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                            <g id="SvgjsG1353" class="apexcharts-yaxis" rel="0"
                                transform="translate(8.066665649414062, 0)">
                                <g id="SvgjsG1354" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1356"
                                        font-family="$font-family-base" x="20" y="31.3" text-anchor="end"
                                        dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                        class="apexcharts-text apexcharts-yaxis-label apexcharts-xaxis-label">
                                        <tspan id="SvgjsTspan1357">40k</tspan>
                                        <title>40k</title>
                                    </text><text id="SvgjsText1359" font-family="$font-family-base" x="20"
                                        y="100.73433333333332" text-anchor="end" dominant-baseline="auto"
                                        font-size="13px" font-weight="400" fill="#373d3f"
                                        class="apexcharts-text apexcharts-yaxis-label apexcharts-xaxis-label">
                                        <tspan id="SvgjsTspan1360">30k</tspan>
                                        <title>30k</title>
                                    </text><text id="SvgjsText1362" font-family="$font-family-base" x="20"
                                        y="170.16866666666667" text-anchor="end" dominant-baseline="auto"
                                        font-size="13px" font-weight="400" fill="#373d3f"
                                        class="apexcharts-text apexcharts-yaxis-label apexcharts-xaxis-label">
                                        <tspan id="SvgjsTspan1363">20k</tspan>
                                        <title>20k</title>
                                    </text><text id="SvgjsText1365" font-family="$font-family-base" x="20" y="239.603"
                                        text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400"
                                        fill="#373d3f"
                                        class="apexcharts-text apexcharts-yaxis-label apexcharts-xaxis-label">
                                        <tspan id="SvgjsTspan1366">10k</tspan>
                                        <title>10k</title>
                                    </text></g>
                            </g>
                            <g id="SvgjsG1290" class="apexcharts-inner apexcharts-graphical"
                                transform="translate(41.06666564941406, 30)">
                                <defs id="SvgjsDefs1289">
                                    <clipPath id="gridRectMaskd0sw6wrq">
                                        <rect id="SvgjsRect1296" width="626.850001335144" height="212.303" x="-4" y="-2"
                                            rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                            stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                    <clipPath id="forecastMaskd0sw6wrq"></clipPath>
                                    <clipPath id="nonForecastMaskd0sw6wrq"></clipPath>
                                    <clipPath id="gridRectMarkerMaskd0sw6wrq">
                                        <rect id="SvgjsRect1297" width="622.850001335144" height="212.303" x="-2" y="-2"
                                            rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                            stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                </defs>
                                <line id="SvgjsLine1295" x1="0" y1="0" x2="0" y2="208.303" stroke="#b6b6b6"
                                    stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0"
                                    y="0" width="1" height="208.303" fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                    stroke-width="1"></line>
                                <g id="SvgjsG1303" class="apexcharts-grid">
                                    <g id="SvgjsG1304" class="apexcharts-gridlines-horizontal">
                                        <line id="SvgjsLine1308" x1="0" y1="69.43433333333333" x2="618.850001335144"
                                            y2="69.43433333333333" stroke="var(--gk-border-color)" stroke-dasharray="5"
                                            stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1309" x1="0" y1="138.86866666666666" x2="618.850001335144"
                                            y2="138.86866666666666" stroke="var(--gk-border-color)" stroke-dasharray="5"
                                            stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    </g>
                                    <g id="SvgjsG1305" class="apexcharts-gridlines-vertical"></g>
                                    <line id="SvgjsLine1312" x1="0" y1="208.303" x2="618.850001335144" y2="208.303"
                                        stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    <line id="SvgjsLine1311" x1="0" y1="1" x2="0" y2="208.303" stroke="transparent"
                                        stroke-dasharray="0" stroke-linecap="butt"></line>
                                </g>
                                <g id="SvgjsG1298" class="apexcharts-line-series apexcharts-plot-series">
                                    <g id="SvgjsG1299" class="apexcharts-series" seriesName="CurrentxMonth"
                                        data:longestSeries="true" rel="1" data:realIndex="0">
                                        <path id="SvgjsPath1302"
                                            d="M 0 208.30300000000003C 19.690681860663673 208.30300000000003 36.56840916980397 138.86866666666668 56.259091030467644 138.86866666666668C 75.94977289113132 138.86866666666668 92.82750020027161 173.58583333333337 112.51818206093529 173.58583333333337C 132.20886392159895 173.58583333333337 149.08659123073926 104.15150000000003 168.77727309140292 104.15150000000003C 188.4679549520666 104.15150000000003 205.3456822612069 152.75553333333335 225.03636412187058 152.75553333333335C 244.72704598253424 152.75553333333335 261.6047732916745 83.32120000000003 281.2954551523382 83.32120000000003C 300.9861370130019 83.32120000000003 317.86386432214215 124.98180000000002 337.55454618280584 124.98180000000002C 357.2452280434695 124.98180000000002 374.12295535260984 55.54746666666671 393.8136372132735 55.54746666666671C 413.5043190739372 55.54746666666671 430.38204638307747 111.09493333333336 450.07272824374115 111.09493333333336C 469.76341010440484 111.09493333333336 486.6411374135451 41.66060000000002 506.3318192742088 41.66060000000002C 526.0225011348724 41.66060000000002 542.9002284440128 97.2080666666667 562.5909103046764 97.2080666666667C 582.28159216534 97.2080666666667 599.1593194744804 13.88686666666672 618.850001335144 13.88686666666672"
                                            fill="none" fill-opacity="1" stroke="rgba(117,79,254,0.85)"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="4"
                                            stroke-dasharray="0" class="apexcharts-line" index="0"
                                            clip-path="url(#gridRectMaskd0sw6wrq)"
                                            pathTo="M 0 208.30300000000003C 19.690681860663673 208.30300000000003 36.56840916980397 138.86866666666668 56.259091030467644 138.86866666666668C 75.94977289113132 138.86866666666668 92.82750020027161 173.58583333333337 112.51818206093529 173.58583333333337C 132.20886392159895 173.58583333333337 149.08659123073926 104.15150000000003 168.77727309140292 104.15150000000003C 188.4679549520666 104.15150000000003 205.3456822612069 152.75553333333335 225.03636412187058 152.75553333333335C 244.72704598253424 152.75553333333335 261.6047732916745 83.32120000000003 281.2954551523382 83.32120000000003C 300.9861370130019 83.32120000000003 317.86386432214215 124.98180000000002 337.55454618280584 124.98180000000002C 357.2452280434695 124.98180000000002 374.12295535260984 55.54746666666671 393.8136372132735 55.54746666666671C 413.5043190739372 55.54746666666671 430.38204638307747 111.09493333333336 450.07272824374115 111.09493333333336C 469.76341010440484 111.09493333333336 486.6411374135451 41.66060000000002 506.3318192742088 41.66060000000002C 526.0225011348724 41.66060000000002 542.9002284440128 97.2080666666667 562.5909103046764 97.2080666666667C 582.28159216534 97.2080666666667 599.1593194744804 13.88686666666672 618.850001335144 13.88686666666672"
                                            pathFrom="M -1 277.73733333333337 L -1 277.73733333333337 L 56.259091030467644 277.73733333333337 L 112.51818206093529 277.73733333333337 L 168.77727309140292 277.73733333333337 L 225.03636412187058 277.73733333333337 L 281.2954551523382 277.73733333333337 L 337.55454618280584 277.73733333333337 L 393.8136372132735 277.73733333333337 L 450.07272824374115 277.73733333333337 L 506.3318192742088 277.73733333333337 L 562.5909103046764 277.73733333333337 L 618.850001335144 277.73733333333337"
                                            fill-rule="evenodd"></path>
                                        <g id="SvgjsG1300" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                            <g class="apexcharts-series-markers">
                                                <circle id="SvgjsCircle1370" r="0" cx="0" cy="0"
                                                    class="apexcharts-marker wtxza5yav no-pointer-events"
                                                    stroke="#ffffff" fill="var(--gk-primary)" fill-opacity="1"
                                                    stroke-width="2" stroke-opacity="0.9" default-marker-size="0">
                                                </circle>
                                            </g>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1301" class="apexcharts-datalabels" data:realIndex="0"></g>
                                </g>
                                <g id="SvgjsG1306" class="apexcharts-grid-borders">
                                    <line id="SvgjsLine1307" x1="0" y1="0" x2="618.850001335144" y2="0"
                                        stroke="var(--gk-border-color)" stroke-dasharray="5" stroke-linecap="butt"
                                        class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1310" x1="0" y1="208.303" x2="618.850001335144" y2="208.303"
                                        stroke="var(--gk-border-color)" stroke-dasharray="5" stroke-linecap="butt"
                                        class="apexcharts-gridline"></line>
                                </g>
                                <line id="SvgjsLine1313" x1="0" y1="0" x2="618.850001335144" y2="0" stroke="#b6b6b6"
                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                    class="apexcharts-ycrosshairs"></line>
                                <line id="SvgjsLine1314" x1="0" y1="0" x2="618.850001335144" y2="0" stroke-dasharray="0"
                                    stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                <g id="SvgjsG1315" class="apexcharts-xaxis" transform="translate(0, 0)">
                                    <g id="SvgjsG1316" class="apexcharts-xaxis-texts-g" transform="translate(0, 1)">
                                        <text id="SvgjsText1318" font-family="$font-family-base" x="0" y="242.303"
                                            text-anchor="middle" dominant-baseline="auto" font-size="13px"
                                            font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1319">Jan</tspan>
                                            <title>Jan</title>
                                        </text><text id="SvgjsText1321" font-family="$font-family-base"
                                            x="56.259091030467644" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1322">Feb</tspan>
                                            <title>Feb</title>
                                        </text><text id="SvgjsText1324" font-family="$font-family-base"
                                            x="112.51818206093529" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1325">March</tspan>
                                            <title>March</title>
                                        </text><text id="SvgjsText1327" font-family="$font-family-base"
                                            x="168.77727309140292" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1328">April</tspan>
                                            <title>April</title>
                                        </text><text id="SvgjsText1330" font-family="$font-family-base"
                                            x="225.03636412187055" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1331">May</tspan>
                                            <title>May</title>
                                        </text><text id="SvgjsText1333" font-family="$font-family-base"
                                            x="281.2954551523382" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1334">Jun</tspan>
                                            <title>Jun</title>
                                        </text><text id="SvgjsText1336" font-family="$font-family-base"
                                            x="337.55454618280584" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1337">Jul</tspan>
                                            <title>Jul</title>
                                        </text><text id="SvgjsText1339" font-family="$font-family-base"
                                            x="393.81363721327347" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1340">Aug</tspan>
                                            <title>Aug</title>
                                        </text><text id="SvgjsText1342" font-family="$font-family-base"
                                            x="450.0727282437411" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1343">Sep</tspan>
                                            <title>Sep</title>
                                        </text><text id="SvgjsText1345" font-family="$font-family-base"
                                            x="506.3318192742087" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1346">Oct</tspan>
                                            <title>Oct</title>
                                        </text><text id="SvgjsText1348" font-family="$font-family-base"
                                            x="562.5909103046763" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1349">Nov</tspan>
                                            <title>Nov</title>
                                        </text><text id="SvgjsText1351" font-family="$font-family-base"
                                            x="618.8500013351439" y="242.303" text-anchor="middle"
                                            dominant-baseline="auto" font-size="13px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label">
                                            <tspan id="SvgjsTspan1352">Dec</tspan>
                                            <title>Dec</title>
                                        </text></g>
                                </g>
                                <g id="SvgjsG1367" class="apexcharts-yaxis-annotations"></g>
                                <g id="SvgjsG1368" class="apexcharts-xaxis-annotations"></g>
                                <g id="SvgjsG1369" class="apexcharts-point-annotations"></g>
                                <rect id="SvgjsRect1371" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                    stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"
                                    class="apexcharts-zoom-rect"></rect>
                                <rect id="SvgjsRect1372" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                    stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"
                                    class="apexcharts-selection-rect"></rect>
                            </g>
                            <g id="SvgjsG1291" class="apexcharts-annotations"></g>
                        </svg>
                        <div class="apexcharts-legend" style="max-height: 140px;"></div>
                        <div class="apexcharts-tooltip apexcharts-theme-light">
                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                    class="apexcharts-tooltip-marker"
                                    style="background-color: var(--gk-primary);"></span>
                                <div class="apexcharts-tooltip-text" style="font-size: 12px;">
                                    <div class="apexcharts-tooltip-y-group"><span
                                            class="apexcharts-tooltip-text-y-label"></span><span
                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                    <div class="apexcharts-tooltip-goals-group"><span
                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                    <div class="apexcharts-tooltip-z-group"><span
                                            class="apexcharts-tooltip-text-z-label"></span><span
                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                            <div class="apexcharts-xaxistooltip-text" style="font-size: 12px;"></div>
                        </div>
                        <div
                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                            <div class="apexcharts-yaxistooltip-text"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card body -->
            <div class="p-4">
                <span class="icon-shape icon-sm bg-light-primary text-dark-primary rounded-3"><i
                        class="fe fe-folder"></i></span>
                <h2 class="h1 fw-bold mb-0 mt-4 lh-1">$3,210</h2>
                <p>الربح هذا الشهر</p>
                <div class="progress bg-light-primary" style="height: 2px">
                    <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12">
        <!-- Card body -->
        <div class="card mb-4">
            <!-- Card body -->
            <div class="p-4">
                <span class="icon-shape icon-sm bg-light-danger text-dark-danger rounded-3"><i
                        class="fe fe-shopping-bag"></i></span>
                <h2 class="h1 fw-bold mb-0 mt-4 lh-1">$3,800.00</h2>
                <p>رصيد الحساب</p>
                <div class="progress bg-light-danger" style="height: 2px">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12">
        <!-- Card body -->
        <div class="card mb-4">
            <!-- Card body -->
            <div class="p-4">
                <span class="icon-shape icon-sm bg-light-warning text-dark-warning rounded-3"><i
                        class="fe fe-send"></i></span>
                <h2 class="h1 fw-bold mb-0 mt-4 lh-1">$10,800.00</h2>
                <p>مبيعات مدى الحياة</p>
                <div class="progress bg-light-warning" style="height: 2px">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Card -->
<div class="card mb-4">
    <div class="card-header border-bottom-0">
        <h3 class="mb-0 h4">الدورات الأكثر مبيعا</h3>
    </div>
    <!-- Table -->
    <div class="table-responsive">
        <table class="table mb-0 text-nowrap table-hover table-centered text-nowrap">
            <thead class="table-light">
                <tr>
                    <th>الدورات</th>
                    <th>المبيعات</th>
                    <th>المبلغ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="#">
                            <div class="d-flex align-items-center">
                                <img src="/assets/images/course/course-laravel.jpg" alt="course"
                                    class="rounded img-4by3-lg">
                                <h5 class="mb-0 ms-3 text-primary-hover">Building Scalable APIs with GraphQL</h5>
                            </div>
                        </a>
                    </td>
                    <td>34</td>
                    <td>$3,145.23</td>
                    <td class="align-middle border-top-0">
                        <span class="dropdown dropstart">
                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                id="courseDropdown1" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                <span class="dropdown-header">الإعدادات</span>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-تعديل dropdown-item-icon"></i>
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
                        <a href="#">
                            <div class="d-flex align-items-center">
                                <img src="/assets/images/course/course-sass.jpg" alt="course"
                                    class="rounded img-4by3-lg">
                                <h5 class="mb-0 ms-3 text-primary-hover">HTML5 Web Front End Development</h5>
                            </div>
                        </a>
                    </td>
                    <td>30</td>
                    <td>$2,611.82</td>
                    <td>
                        <span class="dropdown dropstart">
                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                id="courseDropdown2" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown2">
                                <span class="dropdown-header">الإعدادات</span>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-تعديل dropdown-item-icon"></i>
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
                        <a href="#">
                            <div class="d-flex align-items-center">
                                <img src="/assets/images/course/course-vue.jpg" alt="course"
                                    class="rounded img-4by3-lg">
                                <h5 class="mb-0 ms-3 text-primary-hover">Learn JavaScript Courses from Scratch</h5>
                            </div>
                        </a>
                    </td>
                    <td>26</td>
                    <td>$2,372.19</td>
                    <td>
                        <span class="dropdown dropstart">
                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                id="courseDropdown3" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                                <span class="dropdown-header">الإعدادات</span>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-تعديل dropdown-item-icon"></i>
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
                        <a href="#">
                            <div class="d-flex align-items-center">
                                <img src="/assets/images/course/course-react.jpg" alt="course"
                                    class="rounded img-4by3-lg">
                                <h5 class="mb-0 ms-3 text-primary-hover">Get Started: React Js Courses</h5>
                            </div>
                        </a>
                    </td>
                    <td>20</td>
                    <td>$1,145.23</td>
                    <td>
                        <span class="dropdown dropstart">
                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                id="courseDropdown4" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown4">
                                <span class="dropdown-header">الإعدادات</span>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-تعديل dropdown-item-icon"></i>
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
    </div>
</div>

@endsection