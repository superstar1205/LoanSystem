@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h1>You must get access role from admin!</h1>
                    <div class="d4d">
                        <div class="dimage">
                            <img class="dimg" src="{{ asset('img/404.svg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
