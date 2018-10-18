@extends('base_layouts.master')

@section('content')
    <section class="content-header">
        <h1>Users [ @{{ form.data.id == undefined ? 'Novo' : form.originalData.user }} ]</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="hidden">
                        @{{ form.setData(<?= $data ?>) }}
                        @{{ setPermissoes(<?= $permissoes ?>) }}
                    </div>

                    <div class="box-body">

                        <form method="POST" @submit.prevent="submit_form">
                            {{csrf_field()}}

                            <input type="hidden" name="id" value="" v-model="form.data.id">

                            <div class="col-md-12">

                                <div class="form-group col-md-4">
                                    <label>User</label>
                                    <input type="text" class="form-control" v-model="form.data.user" maxlength="20" required autofocus/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Password <small v-show="form.data.id != undefined">(leave blank to maintain the same)</small></label>
                                    <input type="password" class="form-control" v-model="form.data.password" maxlength="20" :required="form.data.id == undefined"/>
                                </div>

                                <fieldset class="col-md-12"><legend>Permissions</legend>

                                    <div class="row">
                                        <div class="col-md-4" v-for="item in permissoes">
                                            <label><input type="checkbox" name="permissoes[]" value="item.id"
                                                          :checked="form.data.permissoes.indexOf(item.id) != -1"
                                                          @change="onSelectPermissao(item.id)"> @{{ item.nome }} </label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="form-group col-md-12">
                                    <hr>
                                    <label><input type="checkbox" class="form-check-input" v-model="form.data.ativo" value="1"> Active</label>
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