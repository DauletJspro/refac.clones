@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php($is_active_array = [1 => 'Активный клиент', 2 => 'Неактивный клиент'])
@php($speakers = \App\User::getSpeakers()->pluck('username', 'id')->toArray())
@php($office_directors = \App\User::getOfficeDirectors()->pluck('username', 'id')->toArray())
@php($users = \App\User::all()->pluck('username', 'id')->toArray())
@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-6">
                {{-- Name field --}}
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           value="{{ old('name') }}" placeholder="{{ __('Имя') }}" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- Last name field --}}
                <div class="input-group mb-3">
                    <input type="text" name="last_name"
                           class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                           value="{{ old('last_name') }}" placeholder="{{ __('Фамилия') }}" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>
                    @if($errors->has('last_name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- Username field --}}
                <div class="input-group mb-3">
                    <input type="text" name="username"
                           class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                           value="{{ old('username') }}" placeholder="{{ __('Имя пользователя (Логин)') }}" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>
                    @if($errors->has('username'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('username') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- Social id  --}}
                <div class="input-group mb-3">
                    <input type="text" name="social_id"
                           class="form-control {{ $errors->has('social_id') ? 'is-invalid' : '' }}"
                           value="{{ old('social_id') }}" placeholder="{{ __('ИИН') }}" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-credit-card {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>
                    @if($errors->has('social_id'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('social_id') }}</strong>
                        </div>
                    @endif
                </div>
                {{-- is_active status  --}}
                <div class="input-group mb-3">
                    {{Form::select('is_active', $is_active_array, null, [
                        'class' => 'form-control select2',
                        'placeholder' => 'Выберите статус активности',
                        'style' => 'width:100%;',
                    ])}}
                    @if($errors->has('is_active'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('is_active') }}</strong></div>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <div class="input-group">
                        {{Form::select('sponsor_id', $users, null, [
                            'class' => 'form-control select2',
                            'placeholder' => 'Выберите спонсора (1 уровень)',
                            'style' => 'width:100%;',
                        ])}}
                        @if($errors->has('sponsor_id'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('sponsor_id') }}</strong></div>
                        @endif
                    </div>
                </div>

                <div class="input-group mb-3">
                    {{Form::select('inviter_id', $users, null, [
                        'class' => 'form-control select2',
                        'placeholder' => 'Выберите пригласителя',
                        'style' => 'width:100%;',
                    ])}}
                    @if($errors->has('inviter_id'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('inviter_id') }}</strong></div>
                    @endif
                </div>
            </div>
            <div class="col-6">

                {{-- Email field --}}
                <div class="input-group mb-3">
                    <input type="email" name="email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- Phone field --}}
                <div class="input-group mb-3">
                    <div class="input-group">
                        <input name="phone" type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                               data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{ old('phone') }}"
                               placeholder="{{ __('Номер телефона') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope {{ config('adminlte.classes_auth_phone', '') }}"></span>
                            </div>
                        </div>
                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong></div>
                        @endif
                    </div>
                </div>

                {{--   Спикер     --}}
                <div class="input-group mb-3">
                    <div class="input-group">
                        {{Form::select('speaker_id', $speakers, null, [
                            'class' => 'form-control select2',
                            'placeholder' => 'Выберите спикера',
                            'style' => 'width:100%;',
                        ])}}
                        @if($errors->has('speaker_id'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('speaker_id') }}</strong></div>
                        @endif
                    </div>
                </div>

                {{-- Выбрать директора офиса --}}
                <div class="input-group mb-3">
                    {{Form::select('office_director_id', $office_directors, null, [
                        'class' => 'form-control select2',
                        'placeholder' => 'Выберите директора офиса',
                        'style' => 'width:100%;',
                    ])}}
                    @if($errors->has('office_director_id'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('office_director_id') }}</strong></div>
                    @endif
                </div>

                {{-- Password field --}}
                <div class="input-group mb-3">
                    <input type="password" name="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="{{ __('adminlte::adminlte.password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- Confirm password field --}}
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation"
                           class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                           placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>
                    @if($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Register button --}}
        <button type="submit"
                class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
<style>
    .login-box, .register-box {
        width: 65% !important;
    }
</style>
@section('plugins.inputmask', true)
@section('plugins.Select2', true)
@section('js')
    <script>
        // $('[data-mask]').inputmask();
        $(function () {
            $('.select2').select2()
        });
    </script>
@endsection
