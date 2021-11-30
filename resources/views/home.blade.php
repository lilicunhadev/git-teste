@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    

                    @role('admin')
                    <div class="form-group row">

                        <label for="email" class="col-md-4 col-form-label text-md-left">Administrar acessos </label>
                        <div class="col-md-12">
                            <a id="btn-cancelar" href="{{route('acessos')}}"><i class="btn btn-warning font-weight-bold">Gerenciar acessos</i></a>




                        </div>
                    </div>
                    @endrole
                 
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-left">Pesquisar devs</label>
                        <div class="col-md-12">

                            <a id="btn-cancelar" href="{{route('ranking')}}"><i class="btn btn-primary font-weight-bold">Pesquisar</i></a>

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
</div>
</div>
@endsection