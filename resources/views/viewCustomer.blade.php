@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                @foreach($results as $data)
                <div class="card-header">{{$data->first_name}} {{$data->last_name}}</div>
                <div class="card-body">
                    <div class="image-box">
                        <div class="vi-avatar">
                            <img class="c-image" src="{{$data->image}}"></img>
                        </div>
                    </div>
                    <div class="data-box">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="col-sm-6">First nmae :</td>
                                    <td class="col-sm-6">{{ $data->first_name}}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">Last nmae :</td>
                                    <td class="col-sm-6">{{$data->last_name}}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">Address :</td>
                                    <td class="col-sm-6">{{$data->address}}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">Phone :</td>
                                    <td class="col-sm-6">{{$data->phone}}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">ID Number :</td>
                                    <td class="col-sm-6">{{$data->idnum}}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">Gender :</td>
                                    <td class="col-sm-6">@if($data->gender == 1)
                                    {{'Man'}} 
                                @else 
                                    {{'women'}}
                                @endif</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">Created At :</td>
                                    <td class="col-sm-6">{{$data->created_at}}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">Updated At :</td>
                                    <td class="col-sm-6">{{$data->updated_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
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
