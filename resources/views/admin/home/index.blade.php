@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between">
                            <h5>Doanh thu</h5>
                        </div>
                        <h3><span class="counter" style="visibility: visible;">{{ number_format($totalRevenue) }} VND</span>
                        </h3>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <p class="mb-0">Tổng doanh thu</p>
                            <span class="text-primary">85%</span>
                        </div>
                        <div class="iq-progress-bar bg-primary-light mt-2">
                            <span class="bg-primary iq-progress progress-1" data-percent="85"
                                style="transition: width 2s ease 0s; width: 85%;"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between">
                            <h5>Tổng người dùng</h5>
                        </div>
                        <h3><span class="counter" style="visibility: visible;">{{ number_format($totalUser) }}</span></h3>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <p class="mb-0">Tổng người dùng</p>
                            <span class="text-warning">35%</span>
                        </div>
                        <div class="iq-progress-bar bg-warning-light mt-2">
                            <span class="bg-warning iq-progress progress-1" data-percent="35"
                                style="transition: width 2s ease 0s; width: 35%;"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between">
                            <h5>Tổng đơn hàng</h5>
                        </div>
                        <h3><span class="counter" style="visibility: visible;">{{ number_format($totalOrder) }}</span></h3>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <p class="mb-0">Tổng đơn hàng</p>
                            <span class="text-success">85%</span>
                        </div>
                        <div class="iq-progress-bar bg-success-light mt-2">
                            <span class="bg-success iq-progress progress-1" data-percent="85"
                                style="transition: width 2s ease 0s; width: 85%;"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Doanh thu theo ngày trong 1 tháng gần đây</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart-revenue-month"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        @php
            $dayStr = '';
            $totalStr = '';
            foreach($dataRevenueMonth as $item) {
                $dayStr .= $item->day .', ';
                $totalStr .= $item->total .', ';
            }
        @endphp
        document.addEventListener("DOMContentLoaded", () => {
            const VNDFormatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
            });
            if (jQuery("#chart-revenue-month").length) {
                options = {
                    chart: {
                        height: 500,
                        type: "line",
                        zoom: {
                            enabled: !1
                        }
                    },
                    colors: ["#4788ff"],
                    series: [{
                        name: "Doanh thu",
                        data: [{{ $totalStr }}]
                    }],
                    dataLabels: {
                        enabled: !1
                    },
                    stroke: {
                        curve: "straight"
                    },
                    title: {
                        text: "",
                        align: "left"
                    },
                    grid: {
                        row: {
                            colors: ["#f3f3f3", "transparent"],
                            opacity: .5
                        }
                    },
                    xaxis: {
                        categories: [{{ $dayStr }}],
                        labels: {
                            formatter: function (value) {
                                let month = (new Date()).getMonth() + 1;
                                let day = (new Date()).getDay();
                                if (month < 10) {
                                    month = '0' + month;
                                }
                                if (value < 10) {
                                    value = '0' + value;
                                }
                                if (value > day) {
                                    return `${value}/${month == 1 ? 12 : month - 1}`
                                }
                                return `${value}/${month}`
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return VNDFormatter.format(value);
                            }
                        },
                    }
                };
                if (typeof ApexCharts !== typeof undefined) {
                    (chart = new ApexCharts(document.querySelector("#chart-revenue-month"), options)).render()
                    const body = document.querySelector('body')
                    if (body.classList.contains('dark')) {
                        apexChartUpdate(chart, {
                            dark: true
                        })
                    }

                    document.addEventListener('ChangeColorMode', function(e) {
                        apexChartUpdate(chart, e.detail)
                    })
                }
            }
        });
    </script>
@endsection
