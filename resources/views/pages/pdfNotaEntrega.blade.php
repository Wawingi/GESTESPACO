<!doctype html>
<head>
   
</head>
<body style="background:#fff">

<div class="container-fluid">
    <div style="display:inline-block">
        <img style="display:inline-block;margin-top:50px" src="data:image/png;base64,{{ $image1 }}" width="100px" heigth="100px"/>
        <h1 style="display:inline-block;margin-left:200px" style="text-align:center">MPLA</h1>
        <img style="display:inline-block;float:right;margin-top:55px" src="data:image/png;base64,{{ $image2 }}" width="60px" heigth="60px"/>
    </div>
    <hr> 
    <p style="text-align:center">DEPARTAMENTO DE ADMINISTRAÇÃO E FINANÇAS DO COMITÊ CENTRAL</p>
    <p style="text-align:center">ARMAZÉM CENTRAL DO COMITÊ PROVINCIAL</p>
    
    <br> <br> <br>
    <div style="border:solid 1px black;background:#cd1126" class="row">
        <div class="col-12">
            <div style="text-align:center;font-weight:bold">NOTA DE ENTREGA</div>
        </div>
    </div>
    <br>
    <br>
    
    <div style="border:solid 1px black">
        <table style="width:100%">
            <tr>
                <td>DATA: </td>
                <td><B>{{date('d-m-Y H:i:s',strtotime($saida->created_at))}}</B></td>
                <td style="text-align:right">MOTORISTA: </td>
                <td style="text-align:right"><B>{{$saida->motorista}}</B></td>
            </tr>
            <tr>
                <td>DESTINO: </td>
                <td><B>{{$saida->nome}}</B></td>
                <td style="text-align:right">MATRICULA: </td>
                <td style="text-align:right"><B>{{$saida->matricula}}</B></td>
            </tr>
            <tr>
                <td>ORDENANTE: </td>
                <td><B>{{$saida->ordenante}}</B></td>
                <td style="text-align:right">VIATURA: </td>
                <td style="text-align:right"><B>{{$saida->viatura}}</B></td>
            </tr>
        </table>
    </div>
    <br>
           
    <table style="width:100%; border: 1px solid black;border-collapse: collapse">
        <thead style="background:yellow">
            <tr>
                <th style="border: 1px solid black" scope="col">#</th>
                <th style="border: 1px solid black" scope="col">DESIGNAÇÃO</th>
                <th style="border: 1px solid black" scope="col">QUANTIDADE</th>
            </tr>
        </thead>
        @foreach($produtos as $prod)
        <tr>
            <td style="border: 1px solid black;text-align:center">{{$loop->iteration}}</td>
            <td style="border: 1px solid black;text-align:center">{{$prod->designacao}}</td>
            <td style="border: 1px solid black;text-align:center">{{$prod->quantidade}}</td>
        </tr>
        @endforeach

        <?php
            $total=0;
            foreach($produtos as $prod):
                $total = $total+$prod->quantidade;
            endforeach
        ?>
        <tr>
            <td colspan="2" style="border: 1px solid black;text-align:center;font-weight:bold">TOTAL</td>
            <td style="border: 1px solid black;text-align:center;font-weight:bold">{{$total}}</td>            
        </tr>
    </table>

    <br><br>
    <div style="border:solid 1px black">
        <p style="margin-left:10px">OBSERVAÇÕES: </p><br><br>
    </div>
    <br><br><br>
    <div style="display:inline-block">
        <p style="display:inline-block;margin-left:25px">O CHEFE DO ARMAZÉM</p>
        <p style="display:inline-block;margin-left:110px">RECEBI</p>
        <p style="display:inline-block;margin-left:180px">DEPÓSITO</p>
    </div>
    <br>
</div>
</body>
</html>
