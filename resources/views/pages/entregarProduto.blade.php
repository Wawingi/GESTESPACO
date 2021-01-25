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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Registar Saída de Produto</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Saída de Produtos</h4>
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
                            <form id="ValidarFormSaida" method="post" action="{{ url('registarSaida') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Ordenado Por</label>
                                            <input type="text" class="form-control" id="ordenante" name="ordenante" placeholder="Informe o ordenante">
                                        </div>
                                    </div> 
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Destino</label>
                                            <?php $destinos = App\Model\Destino::all(); ?>
                                            <select name="recebedor" class="form-control">
                                                @foreach($destinos as $destino)
                                                    <option value='{{$destino->id}}'>{{$destino->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>  
                                </div>
                                
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name">Motorista</label>
                                            <input type="text" class="form-control"  name="motorista" placeholder="Informe o nome do motorista">
                                        </div>
                                    </div>  
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name">Marca da Viatura</label>
                                            <input type="text" class="form-control" id="viatura" name="viatura" placeholder="ex.: Canter">
                                        </div>
                                    </div>  
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name">Matricula</label>
                                            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="ex.:LD-xx-yy-BB">
                                        </div>
                                    </div>  
                                </div>
                                <fieldset>
                                    <div class="repeater-default">
                                        <div data-repeater-list="produto">
                                            <div data-repeater-item="">
                                                <div class="form-group row d-flex align-items-end">
                                                    
                                                    <div class="col-sm-8">
                                                        <label class="control-label">Produto</label>
                                                        <?php $produtos = App\Model\Produto::all(); ?>
                                                        <select name="produto[id_produto]" class="form-control">
                                                            @foreach($produtos as $produto)
                                                                <option value='{{$produto->id}}'>{{$produto->designacao}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-sm-2">
                                                        <label class="control-label">Quantidade</label>
                                                        <input required type="number" min="1" name="produto[quantidade]" class="form-control">
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <span data-repeater-delete="" class="float-right btn btn-danger btn-sm">
                                                            <span class="far fa-trash-alt mr-1"></span> Eliminar
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                        </div><!--end repet-list-->
                                        <div class="form-group mb-0 row">
                                            <div class="col-sm-12">
                                                <span data-repeater-create="" class="btn btn-secondary">
                                                    <span class="fas fa-plus"></span> Produto
                                                </span>
                                            </div>
                                        </div>                                       
                                    </div>                                          
                                </fieldset>
                                <hr>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-content-save mr-1"></i>Registar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIm do corpo -->
</div>
<script>
    // Validação do formulário do funcionário
    $("#ValidarFormSaida").validate({
		rules: {					
			ordenante: {
				required: true              
			},
            motorista: {
                required: true,
			},         
            viatura: {
                required: true  
			},         
            matricula: {
                required: true  
			},
            quantidade: {
                required: true
            }

		},
		messages: {					
			ordenante: {
				required: "Informe o Ordenante do(s) produto(s)"              
			},
            motorista: {
                required: "Informe o nome do motorista"
			},         
            viatura: {
                required: "Informe a marca da viatura"
			},         
            matricula: {
                required: "Informe a matricula da viatura"
			},
            quantidade: {
                required: "Informe a quantidade"
            }       
        },      
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `invalid-feedback` class to the error element
			error.addClass( "invalid-feedback" );
			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.next( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
		}
    });    
</script>
@stop