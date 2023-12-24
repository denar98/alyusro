<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Analytics</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Analytics</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card crm-widget">
                        <div class="card-body p-0">
                            <div class="row row-cols-xxl-4 row-cols-md-3 row-cols-1 g-0">
                                <div class="col">
                                    <div class="py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Total Jemaah Belum Lunas
                                            <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-coins-line display-6 text-muted"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0"><span class="counter-value" data-target="<?= $jemaah_belum_bayar->jemaah_belum_bayar ?>">0</span> Jemaah</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Total Jemaah Sudah Lunas <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="  ri-coins-fill display-6 text-muted"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0"><span class="counter-value" data-target="<?= $jemaah_sudah_lunas->jemaah_sudah_lunas ?>">0</span> Jemaah</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Jumlah Donatur
                                            <!-- <i class="ri-arrow-down-circle-line text-danger fs-18 float-end align-middle"></i></h5> -->
                                            <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-user-heart-line display-6 text-muted"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0"><span class="counter-value" data-target="<?= $total_donatur->total_donatur ?>">0</span> Donatur</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col">
                                    <div class="mt-3 mt-lg-0 py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Total Donasi
                                            <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-money-dollar-circle-fill display-6 text-muted"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0">Rp. <span class="counter-value" data-target="<?= $total_donasi->total_donasi ?>">0</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->

                            </div><!-- end row -->
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Total Keberangkatan</h4>
                            <!-- <div>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    ALL
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    1M
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    6M
                                </button>
                                <button type="button" class="btn btn-soft-primary btn-sm">
                                    1Y
                                </button>
                            </div> -->
                        </div><!-- end card header -->
                        <div class="card-header p-0 border-0 bg-soft-light">
                            <div class="row g-0 text-center">
                                <div class="col-12 col-sm-12">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span class="counter-value" data-target="<?= $jemaah_sudah_berangkat->jemaah_sudah_berangkat ?>">0</span> Jemaah
                                            <!-- <span class="text-success ms-1 fs-12">49%<i class="ri-arrow-right-up-line ms-1 align-middle"></i></span> -->
                                        </h5>
                                        <p class="text-muted mb-0">Sudah Berangkat</p>
                                    </div>
                                </div>

                                <!--end col-->
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body p-0 pb-2">
                            <div>
                                <div id="jemaah_berangkat_chart" data-colors='["--vz-success", "--vz-gray-300"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->


                </div><!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Kuota Umrah</h4>

                        </div><!-- end card header -->
                        <div class="card-header p-0 border-0 bg-soft-light">
                            <div class="row g-0 text-center">
                                <div class="col-6 col-sm-6">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span class="counter-value" data-target="<?= $jumlah_kuota->jumlah_kuota ?>">0</span>
                                        </h5>
                                        <p class="text-muted mb-0">Total Kuota</p>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-6 col-sm-6">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span class="counter-value" data-target="<?= $sisa_kuota->sisa_kuota ?>">0</span>
                                        </h5>
                                        <p class="text-muted mb-0">Sisa Kuota</p>
                                    </div>
                                </div>
                                <!--end col-->

                            </div>
                        </div><!-- end card header -->
                        <div class="card-body p-0 pb-2">
                            <div>
                                <div id="total_kuota_chart" data-colors='["--vz-success", "--vz-gray-300"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->

                </div><!-- end col -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-xl-12">

                    <div class="d-flex flex-column h-100">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Perlengkapan Belum Dikirim</p>
                                                <h2 class="mt-2 ff-secondary fw-semibold"><span class="counter-value" data-target="<?= $kelengkapan_belum_kirim->kelengkapan_belum_kirim ?>">0</span> Jemaah</h2>
                                                <!-- <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 16.24 % </span> vs. previous month</p> -->
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                        <i data-feather="check-circle" class="text-info"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Perlengkapan Sudah Dikirim</p>
                                                <h2 class="mt-2 ff-secondary fw-semibold"><span class="counter-value" data-target="<?= $kelengkapan_sudah_kirim->kelengkapan_sudah_kirim ?>">0</span> Jemaah</h2>
                                                <!-- <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i class="ri-arrow-down-line align-middle"></i> 3.96 % </span> vs. previous month</p> -->
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-danger rounded-circle fs-2">
                                                        <i data-feather="check-circle" class="text-danger"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <div class="col-md-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Manifestasi Belum Dikirim</p>
                                                <h2 class="mt-2 ff-secondary fw-semibold"><span class="counter-value" data-target="<?= $manifestasi_belum_kirim->manifestasi_belum_kirim ?>">0</span> Jemaah
                                                </h2>
                                                <!-- <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i class="ri-arrow-down-line align-middle"></i> 0.24 % </span> vs. previous month</p> -->
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                        <i data-feather="clipboard" class="text-info"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Manifestasi Sudah Dikirim</p>
                                                <h2 class="mt-2 ff-secondary fw-semibold"><span class="counter-value" data-target="<?= $manifestasi_sudah_kirim->manifestasi_sudah_kirim ?>">0</span> Jemaah</h2>
                                                <!-- <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 7.05 % </span> vs. previous month</p> -->
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-danger rounded-circle fs-2">
                                                        <i data-feather="clipboard" class="text-danger"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div> <!-- end row-->

                        <div class="row">

                        </div> <!-- end row-->

                    </div>

                </div><!-- end col -->

            </div>


        </div>
        <!-- container-fluid -->
    </div>
