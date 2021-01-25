@foreach($saidas as $saida)
<tr class="tabelaClicked clickable-roww">
    <td>{{$loop->iteration}}</td>
    <td>{{$saida->ordenante}}</td>
    <td>{{$saida->recebedor}}</td>
    <td>{{$saida->quantidade}}</td>
    <td>{{date('d-m-Y',strtotime($saida->created_at))}}</td>
</tr>
@endforeach
<script>
  jQuery().ready(function(){
    $(".clickable-row").click(function(){
        window.location = $(this).data("href");
    });
  });
</script>
                            