@extends('layouts.inicio')
@section('content1')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Funcionários</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Listar Funcionários</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Funcionários</h4>
            </div>
        </div>
    </div><br>
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
    <!-- Inicio do corpo -->
    <div class="row">
         <!-- Includes -->
         @include('includes.modalFuncionario')

        <div class="col-lg-12">
            <button type="button" class="btn btn-round btn-primary btn-rounded btn-sm waves-effect waves-light" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#exampleModalScrollable"><i class="mdi mdi-plus-circle mr-1"></i>Registar Funcionário</button>
        </div>
        <br><br><br>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="dataTableFuncionario" class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Genero</th>
                            <th>Departamento</th>
                            <th>Perfil</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($funcionarios as $funcionario)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/users/user.jpg') }}" alt="" class="rounded-circle thumb-sm mr-1">
                                </td>
                                <td>{{$funcionario->nome}}</td>
                                <td>
                                    @if($funcionario->genero==1) 
                                        MASCULINO
                                    @else
                                        FEMININO 
                                    @endif
                                </td>
                                <td>{{$funcionario->departamento}}</td>
                                <td>
                                    @if($funcionario->tipo==0) 
                                        Administrador
                                    @elseif($funcionario->tipo==1)
                                        Portaria
                                    @elseif($funcionario->tipo==2)
                                        Secretaria Geral
                                    @elseif($funcionario->tipo==3)
                                        Secretaria Departamental
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- FIm do corpo -->
</div>
<script>
    $(document).ready( function () {
        $('#dataTableFuncionario').DataTable({
            "pagingType": "full_numbers"
        });
    } );
</script>
@stop