@extends('layouts.app')

@section('content')
<form action="#" method="post">
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="" />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('LISTAGEM-TOP-DEVS') }}</div>

                    <div class="card-body">
                      


                        <div class="col-sm-12">
                            <table class="table table-borderless table-dark" id="produtos">
                                <thead>
                                    <tr>
                                        <th title="Field #1">#</th>
                                        <th title="Field #2">Nome</th>
                                        <th title="Field #2">E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id }}</td>
                                        <td>{{$user->name }}</td>
                                        <td>{{$user->email }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="col-sm-12">
                            <div class="form-group">


                                <div class="col-sm-12">
                                <a id="btn-cancelar" href="{{route('home')}}"><i class="btn btn-warning font-weight-bold">Voltar</i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
</form>
@endsection