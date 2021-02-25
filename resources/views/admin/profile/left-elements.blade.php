<div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                @if($user->info->is_male == 1)
                    <a href="/admin/profile" style="color: #212529"> <i class="fas fa-male fa-10x"></i> </a>
                @else
                    <a href="/admin/profile" style="color: #212529"> <i class="fas fa-female fa-10x"></i> </a>
                @endif
            </div>

            <h3 class="profile-username text-center">{{$user->name }} {{$user->info->last_name }}</h3>


            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Баланс</b> <a class="float-right">10 $</a>
                </li>
                <li class="list-group-item">
                    <b>Аккаунт</b> <a class="float-right">
                        @if($user->is_active == true)
                            Активный
                        @else
                            Не активный
                        @endif
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Верификация</b>
                    @if($user->info->is_document_verified == true)
                        <a class="float-right">Пройдено</a>
                    @else
                        <a class="float-right">Не пройдено</a>
                    @endif
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- About Me Box -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Инфо</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <strong><i class="fas fa-shopping-bag"></i> Пакеты:</strong>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Classic</span>
                            <span class="info-box-number">20pv</span>
                        </div>
                        <div class="info-box-content">
                            <span class="info-box-text">Medium</span>
                            <span class="info-box-number">60pv</span>
                        </div>

                        <div class="info-box-content">
                            <span class="info-box-text">Large</span>
                            <span class="info-box-number">120pv</span>
                        </div>

                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <hr>

            <strong><i class="fas fa-address-card"></i> Статус</strong>

            <p class="text-muted">
                @if($user->satus_id = null)
                    Нет статуса
                @else
                    {{$user->userStatus->title}}
                @endif
            </p>

            <hr>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>