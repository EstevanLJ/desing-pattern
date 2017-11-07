@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                </div>
            </div>
        </div>
    </div>

    <div id="appAluno" class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buscar Aluno</div>

                <div class="panel-body">
                    <form id="formAluno" class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" v-model="id" placeholder="ID">
                        </div>
                        <button type="submit" class="btn btn-primary" @click="submit()">Buscar</button>
                    </form>

                    <pre v-if="exibirResultado">
                        @{{resultado}}
                    </pre>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection
