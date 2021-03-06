@extends('base_layouts.master')

@section('content')
    <section class="content-header">
        <div class="col-md-9">
            <h1>Album</h1>
        </div>
        <div class="col-md-3">
            <a href="{{ url()->current() }}/create">
                <button class="btn btn-block btn-success"><i class="fa fa-plus"></i> New Album</button>
            </a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <form action="{{ url()->current() }}">

                            <div class="form-group col-md-3 col-sm-6">
                                <label>Album</label>
                                    <input type="text" class="form-control" name="album_name" value="{{ empty($params['album_name']) ? '' : $params['album_name'] }}" />
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <br>
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </form>
                    </div>

                    <div class="box-body">
                        <div class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" >
                                        <thead>
                                            <tr role="row">
                                                <th>Album</th>
                                                <th class="hidden-xs">Year</th>
                                                <th width="50px"></th>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $item)
                                            <tr>
                                                <td>{{ $item->album_name }}</td>
                                                <td class="hidden-xs">{{ $item->year }}</td> 
                                                <td>
                                                    <a href="{{ url()->current() }}/{{ $item['id'] }}/edit">
                                                        <button class="btn btn-small btn-default"><i class="fa fa-edit"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <div class="dataTables_info" role="status" aria-live="polite">{{$data->total()}} records</div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    {{$data->links()}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection