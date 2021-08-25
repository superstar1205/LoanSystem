@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                @foreach($result as $data)
                <div class="card-header"><div class="cadhed"><span>{{ __('Edit User') }}</span><span class="cadhbt" onclick="document.location='{{ route('manageboard')}}'"><i class="bi bi-arrow-return-left"></i></span></div></div>
                    <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <div class="row">
                                    <div class="col-sm-4">name :</div>
                                    <div class="col-sm-8">{{$data->name}}</div>
                                </div>
                            </tr>
                            <tr>
                                <div class="row">
                                    <div class="col-sm-4">E-mail:</div>
                                    <div class="col-sm-8">{{$data->email}}</div>
                                </div>
                            </tr>
                            <tr>
                                <div>
                                    <div class="col-sm-4">status :</div>
                                    <div class="col-sm-8">
                                        @if($data->name==1)
                                            {{ __('This user can use.') }}
                                        @else
                                            {{ __("This user can't use!") }}
                                        @endif
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <div class="row">
                                    <div class="col-sm-4">Created_at:</div>
                                    <div class="col-sm-8">{{ $data->created_at}}</div>
                                </div>
                            </tr>
                            <tr>
                                <div class="row">
                                    <div class="col-sm-4">Updated_at :</div>
                                    <div class="col-sm-8">{{ $data->updated_at}}</div>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('roleuser') }}" class="needs-validation form" enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" class="form-check-input" value="{{$data->id}}" name="id" id="invalidCheck" require>
                            <div class="row">
                                <div class="col-12">
                                    <label for="validationstatus" class="form-label">status</label>
                                    <select class="form-select" name="status" id="validationstatus" required>
                                        <option selected disabled value="">Escoger...</option>
                                        <option value="1">Allow</option>
                                        <option value="0">Don't allow</option>
                                    </select>
                                    <div class="invalid-feedback">
                                    Seleccione un sexo válido.
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
                                    <button class="btn btn-primary sumbtn float-end" type="submit"><i class="bi bi-person-plus-fill"></i> OK</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
