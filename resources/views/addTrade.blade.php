@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
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
                            <div class="row">
                                <p class="col-5">Nombre completo:</p>
                                <p class="col-7">{{$data->first_name}} {{$data->last_name}}</p>
                            </div>
                            <div class="row">
                                <p class="col-5">Dirección:</p>
                                <p class="col-7">{{$data->address}}</p>
                            </div>
                            <div class="row">
                                <p class="col-5">Teléfono:</p>
                                <p class="col-7">{{$data->phone}}</p>
                            </div>
                            <div class="row">
                                <p class="col-5">Número de identificación:</p>
                                <p class="col-7">{{$data->idnum}}</p>
                            </div>
                            <div class="row">
                                <p class="col-5">Género:</p>
                                <p class="col-7">@if($data->gender == 1)Man @else women @endif</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <form method="POST" action="{{ route('addnewtrade')}}" class="needs-validation trade-form" enctype="multipart/form-data" novalidate>
                    @csrf
                        <input type="hidden" name="customer_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="validationAmount" class="form-label t-label">Cantidad</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-arrow-right-square"></i></span>
                                    <input type="number" class="form-control" name="amount" id="validationAmount" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Introduzca un cantidad válido.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="validationType" class="form-label t-label">Tipo de prestamo</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-list-check"></i></span>
                                    <select class="form-select" name="method" id="validationType" required>
                                        <option selected disabled>Escoger...</option>
                                        <option value="1">Diario</option>
                                        <option value="2">Inter diario</option>
                                        <option value="7">Semanal</option>
                                        <option value="15">Quincenal</option>
                                        <option value="30">Mensual</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="validationInte" class="form-label t-label">Interesar</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-plus-circle"></i></span>
                                    <input type="number" class="form-control" name="interest" id="validationInte" aria-describedby="inputGroupPrepend" required>
                                    <span class="input-group-text" id="inputGroupPrepend"> % </span>
                                    <div class="invalid-feedback">
                                        Introduzca un teléfono válido.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="validationDay" class="form-label t-label">Tiempo</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-stopwatch"></i></span>
                                    <input type="number" class="form-control" name="day" id="validationDay" aria-describedby="inputGroupPrepend" required>
                                    <span class="input-group-text" id="inputGroupPrepend">Día</span>
                                    <div class="invalid-feedback">
                                        Introduzca un día válido.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="validationTotal" class="form-label t-label">Importe de pago</label>
                                <div class="input-group has-validation" id="total">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-arrow-left-square"></i></span>
                                    <input type="text" class="form-control" name="total" id="validationTotal" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Introduzca un Importe de pago válido.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="validationQuota" class="form-label t-label">Cuota / paga</label>
                                <div class="input-group has-validation" id="quota">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-arrow-left-circle"></i></span>
                                    <input type="text" class="form-control" name="quota" id="validationQuota" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Introduzca un Cuota / paga válido.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="validationRent" class="form-label t-label">Fecha de Alquiler</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-calendar-minus"></i></span>
                                    <input type="date" class="form-control" name="rent_date" id="validationRent" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Introduzca un Fecha de Alquiler válido.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="validationBlackb" class="form-label t-label">Mora</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-calendar2-plus"></i></span>
                                    <input type="number" class="form-control" name="black" id="validationBlackb" aria-describedby="inputGroupPrepend" required>
                                    <span class="input-group-text" id="inputGroupPrepend"> % </span>
                                    <div class="invalid-feedback">
                                        Introduzca un mora válido.
                                    </div>
                                </div>
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
                            <button class="btn btn-primary" type="submit"> Salvar <i class="bi bi-node-plus-fill"></i></button>
                        </div>
                    </form>
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
