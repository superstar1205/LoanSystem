@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Add new customer') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('addnewcustomer') }}" class="needs-validation form" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="file" id="input-file-now" class="form-control dropify" name="file" required/>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="validationFname" class="form-label">Nombre de pila</label>
                                        <input type="text" class="form-control" name="fname" id="validationFname" value="firstname" required>
                                        <div class="valid-feedback">
                                        ¡Se ve bien!
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="validationLname" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" name="lname" id="validationLname" value="lastname" required>
                                        <div class="valid-feedback">
                                        ¡Se ve bien!
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="validationTele" class="form-label">Teléfono</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone-fill"></i></span>
                                        <input type="number" class="form-control" name="phone" id="validationTel" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Introduzca un teléfono válido.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="validationAdrs" class="form-label">Dirección</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-geo-alt-fill"></i></span>
                                        <input type="text" class="form-control" name="address" id="validationAdrs" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Proporcione una dirección válida.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="validationIDnb" class="form-label">número de identificación</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-badge-fill"></i></span>
                                        <input type="number" class="form-control" name="idnum" id="validationIDnb" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                        Proporcione un número de identificación válido.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="validationGeder" class="form-label">Género</label>
                                    <select class="form-select" name="gender" id="validationGender" required>
                                    <option selected disabled value="">Escoger...</option>
                                    <option value="man">Masculino</option>
                                    <option value="women">Mujer</option>
                                    </select>
                                    <div class="invalid-feedback">
                                    Seleccione un sexo válido.
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
                            <div class="float-end">
                                <button class="btn btn-primary sumbtn float-end" type="submit"><i class="bi bi-person-plus-fill"></i> Salvar</button>
                            </div>
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
            <menu class="items-wrapper">
            <a href="{{ route('dashboard') }}" class="menu-item fa fa-home"></a>
            <a href="{{ route('addcustomer') }}" class="menu-item fa fa-user-plus"></a>
            <a href="{{ route('showcustomers') }}" class="menu-item fa fa-users"></a>
            <a href="{{ route('showtrades') }}" class="menu-item fa fa-gift"></a>
        </menu>
    </div>
</div>
@endsection
