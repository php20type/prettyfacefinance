@extends("layouts.admin")
@section("content")
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-3">
                <div class="card dash rounded-0">
                    <div class="card-header rounded-0 border-0"><i class="fa fa-dollar"></i>Total Orders</div>
                    <div class="card-body text-right">{{App\Order::where('status', 'ACCEPTED')->count()}}</div>
                </div>
            </div>
            <div class="col-3">
                <div class="card dash rounded-0">
                    <div class="card-header rounded-0 border-0"><i class="fa fa-dollar"></i>Total Order Revenue</div>
                    <div class="card-body text-right">£{{App\Order::where('status', 'ACCEPTED')->sum('total')}}</div>
                </div>
            </div>
            <div class="col-3">
                <div class="card dash rounded-0">
                    <div class="card-header rounded-0 border-0"><i class="fa fa-user"></i>Clinic Requests</div>
                    <div class="card-body text-right">{{App\Clinic::where('approved', 0)->count()}}</div>
                </div>
            </div>
            <div class="col-3">
                <div class="card dash rounded-0">
                    <div class="card-header rounded-0 border-0"><i class="fa fa-users"></i>Total Clinics</div>
                    <div class="card-body text-right">{{App\Clinic::count()}}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Orders over the Past Year
                    </div>
                    <div class="card-body">
                        <canvas id="orders-graph"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Clinic Registrations over the Past Year
                    </div>
                    <div class="card-body">
                        <canvas id="registrations-graph"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $orders = App\Order::where('status', '!=', 'Cart')
            ->get()
            ->groupBy(function ($val) {
                return Carbon\Carbon::parse($val->created_at)->format('m');
            });

        $orders = $orders->reverse();
        ?>
        <?php
        $registrations = App\Clinic::select('*')
            ->get()
            ->groupBy(function ($val) {
                return Carbon\Carbon::parse($val->created_at)->format('m');
            });

        $registrations = $registrations->reverse();
        ?>
        <script type="text/javascript">
            var orders = {
                'January': 0,
                'February': 0,
                'March': 0,
                'April': 0,
                'May': 0,
                'June': 0,
                'July': 0,
                'August': 0,
                'September': 0,
                'October': 0,
                'November': 0,
                'December': 0
            };

            <?php foreach ($orders as $month => $records): ?>
                <?php
                $dateObj = DateTime::createFromFormat('!m', $month);
                $monthName = $dateObj->format('F');
                ?>

                orders["<?php echo $monthName; ?>"] = <?php echo count($records); ?>

            <?php endforeach; ?>

            console.log(orders);

            var color = $(".sidebar").find("li.active").css("background-color");

            var myBarChart = new Chart(document.getElementById('orders-graph').getContext('2d'), {
                type: 'bar',
                data: {
                    labels:  Object.keys(orders).map(function (key) {
                        return key;
                    }),
                    datasets: [{
                        data:  Object.keys(orders).map(function (key) {
                            return orders[key];
                        }),
                        borderWidth: 0,
                        barPercentage: 0.4,
                        backgroundColor: color
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            barPercentage: 0.2,
                            gridLines: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.4,
                            display: true,
                            gridLines: {
                                display: false
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });
        </script>
        <script type="text/javascript">
            var records = {
                'January': 0,
                'February': 0,
                'March': 0,
                'April': 0,
                'May': 0,
                'June': 0,
                'July': 0,
                'August': 0,
                'September': 0,
                'October': 0,
                'November': 0,
                'December': 0
            };

            <?php foreach ($registrations as $month => $records): ?>
                <?php
                $dateObj = DateTime::createFromFormat('!m', $month);
                $monthName = $dateObj->format('F');
                ?>

                records["<?php echo $monthName; ?>"] = <?php echo count($records); ?>

                <?php endforeach; ?>

            var color = $(".sidebar").find("li.active").css("background-color");

            var myBarChart2 = new Chart(document.getElementById('registrations-graph').getContext('2d'), {
                type: 'line',
                data: {
                    labels: Object.keys(records).map(function (key) {
                        return key;
                    }),
                    datasets: [{
                        data: Object.keys(records).map(function (key) {
                            return records[key];
                        }),
                        borderWidth: 0,
                        barPercentage: 0.4,
                        backgroundColor: "transparent",
                        borderColor: color
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{

                            gridLines: {
                                display: false
                            }
                        }]
                    },
                    legend: {
                        display: false
                    }
                }
            });
        </script>
    </div>
@endsection