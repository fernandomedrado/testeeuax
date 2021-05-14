@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="conteiner">
                    <div class="row">
                        <div id="classificacao">Projeto</div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">
                                    <i class="fa fa-home fa-lg"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">Projeto</a>
                            </li>
                            <li class="active">{{$action}}</li>
                        </ol>
                        <div class="conteudo">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="widget">
                                        <div class="widget-titulo">
                                            <h4><i class="fa fa-edit"></i> {{$action}} Projeto</h4>
                                        </div>
                                        <div class="widget-conteudo">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form class="form-horizontal form-skin" action="{{route('/projeto/atualizar')}}" method="POST">
                                                <input type="hidden" id="projeto_id" name="projeto_id" value=''>
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label for="projeto_nome" class="control-label col-lg-2">Projeto</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" placeholder="Projeto" id="projeto_nome" name="projeto_nome" value=''>
                                                        @error('projeto_nome')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="projeto_inicio" class="control-label col-lg-2">Data inicio</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" placeholder="Data inicio" id="projeto_inicio" name="projeto_inicio" value=''>
                                                        @error('projeto_inicio')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="projeto_final" class="control-label col-lg-2">Data final</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" placeholder="Data final" id="projeto_final" name="projeto_final" value=''>
                                                        @error('projeto_final')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Enviar </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@stop
