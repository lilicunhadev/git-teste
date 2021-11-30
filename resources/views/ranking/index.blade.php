@extends('layouts.app')

@section('content')
<form action="{{route('ranking.list')}}" class="form-horizontal" id="validate-form" method="post">
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="" />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('FILTRO-TOP-DEVS') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif


                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="col-sm-12">
                                    <label class="control-label">Linguagem programação(mais de uma, utilize "+")</label>
                                </div>
                                <div class="col-sm-12">
                                    <input id="language" name="language" type="text" value="{{ old('language') }}" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <label class="control-label">Mínimo de Repositórios?</label>
                                </div>
                                <div class="col-sm-4">
                                    <input id="pesquisa_repositorio" name="pesquisa_repositorio" type="number" value="{{ old('pesquisa_repositorio') }}" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <label class="control-label">Mínimo de seguidores?</label>

                                    <input id="pesquisa_seguidores" name="pesquisa_seguidores" type="number" value="{{ old('pesquisa_seguidores') }}" class="form-control" />
                                </div>
                            </div>

                            


                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="col-sm-12">
                            <div class="form-group">


                                <div class="col-sm-6">
                                    <button id="btn-salvar-silo" type="submit" class="btn btn-primary"><i class="ti ti-save">Pesquisar</i></button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
</form>
@endsection