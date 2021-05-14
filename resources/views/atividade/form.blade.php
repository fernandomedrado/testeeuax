@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="conteiner">
                    <div class="row">
                        <div id="classificacao">Atividade</div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">
                                    <i class="fa fa-home fa-lg"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">Atividade</a>
                            </li>
                            <li class="active">{{$action}}</li>
                        </ol>
                        <div class="conteudo">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="widget">
                                        <div class="widget-titulo">
                                            <h4><i class="fa fa-edit"></i> {{$action}} Atividade</h4>
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
                                            <form class="form-horizontal form-skin" action="{{route('/atividade/atualizar')}}" method="POST">
                                                <input type="hidden" id="atividade_id" name="atividade_id" value=''>
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label for="projeto_id" class="control-label col-lg-2">Projeto</label>
                                                    <div class="col-lg-10">
                                                        <select class="form-control" placeholder="Projeto" id="projeto_id" name="projeto_id">
                                                            <option>Selecione</option>
                                                            @foreach($arrComboProjeto as $intKey => $rowProjeto)
                                                                <option value="{{$intKey}}">{{$rowProjeto}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('projeto_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="atividade_nome" class="control-label col-lg-2">Atividade</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" placeholder="Atividade" id="atividade_nome" name="atividade_nome" value=''>
                                                        @error('atividade_nome')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="atividade_inicio" class="control-label col-lg-2">Data inicio</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" placeholder="Data inicio" id="atividade_inicio" name="atividade_inicio" value=''>
                                                        @error('atividade_inicio')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="atividade_final" class="control-label col-lg-2">Data final</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" placeholder="Data final" id="atividade_final" name="atividade_final" value=''>
                                                        @error('atividade_final')
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
