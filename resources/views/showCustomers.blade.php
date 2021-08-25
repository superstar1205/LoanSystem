@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Customers') }}</div>
                <div class="card-body">
                    <table id="example" class="table table-striped align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="f-none">Nombre de pila</th>
                                <th class="f-none">Apellido</th>
                                <th class="t-none">Teléfono</th>
                                <th class="s-none">Dirección</th>
                                <th class="t-none">Expresar</th>
                                <th>Vista</th>
                                <th>let</th>
                                <th class="s-none">Borrar</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($results as $data)
                            <tr>
                                <td>
                                    <div class="image"><img class="td-avatar" src="{{$data->image}}"></img></div>
                                </td>
                                <td class="f-none">{{$data->first_name}}</td>
                                <td class="f-none">{{$data->last_name}}</td>
                                <td class="t-none">{{$data->phone}}</td>
                                <td class="s-none">{{$data->address}}</td>
                                <td class="t-none">{{$data->trade_id}}</td>
                                <td><a href="{!! route('viewcustomer', ['id'=>$data->id]) !!}" type="button" class="btn btn-primary tdbtn"><i class="bi bi-eye-fill"></i></a></td>
                                <td><a href="{!! route('addtrade', ['id'=>$data->id]) !!}" type="button" class="btn btn-success tdbtn"><i class="bi bi-award"></i></a></td>
                                <td class="s-none"><button type="button" class="btn btn-danger tdbtn" onclick="delete_customer({{$data->id}})"><i class="bi bi-trash-fill"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="circularMenu1" class="circular-menu circular-menu-left active">
        <a class="floating-btn" onclick="document.getElementById('circularMenu1').classList.toggle('active');">
            <i class="fa fa-bars"></i>
        </a>
        <menu class="items-wrapper">
            <a href="{{ route('dashboard') }}" class="menu-item fa fa-home"></a>
            <a href="{{ route('addcustomer') }}" class="menu-item fa fa-user-plus"></a>
            <a href="{{ route('showcustomers') }}" class="menu-item fa fa-users"></a>
            <a href="{{ route('showtrades') }}" class="menu-item fa fa-gift"></a>
        </menu>
    </div>
</div>
@endsection
