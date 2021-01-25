@extends('layouts.inicio')
@section('content1')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Logística</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Listar Saídas</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Saídas de Produtos</h4>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTableSaidas" class="table table-borded mb-0">
                                <thead style="background:#c8d9e8">
                                    <tr>
                                        <th>#</th>
                                        <th>Referência</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($saidas as $saida)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$saida->referencia}}</td>
                                        <td>
                                            <a href='{{ url("verNotaEntrega") }}' class="float-right btn btn-sm btn-round btn-success"><i class="mdi mdi-eye mr-2"></i>Ver Nota de Entrega</a>
                                        </td>
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
    <!-- FIm do corpo -->
</div>
<script>
    $('#dataTableSaidas').DataTable({
        "pagingType": "full_numbers"
    });
</script>
@stop