@foreach($marcacoes as $marcacao)
<tr style="z-index:0" class="tabelaClicked clickable-roww" data-href='{{ url("verVisitante/{$marcacao->id_marcacao}") }}'>
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
    <td>
        @if($marcacao->data_saida==null)
            <span class="badge badge-soft-success">Visitante Presente</span>
        @else
        <span class="badge badge-soft-danger">{{ date('d-m-Y H:i:s',strtotime($marcacao->data_saida)) }}</span>
        @endif
    </td>
    <td>
        <a href='{{ url("verVisitante/{$marcacao->id_marcacao}") }}' class="float-right btn btn-sm btn-round btn-success"><i class="mdi mdi-eye mr-2"></i> Ver Marcação</a>
        @if($marcacao->data_saida==null)
            <a href='{{ url("marcarSaida/{$marcacao->id_marcacao}") }}' class="float-right btn btn-sm btn-round  mr-1 btn-warning"><i class="mdi mdi-exit-run mr-2"></i> Marcar Saída</a>
        @endif
    </td>
</tr>
@endforeach
<script>
  jQuery().ready(function(){
    $(".clickable-row").click(function(){
        window.location = $(this).data("href");
    });
  });
</script>