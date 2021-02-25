<div class="col-md-9">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item pb-4"><a class="nav-link active"  data-toggle="tab">Настройка проифиля</a></li>
            </ul>




            <div class="tab-pane" id="settings">
                <form class="form-horizontal" method="POST" action="{{route('profile.update', $user->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="name"
                                   value="{{$user->name}}"
                                   placeholder="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                   value="{{$user->email}}"
                                   placeholder="{{$user->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Фамилия</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" name="last_name"
                                   value="{{$user->info->last_name}}" placeholder="{{$user->info->last_name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Инстаграм</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" name="instagram"
                                   value="{{$user->info->instagram}}"
                                   placeholder="{{$user->info->instagram}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Удостоверение личности</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" name="document_number"
                                   value="{{$user->info->document_number}}"
                                   placeholder="{{$user->info->document_number}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">ИИН</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" name="iin"
                                   value="{{$user->iin}}" placeholder="{{$user->iin}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">IBAN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" name="iban"
                                   value="{{$user->info->iban}}" placeholder="{{$user->info->iban}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Номер карточки</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" name="card_number"
                                   value="{{$user->info->card_number}}"
                                   placeholder=" ---- ---- ---- ---- ">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Название банка</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" name="card_name"
                                   value="{{$user->info->card_name}}"
                                   placeholder="{{$user->info->card_name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Город</label>
                        <div class="col-sm-10">
                            {{Form::select('name_ru', $listOfCities, $user->info->city_id, [
                              'class'       => 'form-control',
                              'placeholder' => 'Выберите название города',
                              'name'        => 'city_id',
                              'value'       => $user->info->city_id ])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Адрес</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" name="address"
                                   value="{{$user->info->address}}"
                                   placeholder="{{$user->info->address}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Пол</label>
                        <div class="col-sm-10">
                            {{Form::select('name_ru', $listOfGender, $user->info->is_male, [
                               'class'       => 'form-control',
                               'placeholder' => 'Выберите пол',
                               'name'        => 'is_male',
                               'value'       => $user->info->is_male])}}
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
                            <button type="submit" class="btn btn-danger">Отправить</button>
                        </div>
                    </div>
                </form>
                <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                <form method="POST" action="{{route("profile.password.edit", $user->id )}}">
                    @method('GET')
                    @csrf
                    <button  type="submit" class="btn btn-primary">Изменить пароль</button>
                </form>
                </div>
                </div>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->
</div>
<script>
    import Chart
    export default {
        components: {Chart}
    }
</script>