@extends('adminlte::page')
@section('title', 'AdminLTE')

@section('content')
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- =========================================================== -->
            <!-- Small Box (Stat card) -->
            <h3 class="mb-2 mt-4">Пакеты</h3>
            <div class="row">
                @foreach($packets as $packet)
                    <div class="col-lg-3 col-6">
                        <div class="d-flex justify-content-center">
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info"
                                     style="background-color: {{$packet->css_color}}!important;">
                                    <h3 class="widget-user-username">{{$packet->price*600}} тенге</h3>
                                    <h5 class="widget-user-desc">{{$packet->description_kz}}</h5>
                                </div>
                                <div class="widget-user-image">
                                    <img class="img-circle elevation-2" alt="User Avatar">
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">3,200</h5>
                                                <span class="description-text">SALES</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">13,000</h5>
                                                <span class="description-text">FOLLOWERS</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">35</h5>
                                                <span class="description-text">PRODUCTS</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>

                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <div class="d-flex justify-content-center">
                                        <button class="small-box-footer border-0" onclick="openModal({{$packet->id}})">
                                            Купить пакет <i class="fas fa-arrow-circle-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                        </div>
                    </div>
            @endforeach
            <!-- /.row -->
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Покупка пакета</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <button id="fromBalance" type="button" class="col-12 btn btn-success mt-3" data-packet_id=""
                                    onclick="ajax(this)"
                                    data-type="fromBalance">Снять с
                                баланса
                            </button>
                            <button id="request" type="button" class="col-12 btn btn-primary mt-3" data-packet_id=""
                                    onclick="ajax(this)"
                                    data-type="makeRequest">Отпарвить
                                зарос
                            </button>
                            <button id="online" type="button" class=" col-12 btn btn-warning mt-3" data-packet_id=""
                                    onclick="ajax(this)"
                                    data-type="online" id="make">
                                Онлайн покупка
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    </body>
    </html>

@endsection
@section('js')

    <script>
        function openModal(packetId) {
            $('#fromBalance').data('packet_id', packetId);
            $('#request').data('packet_id', packetId);
            $('#online').data('packet_id', packetId);
            $('#exampleModal').modal();
        }

        function ajax(object) {
            var type = $(object).data('type');
            var packet_id = $(object).data('packet_id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route('packet.ajax') }}',
                type: "POST",
                data: {type: type, packet_id: packet_id},
                success: function (data) {

                }
            });
        }
    </script>
@endsection;






