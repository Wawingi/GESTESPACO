@extends('layouts.inicio')
@section('content1')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Visitantes</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Listar Visitantes</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Ver Visitante</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Ver Visitante</h4>
            </div>
        </div>
    </div>
    <!-- Inicio do corpo -->
    <!-- validação de retornos -->
    @if(session('sucesso'))
    <div style="height:40px;background:#bdf7c9" class="alert icon-custom-alert  alert-outline-success b-round fade show" role="alert">                                            
        <div style="color:#000" class="alert-text">
            {{ session('sucesso')}}
        </div>        
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="mdi mdi-close text-danger"></i></span>
            </button>
        </div>
    </div> 
    @endif
    @if(session('error')) 
    <div style="height:40px;background:#ff8e8e" class="alert icon-custom-alert  alert-outline-danger b-round fade show" role="alert">                                            
        <div style="color:#000" class="alert-text">
            {{ session('error')}}
        </div>        
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="mdi mdi-close text-danger"></i></span>
            </button>
        </div>
    </div>  
    @endif
    <!-- fim da validação de retornos -->

    <div class="row">
        <div class="col-12">
            <!-- Includes -->
            @include('includes.modalAtendimento')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><i class="mdi mdi-account-outline mdi-18px mr-1"></i>DADOS PESSOAIS</h4><hr class="linha">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control form-control-sm inputShow" value="{{$marcacao->nome}}" id="nome" name="nome">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name">Genero</label>
                                        <input type="text" class="form-control inputShow" value="{{$marcacao->genero}}" id="genero" name="genero">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name">Telefone</label>
                                        <input type="text" class="form-control inputShow" value="{{$marcacao->telefone}}" id="telefone" name="telefone">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name">E-mail</label>
                                        <input type="text" class="form-control inputShow" value="{{$marcacao->email}}" id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name">Nº DOcumento</label>
                                        <input type="text" class="form-control inputShow" value="{{$marcacao->numero_documento}}" id="numero_documento" name="numero_documento">
                                    </div>
                                </div>
                            </div>
                           
                            <hr class="linha"><h4 class="header-title"><i class="mdi mdi mdi-clipboard-text mdi-18x mr-1"></i>DADOS DA MARCAÇÃO</h4><hr class="linha">                          
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Data e Hora de Entrada</label>
                                        <input type="text" class="form-control inputShow" value="{{ date('d-m-Y H:i:s',strtotime($marcacao->data_entrada)) }}" id="data_entrada" name="data_entrada">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Data e Hora de Saída</label>
                                        <input type="text" class="form-control inputShow" value="@if($marcacao->data_saida==null)  @else {{ date('d-m-Y H:i:s',strtotime($marcacao->data_saida)) }} @endif" id="data_saida" name="data_saida">
                                    </div>
                                </div>
                            </div>                            
                            <hr class="linha">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="header-title"><i class="mdi mdi-account-check-outline mdi-18px mr-1"></i>DADOS DO ATENDIMENTO</h4>
                                </div>
                                @if($marcacao->id_atendimento==null)
                                <div class="col-6">
                                    <button type="button" class="float-right btn btn-round btn-primary btn-sm" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#exampleModalScrollable"><i class="mdi mdi-clipboard-account-outline mdi-18px mr-1"></i>Atender o Visitante</button>
                                </div>
                                @endif
                            </div>
                            <hr class="linha">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="name">Departamento</label>
                                        <input type="text" class="form-control inputShow" value="{{$marcacao->departamento}}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name">Estado</label>
                                        <input type="text" class="form-control inputShow" value="{{$marcacao->estado}}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name">Data e Hora de Atendimento</label>
                                        <input type="text" class="form-control inputShow" value="@if($marcacao->created_at==null)  @else {{ date('d-m-Y H:i:s',strtotime($marcacao->created_at)) }} @endif">
                                    </div>
                                </div>
                            </div>   
                            <div class="row"> 
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Assunto</label>
                                        <textarea cols="20" rows="6" class="form-control inputShow">{{$marcacao->assunto}}</textarea>
                                    </div>
                                </div>                       
                            </div>                        
                    </div> 
                </div> 
        </div>
    </div>
    <!-- FIm do corpo -->
</div>

@stop