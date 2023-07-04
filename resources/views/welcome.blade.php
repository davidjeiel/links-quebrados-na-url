@extends('layout.padrao')
@section('content')
    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2 class="text-center text-uppercase">Verifica links da URL</h2>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-end">
                    Informe a URL a verificar
                </h4>
            </div>
            <div class="col-md-6">
                <form action="{{url('verifica')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input id="url" name="url" type="text" class="form-control"/>
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
