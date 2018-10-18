@extends('base_layouts.master')

@section('content')
    <section class="content-header">
        <h1>Artist [ @{{ form.data.id == undefined ? 'Novo' : form.data.artist_name }} ]</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="hidden">
                        @{{ form.setData(<?= $data ?>) }}
                    </div>

                    <div class="box-body">

                        <form method="POST" @submit.prevent="submit_form">
                            {{csrf_field()}}

                            <input type="hidden" name="id" value="" v-model="form.data.id">

                            <div class="col-md-12">

                                <div class="form-group col-md-6">
                                    <label>Artist</label>
                                    <input type="text" class="form-control" v-model="form.data.artist_name" maxlength="100" required autofocus/>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Twitter Handle</label>
                                    <input type="text" class="form-control" v-model="form.data.twitter_handle" maxlength="100" required/>
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