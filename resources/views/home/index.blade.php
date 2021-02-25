@extends('adminlte::page')

@section('title', 'Главная страница')

@section('content_header')
    <h1 class="m-0 text-dark">Главная страница (Информация)</h1>
@stop
@php($commonIndex = $data['commonIndex'])
@php($income = $data['income'])
@php($currentBalance = $data['currentBalance'])
@php($dollar = \App\Models\Currency::dollarToKzt)
@php($pvToKzt = \App\Models\Currency::pvToKzt)
@php($user = \App\User::find(\Illuminate\Support\Facades\Auth::user()->id))
@php($balance = $user->balance ?$user->balance->balance : 0)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header p-2">
                    <h4>Общие показатели</h4>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$commonIndex['userCount']}}</h3>
                                    <p>Кол-во клиентов <br> <br></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$commonIndex['userWithClassicCount']}}</h3>

                                    <p>Кол-во клиентов с пакетам <br>
                                        <span class="font-weight-bold">Classic</span>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$commonIndex['userWithPremiumCount']}}</h3>

                                    <p>Кол-во клиентов с пакетам <br>
                                        <span class="font-weight-bold">Premium</span>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$commonIndex['userWithVipCount']}}</h3>
                                    <p>Кол-во клиентов с пакетам
                                        <span class="font-weight-bold">VIP </span>
                                        <br>
                                        <br>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$commonIndex['packetCount']}}</h3>
                                    <p>Кол-во активных пакетов <br> <br></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-shopping-basket"></i>
                                </div>
                                <a href="#" class="small-box-footer">Подробная статистика <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$commonIndex['itemCount']}}</h3>
                                    <p>Кол-во активных продуктов <br> <br></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-box"></i>
                                </div>
                                <a href="#" class="small-box-footer">Подробная статистика<i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$commonIndex['packetActivationRequestCount']}}</h3>
                                    <p>Кол-во активных запросов <br>
                                        на пакет</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-send"></i>
                                </div>
                                <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$commonIndex['userWithGap']}}</h3>
                                    <p>Кол-во пользователей с пакетам
                                        <br> <span class="font-weight-bold">GAP</span>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header p-2">
                    <h4>Активный доход</h4>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-coins  "></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"> На сегодня</span>
                                    <span class="info-box-number">
                  {{$income['duringDay']}} <small>PV</small> <br>  {{$income['duringDay'] * $pvToKzt}}  <small>	&#8376;</small>
                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-coins  "></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"> На неделю</span>
                                    <span class="info-box-number">
                  {{$income['lastWeek']}} <small>PV</small> <br>  {{$income['lastWeek'] * $pvToKzt}}  <small>	&#8376;</small>
                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-coins  "></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">  На последний месяц</span>
                                    <span class="info-box-number">
                  {{$income['lastMonth']}} <small>PV</small> <br>   {{$income['lastMonth'] * $pvToKzt}}  <small>	&#8376;</small>
                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-coins  "></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">За весь период</span>
                                    <span class="info-box-number">
                   {{$income['allTime']}} <small>PV</small> <br>   {{$income['allTime'] * $pvToKzt}}  <small>	&#8376;</small>
                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header p-2">
                    <h4> Текущий счет</h4>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fa fa-money-bill-alt  "></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"> Текущий баланс</span>
                                    <span class="info-box-number">
                  {{$balance }} <small>PV</small> <br>   {{$balance*$pvToKzt}} <small>	&#8376;</small>
                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fa fa-arrow-circle-right "></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Снятая сумма</span>
                                    <span class="info-box-number">
                  {{$currentBalance['withdrawnAmount']}} <small>PV</small> <br>
                                        {{$currentBalance['withdrawnAmount'] * \App\Models\Currency::pvToKzt}}
                                        <small>	&#8376;</small>
                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-people-arrows "></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Общая сумма переводов</span>
                                    <span class="info-box-number">
                                        {{$currentBalance['transferAmount']}} <small>PV</small> <br>
                                        {{$currentBalance['transferAmount'] * \App\Models\Currency::pvToKzt}}
                                        <small>	&#8376;</small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">График активности пользователей</h3>
                        <a href="javascript:void(0);">Посмотреть таблицу</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg"></span>
                            <span>Общее кол-во активных пользователей</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="chart">
                        <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>


                    <div class="d-flex flex-row justify-content-end">
                        <button id="left_button_registered_count"
                                onclick="ajax(this)"
                                data-type="registered_count"
                                data-week_number="1"
                                class="mr-2 btn btn-success text-white">
                            <i class="fas fa-arrow-left"></i> &nbsp; Предыдущая неделя
                        </button>

                        <button id="right_button_registered_count"
                                onclick="ajax(this)"
                                data-type="registered_count"
                                data-week_number="-1"
                                class=" btn btn-success text-white">
                            Следующая неделя &nbsp;<i class="fas fa-arrow-right "></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Динамика покупки пакетов пользователями</h3>
                        <a href="javascript:void(0);">Посмотреть таблицу</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg"></span>
                            <span>Общее кол-во купленных пакетов</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="chart">
                        <canvas id="boughtPacketChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>


                    <div class="d-flex flex-row justify-content-end">
                        <button id="left_button_registered_count"
                                onclick="ajax(this)"
                                data-type="bought_packet_count"
                                data-week_number="1"
                                class="mr-2 btn btn-success text-white">
                            <i class="fas fa-arrow-left"></i> &nbsp; Предыдущая неделя
                        </button>

                        <button id="right_button_registered_count"
                                onclick="ajax(this)"
                                data-type="bought_packet_count"
                                data-week_number="-1"
                                class=" btn btn-success text-white">
                            Следующая неделя &nbsp;<i class="fas fa-arrow-right "></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<style>
    h4 {
        font-family: Arial;
    }
</style>
@section('plugins.Chartjs', true)
@section('js')
    <script>
        {{--var date_range = <?php echo json_encode(sprintf('%s - %s', $weekDays[0], $weekDays[6])) ?>;--}}
        {{--var week_days = <?php echo json_encode($weekDays); ?>;--}}
        {{--var registered_count = <?php echo json_encode($registered_count); ?>;--}}



        ajax(null, 'registered_count');
        ajax(null, 'bought_packet_count');

        function ajax(item, init_type = null) {
            if (item) {
                var type = $(item).data('type');
                var week_number = $(item).data('week_number');
            } else {
                var type = init_type;
                var week_number = 0;
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'POST',
                url: '/admin/home/ajax',
                data: {type: type, week_number: week_number},
                success: function (data) {
                    implement_chart(data)
                }
            });

        }

        function implement_chart(data) {

            if (data.type == 'registered_count') {
                var barChartCanvas = $('#barChart').get(0).getContext('2d')
                label = 'Динамика регистраций пользователей';
            } else if (data.type == 'bought_packet_count') {
                var barChartCanvas = $('#boughtPacketChart').get(0).getContext('2d')
                label = 'Динамика покупки пакетов пользователями';
            }
            var areaChartData = {
                labels: data.weekDays,
                datasets: [
                    {
                        label: label,
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: data.registered_count
                    },
                ]
            }

            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            barChartData.datasets[0] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 1
                        }
                    }]
                },
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            $('#left_button_registered_count').data('week_number', data.week_number - 1);
            $('#right_button_registered_count').data('week_number', data.week_number + 1);

        }


    </script>
@endsection
