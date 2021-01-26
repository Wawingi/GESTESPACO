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
                    </ol>
                </div>
                <h4 class="page-title">Visitantes do Departamento</h4>
            </div>
        </div>
    </div>
    <br><br>
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
            @include('includes.modalMarcacao')

            @if(Auth::user()->tipo==0 || Auth::user()->tipo==1)
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-round btn-primary btn-rounded btn-lg waves-effect waves-light" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#exampleModalScrollable"><i class="mdi mdi-account-plus mr-1"></i>Marcar Entrada</button>
                </div>
            </div>
            @endif
            <br>
             
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTableMarcacoes" class="table table-sm table-borded mb-0">
                                <thead style="background:#c8d9e8">
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Genero</th>
                                        <th>Entrada</th>
                                        <th>Departamento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($marcacoes as $marcacao)
                                <tr class="tabelaClicked clickable-row" data-href='{{ url("verVisitante/{$marcacao->id_marcacao}") }}'>
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
                                    <td>{{ date('d-m-Y H:i:s',strtotime($marcacao->data_entrada)) }}</td>
                                    <td>{{$marcacao->departamento}}</td>
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
    function carregarDataTable(){
        $.ajax({
            url: "{{ url('listarMarcacaoVisitante') }}",
            success:function(data){
                $('#tabelaMarcacoes').html(data);
                $('#dataTableMarcacoes').DataTable({
                    "pagingType": "full_numbers"
                });
            },
            error: function(e)
			{
				alert("erro ao carregar dados");
			}
        })
    }
    carregarDataTable();
    jQuery().ready(function(){
        $(".clickable-row").click(function(){
            window.location = $(this).data("href");
        });
    });
</script>
@stop