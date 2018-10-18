@extends('base_layouts.master')

@section('content')
    <section class="content-header">
        <h1>Change Password - {{auth()->user()->user}} </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">

                        <form method="POST" @submit.prevent="submit_form">
                            {{csrf_field()}}

                            <div class="col-md-12">

                                <div class="form-group col-md-4">
                                    <label>Current password</label>
                                    <input type="password"  v-model="form.data.password" class="form-control"  maxlength="50" required/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>New password</label>
                                    <input type="password" v-model="form.data.new_password" class="form-control"  maxlength="50" required/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Confirm password</label>
                                    <input type="password" v-model="form.data.confirm_password" class="form-control" maxlength="50" required/>
                                </div>

                                <div class="clearfix">
                                    <div class="form-group col-md-6">
                                        <button type="button" class="btn btn-default btn-block" onclick="history.back(-1)">Cancel</button>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection