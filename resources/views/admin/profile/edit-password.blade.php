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
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item pb-4"><a class="nav-link active" data-toggle="tab">Настройка
                                                проифиля</a></li>
                                    </ul>


                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal" method="POST"
                                              action="{{route('profile.password.update', $user->id)}}">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Новый
                                                    пароль</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputName"
                                                           name="password"
                                                           placeholder="Введите новый пароль">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Подтвердите
                                                    пароль</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputEmail"
                                                           name="confirm_password"
                                                           placeholder="Подвердите новый пароль">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> Я принимаю условия
                                                            <a href="#"> пользовательского соглашения</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Изменить пароль
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
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


