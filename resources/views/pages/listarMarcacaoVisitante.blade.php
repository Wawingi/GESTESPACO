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
                <h4 class="page-title">Visitantes de Hoje</h4>
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

            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-round btn-primary btn-rounded btn-lg waves-effect waves-light" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#exampleModalScrollable"><i class="mdi mdi-account-plus mr-1"></i>Marcar Entrada</button>
                </div>
            </div>
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
                                        <th>Saída</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tabelaMarcacoes">
                                   
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
</script>
@stop