@extends('layouts.inicio')
@section('content1')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">GestEspaço</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Listar Departamentos</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Departamento</h4>
            </div>
        </div>
    </div>
    <!-- Inicio do corpo -->
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borded mb-0">
                            <thead style="background:#c8d9e8">
                                <tr>
                                    <th>#</th>
                                    <th>Departamento</th>
                                    <th>Sigla</th>
                                    <th>Secretário Geral</th>
                                    <th>Contacto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departamentos as $departamento)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$departamento->nome}}</td>
                                    <td>{{$departamento->sigla}}</td>
                                    <td>{{$departamento->secretario}}</td>
                                    <td>{{$departamento->telefone}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIm do corpo -->
</div>
@stop