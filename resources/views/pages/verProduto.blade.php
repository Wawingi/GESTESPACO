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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Listar Produtso</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Ver Produto</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Ver Produto</h4>
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
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#dados" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <span class="d-inline-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-inline-block"><i class="fas fa-file-signature"></i> Dados do Produto</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#accao" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                        <span class="d-inline-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-inline-block"><i class="fas fa-cog"></i> Nota de Entrega</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                                     
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="dados">
							<div class="row">
							    <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                                <hr class="linha">
                                                <input type="hidden" id="produto_id" value="{{$produto->id}}">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label for="name">DESIGNAÇÃO</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <B>{{$produto->designacao}}</B>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label for="name">CATEGORIA</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <B>{{$produto->categoria}}</B>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label for="name">QUANTIDADE</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <B>{{$produto->quantidade}}</B>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label for="name">DATA DE ENTRADA</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <B>{{ date('d-m-Y',strtotime($produto->created_at))}}</B>
                                                    </div>
                                                </div>
                                        </div> 
                                    </div> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <h5 style="text-align:center;font-weight:bold">HISTÓRICO DE ENTREGAS</h5>
                                        <div class="card-body">                    
                                            <table id="dataTableProdutos" class="table table-sm table-borded mb-0">
                                                <thead style="background:#c8d9e8">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Responsável da Entrega</th>
                                                        <th>Recebedor</th>
                                                        <th>Quantidade</th>
                                                        <th>Data de Entrega</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabelaSaidas">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="accao">
                            <div class="row">
                                <div class="col-12">
                                    <iframe
                                        src='{{ url("/storage/anexos/{$produto->nota_entrega}") }}'
                                        type="applicatios/pdf"
                                        height="700px"
                                        width="100%">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="header-title"><i class="mdi mdi-account-outline mdi-18px mr-1"></i>DADOS DO PRODUTO</h4>
                                </div>
                                <div class="col-6">
                                    @if($produto->quantidade>0)
                                    <button type="button" class="float-right btn btn-round btn-warning btn-rounded btn-sm waves-effect waves-light" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#exampleModalScrollable"><i class="mdi mr-1"></i>Registar Saída de Produto</button>
                                    @endif
                                    
                                </div>
                            </div><hr class="linha">
                            <input type="hidden" id="produto_id" value="{{$produto->id}}">
                            <div class="row">
                                <div class="col-4">
                                    <label for="name">DESIGNAÇÃO</label>
                                </div>
                                <div class="col-8">
                                    <B>{{$produto->designacao}}</B>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="name">CATEGORIA</label>
                                </div>
                                <div class="col-8">
                                    <B>{{$produto->categoria}}</B>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="name">QUANTIDADE</label>
                                </div>
                                <div class="col-8">
                                    <B>{{$produto->quantidade}}</B>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="name">DATA DE ENTRADA</label>
                                </div>
                                <div class="col-8">
                                    <B>{{ date('d-m-Y',strtotime($produto->created_at))}}</B>
                                </div>
                            </div>
                    </div> 
                </div> 
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h5 style="text-align:center;font-weight:bold">HISTÓRICO DE ENTREGAS</h5>
                <div class="card-body">                    
                    <table id="dataTableProdutos" class="table table-sm table-borded mb-0">
                        <thead style="background:#c8d9e8">
                            <tr>
                                <th>#</th>
                                <th>Responsável da Entrega</th>
                                <th>Recebedor</th>
                                <th>Quantidade</th>
                                <th>Data de Entrega</th>
                            </tr>
                        </thead>
                        <tbody id="tabelaSaidas">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>-->

    <!-- FIm do corpo -->
</div>
<script>
    function carregarDataTable(){
        var id_produto = $('#produto_id').val();
        $.ajax({
            url: "{{ url('listarSaidasProduto') }}/"+id_produto,
            success:function(data){
                $('#tabelaSaidas').html(data);
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