@extends('base_layouts.master')

@section('content')
    <section class="content-header">
        <h1>Album [ @{{ form.data.id == undefined ? 'Novo' : form.data.album_name }} ]</h1>
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
                                    <label>Album</label>
                                    <input type="text" class="form-control" v-model="form.data.album_name" maxlength="100" required autofocus/>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Year</label>
                                    <input type="text" class="form-control" v-mask="'####'" v-model="form.data.year" maxlength="4" required/>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Artist</label>
                                    <select class="form-control" v-model="form.data.id_artist" placeholder="Selecione uma Artist" required>
                                        <option value="" disabled selected="selected">Selecione uma Artist</option>
                                        @foreach($artist as $item)
                                            <option value="{{ $item->id }}">{{ $item->artist_name }}</option>
                                        @endforeach
                                    </select>
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