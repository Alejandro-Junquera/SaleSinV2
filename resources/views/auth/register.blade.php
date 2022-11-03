@extends('layouts.app')

@section('content')

<div class="">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-register card-white">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Register') }}</h4>
                </div>
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="card-body">
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{ __('Name') }}">
                        </div></br>
                        <div class="input-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <input type="text" name="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" value="{{ old('surname') }}" placeholder="{{ __('Surname') }}">
                        </div></br>
                        <div class="input-group{{ $errors->has('cicle') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <i class="fa fa-bookmark"></i>
                                </div>
                            </div>
                            <select class="form-control{{ $errors->has('cicle_id') ? ' is-invalid' : '' }}" name="cicle_id">
                                <option value="" selected disabled hidden>Cicles</option>
                                @foreach($cicles as $cicle)
                                <option value="{{$cicle->id}}">{{$cicle->name}}</option>
                                @endforeach
                            </select>
                        </div></br>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}" >
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ __('Email') }}">
                        </div></br>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <i class="fa fa-unlock"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="{{ __('Password') }}">
                        </div></br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Register') }}</button>
                        @include('partials.errors')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
