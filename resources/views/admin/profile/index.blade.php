@extends('adminlte::page')
@section('title', 'AdminLTE')

@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

        @include('admin.profile.header')
        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    @include('admin.profile.left-elements')
                    <!-- /.col -->
                    @include('admin.profile.index-body')
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
@stop
<style>

    .bg-info {
        background-color: #404647 !important;
    }

    .content-header {
        padding: 8px .5rem !important;
    }


    @media (min-width: 992px) {
        .content-wrapper {
            margin-left: 120px !important;
        }
    }

    .info-box {
        min-height: 47px !important;
        box-shadow: none !important;
    }


</style>


