@extends('base_layouts.base')

@section('main')
    <div class="login-box">
        <div class="login-logo text-center">
            <img src="{{asset('images/logo.png')}}" alt="{{ config('app.name') }}" style="max-height: 120px">
        </div><!-- /.login-logo -->
        <div class="login-box-body">

            <h3>Page not found or you are not authorized to access.</h3>
            <br>

            <a onclick="history.back(-1)">
                <button type="button" class="btn btn-block btn-warning">COME BACK</button>
            </a>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@endsection