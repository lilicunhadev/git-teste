@extends('layouts.app')

@section('content')
<form action="{{route('acessos.update',$user->id)}}" class="form-horizontal" id="validate-form" method="post">
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="" />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Alterar-Usuário') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif


                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="col-sm-12">
                                    <label class="control-label">Nome</label>
                                </div>
                                <div class="col-sm-12">
                                    <input id="name" readonly name="name" type="text" value="{{$user->name }}" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-4">
                                    <label>Role</label>
                                    <select id="role" name="role" type="text" class="form-control" required>

                                        @foreach($roles as $role)
                                        <option value="{{$role->id }}"{{ $user->roles->first()->id == $role->id ? 'selected' : '' }}>{!!$role->name!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="col-sm-12">
                            <div class="form-group">


                                <div class="col-sm-6">
                                    <button id="btn-salvar-silo" type="submit" class="btn btn-primary"><i class="ti ti-save">Salvar</i></button>
                                    <a id="btn-cancelar" href="{{route('acessos')}}"><i class="btn btn-warning font-weight-bold">Voltar</i></a>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
</form>
@endsection