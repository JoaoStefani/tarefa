@extends('base_layouts.base')

@section('main')
    <div class="login-box">
        <div class="login-box-body">

            <p class="login-box-msg">{{ config('app.name') }}</p>
            <form @submit.prevent="submit_form(this)">

                {{csrf_field()}}

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="User" name="user" v-model="form.data.user" ref="user" autofocus required/>
                    <span class="fa fa-user form-control-feedback"></span>
                    <span class="help is-danger" v-if="form.errors.has('user')">@{{form.errors.get('user')}}</span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="senha" v-model="form.data.senha" required/>
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Log in</button>
                    </div><!-- /.col -->
                </div>
            </form>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@endsection