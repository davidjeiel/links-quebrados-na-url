@extends('layout.padrao')
@section('content')
    <a href="/" class="btn btn-dark btn-sm">Voltar</a>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">
                Lista de Links identificados
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-border table-striped table-hover">
                <thead>
                    <tr>
                        <th>Link</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $item)
                        <tr>
                            <td>{{ $item }}</td>
                            <td>{{ $item }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
