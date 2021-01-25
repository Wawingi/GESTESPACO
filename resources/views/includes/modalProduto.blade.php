<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div style="height:50px" id="cabeca-modall" class="modal-header">
                <h4 style="margin-top:1px" class="modal-title" id="exampleModalScrollableTitle"><i class="mdi mdi-store mr-1"></i>Registar Entrada do Produto</h4>
                <button id="modalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="background:#fff" class="modal-body">
                <form id="ValidarFormProduto" method="post" action="{{ url('registarProduto') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nota de Entrega</label>
                                <input type="file" class="form-control" id="nota_entrega" name="nota_entrega">
                            </div>
                        </div>
                    </div>

                    <fieldset>
                        <div class="repeater-default">
                            <div data-repeater-list="produto">
                                <div data-repeater-item="">
                                    <div class="form-group row d-flex align-items-end">
                                        
                                        <div class="col-sm-4">
                                            <label class="control-label">Categoria</label>
                                            <?php $categorias = App\Model\Categoria::all(); ?>
                                            <select name="produto[id_categoria]" class="form-control">
                                                @foreach($categorias as $categoria)
                                                    <option value='{{$categoria->id}}'>{{$categoria->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-5">
                                            <label class="control-label">Designação</label>
                                            <input required type="text" name="produto[designacao]" class="form-control">
                                        </div>

                                        <div class="col-sm-2">
                                            <label class="control-label">Quantidade</label>
                                            <input required type="number" min="1" name="produto[quantidade]" class="form-control">
                                        </div>
                                        <div class="col-sm-1">
                                            <span title="Remover" data-repeater-delete="" class="float-right btn btn-danger btn-sm">
                                                <span class="far fa-trash-alt mr-1"></span> 
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
<script>
// Validação do formulário do funcionário
    $("#ValidarFormProduto").validate({
		rules: {	
            nota_entrega: {
                required: true  
			},         
		},
		messages: {	
            nota_entrega: {
                required: "Anexe a nota de entrega"
			},  
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
