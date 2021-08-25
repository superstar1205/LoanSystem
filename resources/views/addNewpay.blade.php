@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($results as $data)
            <div class="card">
                <div class="card-header">{{$data->first_name}} {{$data->last_name}}</div>
                <div class="card-body">
                    <div class="row add-box">
                        <div class="col-sm-4 addi-box">
                            <div class="vi-avatar">
                                <img class="c-image" src="{{$data->image}}"></img>
                            </div>
                        </div>
                        <div class="col-sm-8 addd-box">
                            <form method="POST" action="{{ route('tradepay')}}" class="needs-validation trade-form" enctype="multipart/form-data" novalidate>
                            @csrf
                                <input type="hidden" class="form-control" name="tid" value="{{$data->id}}">
                                <input type="hidden" class="form-control" name="pa" value="{{$data->payamount}}">
                                <input type="hidden" class="form-control" name="method" value="{{$data->paymethod}}">
                                <div class="row">
                                    <label for="validationAmount" class="form-label t-label">Amount</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-plus-circle"></i></span>
                                        <input type="text" class="form-control" name="amount" id="validationAmount" aria-describedby="inputGroupPrepend" required>
                                        <span class="input-group-text" id="inputGroupPrepend"> $ </span>
                                        <div class="invalid-feedback">
                                            Introduzca un amount válido.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="validationPdate" class="form-label t-label">Pay-date( {{ $data->next_date }} )</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-plus-circle"></i></span>
                                        <input type="date" class="form-control" name="paydate" id="validationPdate" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Introduzca un teléfono válido.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="validationstatus" class="form-label">status</label>
                                        <select class="form-select" name="status" id="validationstatus" required>
                                            <option selected disabled value="">Escoger...</option>
                                            <option value="0">Progress</option>
                                            <option value="1">Complete</option>
                                        </select>
                                        <div class="invalid-feedback">
                                        Seleccione un sexo válido.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 nextpay_date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Acepta los términos y condiciones.
                                        </label>
                                        <div class="invalid-feedback">
                                            Debes estar de acuerdo antes de enviar.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit"> Salvar <i class="bi bi-node-plus-fill"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="col-sm-4">Amount :</td>
                                            <td class="col-sm-8">{{ $data->amount}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4">Paymethod:</td>
                                            <td class="col-sm-8">
                                                @if($data->paymethod == 1)
                                                    {{'Diary'}}
                                                @elseif($data->paymethod == 2)
                                                    {{'Inter Diary'}}
                                                @elseif($data->paymethod == 7)
                                                    {{'Weekly'}}
                                                @elseif($data->paymethod == 15)
                                                    {{'Fortnightly'}}
                                                @else
                                                    {{'Monthly'}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4">Interest :</td>
                                            <td class="col-sm-8">{{ $data->interest}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4">Time :</td>
                                            <td class="col-sm-8">{{ $data->day}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4">Quota :</td>
                                            <td class="col-sm-8">{{ $data->quota}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4">Rent-date :</td>
                                            <td class="col-sm-8">{{ $data->rent_date}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4">Pay-date :</td>
                                            <td class="col-sm-8">{{ $data->next_date}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4">Ongoing :</td>
                                            <td class="col-sm-8">{{ $data->ongoing}} %</td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4">Adress :</td>
                                            <td class="col-sm-8">{{ $data->address}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4">Phone :</td>
                                            <td class="col-sm-8">{{ $data->phone}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                            <div class="col-md-8">
                                <h5>Pay results</h5>
                                <div style="overflow-y:scroll;max-height:500px">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>amount</th>
                                                <th>date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($resultt as $i=>$datat)
                                            <tr>
                                                <td>{{$i+1}}</td>
                                                <td>{{$datat->amount}}</td>
                                                <td>{{$datat->paydate}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