</div>
<!-- End Page-content -->

<!-- apexcharts -->
<script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="<?= base_url() ?>assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="<?= base_url() ?>assets/libs/jsvectormap/maps/world-merc.js"></script>


<!-- Dashboard init -->
<!-- <script src="<?= base_url() ?>assets/js/pages/dashboard-analytics.init.js"></script> -->

<script>
    function getChartColorsArray(e) {
        if (null !== document.getElementById(e)) {
            var t = document.getElementById(e).getAttribute("data-colors");
            if (t) return (t = JSON.parse(t)).map(function(e) {
                var t = e.replace(" ", "");
                if (-1 === t.indexOf(",")) {
                    var o = getComputedStyle(document.documentElement).getPropertyValue(t);
                    return o || t
                }
                e = e.split(",");
                return 2 != e.length ? t : "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(e[0]) + "," + e[1] + ")"
            });
            console.warn("data-colors atributes not found on", e)
        }
    }

    var barchartCountriesColors = getChartColorsArray("countries_charts");

    function generateData(e, t) {
        for (var o = 0, a = []; o < e;) {
            var r = (o + 1).toString() + "h",
                s = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min;
            a.push({
                x: r,
                y: s
            }), o++
        }
        return a
    }

    barchartCountriesColors && (options = {
        series: [{
            data: [1010, 1640, 490, 1255, 1050, 689, 800, 420, 1085, 589],
            name: "Sessions"
        }],
        chart: {
            type: "bar",
            height: 436,
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: !0,
                distributed: !0,
                dataLabels: {
                    position: "top"
                }
            }
        },
        colors: barchartCountriesColors,
        dataLabels: {
            enabled: !0,
            offsetX: 32,
            style: {
                fontSize: "12px",
                fontWeight: 400,
                colors: ["#adb5bd"]
            }
        },
        legend: {
            show: !1
        },
        grid: {
            show: !1
        },
        xaxis: {
            categories: ["India", "United States", "China", "Indonesia", "Russia", "Bangladesh", "Canada", "Brazil", "Vietnam", "UK"]
        }
    }, (chart = new ApexCharts(document.querySelector("#audiences-sessions-country-charts"), options)).render());
    var columnoptions, chartAudienceColumnChartsColors = getChartColorsArray("jemaah_berangkat_chart");
    chartAudienceColumnChartsColors && (columnoptions = {
        series: [{
            name: "Jemaah",
            data: [<?= $jemaah_januari->jemaah_januari ?>, <?= $jemaah_februari->jemaah_februari ?>, <?= $jemaah_maret->jemaah_maret ?>, <?= $jemaah_april->jemaah_april ?>, <?= $jemaah_mei->jemaah_mei ?>, <?= $jemaah_juni->jemaah_juni ?>, <?= $jemaah_juli->jemaah_juli ?>, <?= $jemaah_agustus->jemaah_agustus ?>, <?= $jemaah_september->jemaah_september ?>, <?= $jemaah_oktober->jemaah_oktober ?>, <?= $jemaah_november->jemaah_november ?>, <?= $jemaah_desember->jemaah_desember ?>]
        }],
        chart: {
            type: "bar",
            height: 309,
            stacked: !0,
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "20%",
                borderRadius: 6
            }
        },
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: !0,
            position: "bottom",
            horizontalAlign: "center",
            fontWeight: 400,
            fontSize: "8px",
            offsetX: 0,
            offsetY: 0,
            markers: {
                width: 9,
                height: 9,
                radius: 4
            }
        },
        stroke: {
            show: !0,
            width: 2,
            colors: ["transparent"]
        },
        grid: {
            show: !1
        },
        colors: chartAudienceColumnChartsColors,
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            axisTicks: {
                show: !1
            },
            axisBorder: {
                show: !0,
                strokeDashArray: 1,
                height: 1,
                width: "100%",
                offsetX: 0,
                offsetY: 0
            }
        },
        yaxis: {
            show: !1
        },
        fill: {
            opacity: 1
        }
    }, (chart = new ApexCharts(document.querySelector("#jemaah_berangkat_chart"), columnoptions)).render());
    var options, chart, dountchartUserDeviceColors = getChartColorsArray("user_device_pie_charts");
    dountchartUserDeviceColors && (options = {
        series: [78.56, 105.02, 42.89],
        labels: ["Desktop", "Mobile", "Tablet"],
        chart: {
            type: "donut",
            height: 219
        },
        plotOptions: {
            pie: {
                size: 100,
                donut: {
                    size: "76%"
                }
            }
        },
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: !1,
            position: "bottom",
            horizontalAlign: "center",
            offsetX: 0,
            offsetY: 0,
            markers: {
                width: 20,
                height: 6,
                radius: 2
            },
            itemMargin: {
                horizontal: 12,
                vertical: 0
            }
        },
        stroke: {
            width: 0
        },
        yaxis: {
            labels: {
                formatter: function(e) {
                    return e + "k Users"
                }
            },
            tickAmount: 4,
            min: 0
        },
        colors: dountchartUserDeviceColors
    }, (chart = new ApexCharts(document.querySelector("#audiences-sessions-country-charts"), options)).render());
    var columnoptions, chartAudienceColumnChartsColors = getChartColorsArray("total_kuota_chart");
    chartAudienceColumnChartsColors && (columnoptions = {
        series: [{
            name: "Total Kuota",
            data: [<?= $kuota_januari->kuota_januari ?>, <?= $kuota_februari->kuota_februari ?>, <?= $kuota_maret->kuota_maret ?>, <?= $kuota_april->kuota_april ?>, <?= $kuota_mei->kuota_mei ?>, <?= $kuota_juni->kuota_juni ?>, <?= $kuota_juli->kuota_juli ?>, <?= $kuota_agustus->kuota_agustus ?>, <?= $kuota_september->kuota_september ?>, <?= $kuota_oktober->kuota_oktober ?>, <?= $kuota_november->kuota_november ?>, <?= $kuota_desember->kuota_desember ?>]
        }, {
            name: "Sisa Kuota",
            data: [<?= $sisa_januari->sisa_januari ?>, <?= $sisa_februari->sisa_februari ?>, <?= $sisa_maret->sisa_maret ?>, <?= $sisa_april->sisa_april ?>, <?= $sisa_mei->sisa_mei ?>, <?= $sisa_juni->sisa_juni ?>, <?= $sisa_juli->sisa_juli ?>, <?= $sisa_agustus->sisa_agustus ?>, <?= $sisa_september->sisa_september ?>, <?= $sisa_oktober->sisa_oktober ?>, <?= $sisa_november->sisa_november ?>, <?= $sisa_desember->sisa_desember ?>]
        }],
        chart: {
            type: "bar",
            height: 309,
            stacked: !0,
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "20%",
                borderRadius: 6
            }
        },
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: !0,
            position: "bottom",
            horizontalAlign: "center",
            fontWeight: 400,
            fontSize: "8px",
            offsetX: 0,
            offsetY: 0,
            markers: {
                width: 9,
                height: 9,
                radius: 4
            }
        },
        stroke: {
            show: !0,
            width: 2,
            colors: ["transparent"]
        },
        grid: {
            show: !1
        },
        colors: chartAudienceColumnChartsColors,
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            axisTicks: {
                show: !1
            },
            axisBorder: {
                show: !0,
                strokeDashArray: 1,
                height: 1,
                width: "100%",
                offsetX: 0,
                offsetY: 0
            }
        },
        yaxis: {
            show: !1
        },
        fill: {
            opacity: 1
        }
    }, (chart = new ApexCharts(document.querySelector("#total_kuota_chart"), columnoptions)).render());
    var options, chart, dountchartUserDeviceColors = getChartColorsArray("user_device_pie_charts");
    dountchartUserDeviceColors && (options = {
        series: [78.56, 105.02, 42.89],
        labels: ["Desktop", "Mobile", "Tablet"],
        chart: {
            type: "donut",
            height: 219
        },
        plotOptions: {
            pie: {
                size: 100,
                donut: {
                    size: "76%"
                }
            }
        },
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: !1,
            position: "bottom",
            horizontalAlign: "center",
            offsetX: 0,
            offsetY: 0,
            markers: {
                width: 20,
                height: 6,
                radius: 2
            },
            itemMargin: {
                horizontal: 12,
                vertical: 0
            }
        },
        stroke: {
            width: 0
        },
        yaxis: {
            labels: {
                formatter: function(e) {
                    return e + "k Users"
                }
            },
            tickAmount: 4,
            min: 0
        },
        colors: dountchartUserDeviceColors
    }, (chart = new ApexCharts(document.querySelector("#user_device_pie_charts"), options)).render());
</script>