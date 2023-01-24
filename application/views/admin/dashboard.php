                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800"><?php echo $title; ?></h1>
                    </div>
                    <!-- BARIS PERTAMA -->
                    <div class="row">
                        <!-- JUMLAH WAJIB PAJAK -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Wajib Pajak & Retribusi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $wp + $wr; ?></div>
                                            <small class="text-gray-500 font-weight-bold">Wajib Pajak : <?php echo $wp; ?></small> <br>
                                            <small class="text-gray-500 font-weight-bold mb-1">Wajib Retribusi : <?php echo $wr; ?></small>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-people-group fa-2xl text-gray-300"></i>
                                            <!-- <i class="fas fa-users fa-2x text-gray-300"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- TARGET PAJAK -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Target Pajak & Retribusi Tahun <?php echo $this->session->userdata('tahun'); ?></div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        Rp <?php foreach ($skpd as $targetp) {
                                                                foreach ($skrd as $targetr) {
                                                                    echo number_format($targetp->total + $targetr->total, 2, ',', '.');
                                                                }
                                                            } ?>
                                                    </div>
                                                    <small class="text-gray-500 font-weight-bold">SKP-D (<?php foreach ($jskpd as $jtargetp) {
                                                                                                                echo $jtargetp->total;
                                                                                                            } ?>): Rp. <?php foreach ($skpd as $targetp) {
                                                                                                                                echo number_format($targetp->total, 2, ',', '.');
                                                                                                                            } ?></small> <br>
                                                    <small class="text-gray-500 font-weight-bold mb-1">SKR-D (<?php foreach ($jskrd as $jtargetr) {
                                                                                                                    echo $jtargetr->total;
                                                                                                                } ?>): Rp. <?php foreach ($skrd as $targetr) {
                                                                                                                                echo number_format($targetr->total, 2, ',', '.');
                                                                                                                            } ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- REALISASI PAJAK -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Realisasi Pajak & Retribisi s.d Hari Ini</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        Rp <?php foreach ($sspd as $targetp) {
                                                                foreach ($ssrd as $targetr) {
                                                                    echo number_format($targetp->total + $targetr->total, 2, ',', '.');
                                                                }
                                                            } ?>
                                                    </div>
                                                    <small class="text-gray-500 font-weight-bold">SSPD : Rp. <?php foreach ($sspd as $targetp) {
                                                                                                                    echo number_format($targetp->total, 2, ',', '.');
                                                                                                                } ?> (<?php foreach ($skpd as $targetp) {
                                                                                                                            foreach ($sspd as $targetr) {
                                                                                                                                if ($targetp->total == 0) {
                                                                                                                                    echo "0";
                                                                                                                                } else {
                                                                                                                                    echo number_format((($targetr->total / $targetp->total) * 100), 2, ',', '.');
                                                                                                                                }
                                                                                                                            }
                                                                                                                        } ?>%)</small> <br>
                                                    <small class="text-gray-500 font-weight-bold mb-1">SSRD : Rp. <?php foreach ($ssrd as $targetr) {
                                                                                                                        echo number_format($targetr->total, 2, ',', '.');
                                                                                                                    } ?> (<?php foreach ($skrd as $targetp) {
                                                                                                                                foreach ($ssrd as $targetr) {
                                                                                                                                    if ($targetp->total == 0) {
                                                                                                                                        echo "0";
                                                                                                                                    } else {
                                                                                                                                        echo number_format((($targetr->total / $targetp->total) * 100), 2, ',', '.');
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            } ?>%)</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                            <i class="fa-solid fa-rupiah-sign fa-2xl text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- REALISASI PENDAPATAN -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Penerimaan Lainnya</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php foreach ($sts as $targetp) {
                                                                                                        echo number_format($targetp->total, 2, ',', '.');
                                                                                                    } ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-money-bill-transfer fa-2xl text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Area Chart -->
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <!-- time line chart -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Overview Bulanan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                        <script>
                                            var ctx = document.getElementById("myAreaChart");
                                            var myLineChart = new Chart(ctx, {
                                                type: 'line',
                                                data: {
                                                    labels: nlabelnya,
                                                    datasets: [{
                                                        label: "Pendapatan",
                                                        lineTension: 0.3,
                                                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                                                        borderColor: "rgba(78, 115, 223, 1)",
                                                        pointRadius: 3,
                                                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                                        pointBorderColor: "rgba(78, 115, 223, 1)",
                                                        pointHoverRadius: 3,
                                                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                                        pointHitRadius: 10,
                                                        pointBorderWidth: 2,
                                                        data: ndatanya,
                                                    }],
                                                },
                                                options: {
                                                    maintainAspectRatio: false,
                                                    layout: {
                                                        padding: {
                                                            left: 10,
                                                            right: 25,
                                                            top: 25,
                                                            bottom: 0
                                                        }
                                                    },
                                                    scales: {
                                                        xAxes: [{
                                                            time: {
                                                                unit: 'date'
                                                            },
                                                            gridLines: {
                                                                display: false,
                                                                drawBorder: false
                                                            },
                                                            ticks: {
                                                                maxTicksLimit: 7
                                                            }
                                                        }],
                                                        yAxes: [{
                                                            ticks: {
                                                                maxTicksLimit: 5,
                                                                padding: 10,
                                                                // Include a dollar sign in the ticks
                                                                callback: function(value, index, values) {
                                                                    return 'Rp' + number_format(value);
                                                                }
                                                            },
                                                            gridLines: {
                                                                color: "rgb(234, 236, 244)",
                                                                zeroLineColor: "rgb(234, 236, 244)",
                                                                drawBorder: false,
                                                                borderDash: [2],
                                                                zeroLineBorderDash: [2]
                                                            }
                                                        }],
                                                    },
                                                    legend: {
                                                        display: false
                                                    },
                                                    tooltips: {
                                                        backgroundColor: "rgb(255,255,255)",
                                                        bodyFontColor: "#858796",
                                                        titleMarginBottom: 10,
                                                        titleFontColor: '#6e707e',
                                                        titleFontSize: 14,
                                                        borderColor: '#dddfeb',
                                                        borderWidth: 1,
                                                        xPadding: 15,
                                                        yPadding: 15,
                                                        displayColors: false,
                                                        intersect: false,
                                                        mode: 'index',
                                                        caretPadding: 10,
                                                        callbacks: {
                                                            label: function(tooltipItem, chart) {
                                                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                                                return datasetLabel + ': Rp' + number_format(tooltipItem.yLabel);
                                                            }
                                                        }
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end of Time line Chart -->
                        <div class="col-xl-4 col-lg-5 text-center">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between font-weight-bold text-primary">
                                    Penerimaan Per Obyek
                                </div>
                                <div class="card-body">
                                    <div id="donut-chart"></div>
                                    <script>
                                        var chart = bb.generate({
                                            data: {
                                                columns: [
                                                    ["Lainnya", nlainnya],
                                                    ["Retribusi", nretribusi],
                                                    ["Pajak", npajak],
                                                ],
                                                type: "donut",
                                                onclick: function(d, i) {
                                                    console.log("onclick", d, i);
                                                },
                                                onover: function(d, i) {
                                                    console.log("onover", d, i);
                                                },
                                                onout: function(d, i) {
                                                    console.log("onout", d, i);
                                                },
                                            },
                                            donut: {
                                                title: "",
                                            },
                                            bindto: "#donut-chart",
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of Area Chart -->
                </div>
                </div>