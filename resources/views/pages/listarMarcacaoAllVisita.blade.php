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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Histórico de Visitas</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Listagem de Visitas Geral</h4>
            </div>
        </div>
    </div>
    <br>
    <!-- Inicio do corpo -->
    <div class="row">
        <div class="col-12">           
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="tabelaHistoricoMarcacoes" class="table table-sm table-borded mb-0">
                                <thead style="background:#c8d9e8">
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Genero</th>
                                        <th>Entrada</th>
                                        <th>Saída</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($marcacoes as $marcacao)
                                @if(Auth::user()->tipo==1)
                                    <tr class="tabelaClicked">
                                @else
                                    <tr class="tabelaClicked clickable-row" data-href='{{ url("verVisitante/{$marcacao->id_marcacao}") }}'>
                                @endif        
                                        <td>
                                            <img src="{{ asset('images/visitor.jpg') }}" alt="" class="rounded-circle thumb-sm mr-1">
                                        </td>
                                        <td>{{$marcacao->nome}}</td>
                                        <td>
                                            @if($marcacao->genero==1)
                                                MASCULINO 
                                            @else 
                                                FEMININO
                                            @endif
                                        </td>
                                        <td>{{ date('d/m/Y H:m:s',strtotime($marcacao->data_entrada)) }}</td>
                                        <td>
                                            @if($marcacao->data_saida==null)
                                                <span class="badge badge-soft-success">Visitante Presente</span>
                                            @else
                                            <span class="badge badge-soft-danger">{{ date('d-m-Y H:m:s',strtotime($marcacao->data_saida)) }}</span>
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
        </div>
    </div>
    <!-- FIm do corpo -->
</div>
<script>
    $(document).ready( function () {
        $('#tabelaHistoricoMarcacoes').DataTable();
    } );

    jQuery().ready(function(){
        $(".clickable-row").click(function(){
            window.location = $(this).data("href");
        });
    });
</script>
@stop