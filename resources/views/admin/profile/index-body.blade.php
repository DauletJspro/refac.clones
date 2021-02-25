<div class="col-md-9">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Подробная информация</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <div>

                        <div class="timeline-item">
                            <div class="row">
                                <div class="col-6">
                                    <strong>Ваш номер:</strong>
                                    <p class="text-muted">{{$user->id}}</p>
                                    <strong>Дата регистрации:</strong>
                                    <p class="text-muted">{{$user->created_at}}</p>
                                    <strong>Спонсор:</strong>
                                    <p class="text-muted"> Вип88</p>
                                    <strong>Instagram:</strong>
                                    <p class="text-muted">

                                        @if(empty($user->info->instagram))
                                            Пожалуйста заполните поля
                                        @else
                                            {{$user->info->instagram}}
                                        @endif

                                    </p>
                                    <strong>Электронная почта:</strong>
                                    <p class="text-muted"> {{$user->email}}</p>
                                    <strong>Телефон:</strong>
                                    <p class="text-muted">{{$user->phone}}</p>
                                    <strong>ИИН:</strong>
                                    <p class="text-muted"> {{$user->info->social_id}} </p>
                                    <strong>Номер карточки :</strong>
                                    <p class="text-muted">
                                        @if(empty($user->info->card_number))
                                            Пожалуйста заполните поля
                                        @else
                                            {{$user->info->card_number}}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-6">
                                    <strong>Название банка :</strong>
                                    <p class="text-muted">
                                        @if(empty($user->info->card_name))
                                            Пожалуйста заполните поля
                                        @else
                                            {{$user->info->card_name}}
                                        @endif
                                    </p>
                                    <strong>IBAN :</strong>
                                    <p class="text-muted">
                                        @if(empty($user->info->iban))
                                            Пожалуйста заполните поля
                                        @else
                                            {{$user->info->iban}}
                                        @endif
                                    </p>
                                    <strong>Страна :</strong>
                                    <p class="text-muted"> Казахстан</p>
                                    <strong>Город :</strong>
                                    <p class="text-muted">
                                        @if(empty($user->info->city->name_ru))
                                            Пожалуйста заполните поля
                                        @else
                                            {{$user->info->city->name_ru}}
                                        @endif
                                    </p>
                                    <strong>Адрес :</strong>
                                    <p class="text-muted">
                                        @if(empty($user->info->address))
                                            Пожалуйста заполните поля
                                        @else
                                            {{$user->info->address}}
                                        @endif
                                    </p>
                                    <strong>Удостоверение личности :</strong>
                                    <p class="text-muted">
                                        @if(empty($user->info->document_number))
                                            Пожалуйста заполните поля
                                        @else
                                            {{$user->info->document_number}}
                                        @endif
                                    </p>
                                    <strong> Пол :</strong>
                                    <p class="text-muted">
                                        @if(empty($user->info->is_male))
                                            Пожалуйста заполните поля
                                        @else
                                        @if($user->info->is_male == 1)
                                            Мужской
                                        @else
                                            Женский
                                        @endif
                                            @endif
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                            <form method="POST" action="{{route('profile.edit', $user->id)}}">
                                @method('GET')
                                @csrf
                                <div class="timeline-footer">
                                    <button class="btn btn-primary" type="submit">Изменить</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
