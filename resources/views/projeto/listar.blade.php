@extends('layouts.app')
@section('content')
   <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="conteiner">
                    <div class="row">
                        <div id="classificacao">Projetos</div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">
                                    <i class="fa fa-home fa-lg"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('/projeto/listar')}}">Projeto</a>
                            </li>
                            <li class="active"><a href="{{route('/projeto/listar')}}">Listagem</a></li>
                        </ol>
                        <div class="conteudo">
                            <div class="widget" id="tabelas">
                                <div class="widget-titulo">
                                    <h4>
                                        <i class="fa fa-table"></i> {{$action}} Projeto
                                    </h4>
                                </div>
                                <div class="widget-conteudo">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div>
                                        <a href="{{route('/projeto/form')}}">Novo projeto</a>
                                    </div>
                                    <table class="table table-striped table-condensed table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Projeto</th>
                                                <th>Data inicio</th>
                                                <th>Data final</th>
                                                <th>%</th>
                                                <th>Operações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($arrFindAll as $rowProjeto)
                                                <tr>
                                                    <td>{{$rowProjeto->projeto_id}}</td>
                                                    <td>{{$rowProjeto->projeto_nome}}</td>
                                                    <td>{{$rowProjeto->projeto_inicio}}</td>
                                                    <td>{{$rowProjeto->projeto_final}}</td>
                                                    <td>Percentual</td>
                                                    <td> <p> <a href="" class="text-decoration-none"> Editar ID {{$rowProjeto->projeto_id}}</a> </p> </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
@push('script')
    <script src="{{url('js/Projeto.js')}}"></script>
@endpush
