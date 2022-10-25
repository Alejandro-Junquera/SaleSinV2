@extends('layouts.app')

@section('content')
<div class="">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-register card-white">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Registrarse') }}</h4>
                </div>
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="card-body">
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}">
                        </div></br>
                        <div class="input-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellido') }}">
                        </div></br>
                        <div class="input-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <select class="form-control{{ $errors->has('cicle_id') ? ' is-invalid' : '' }}" name="cicle_id">
                                <option value="" selected disabled hidden>Choose here</option>
                                <option value="1">1ºDAM</option>
                                <option value="2">2ºDAM</option>
                            </select>
                        </div></br>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                        </div></br>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}">
                        </div></br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirmar Contraseña') }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Registrarse') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
