@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Operaciones que debería obtener hoy') }}</div>
                <div class="card-body">
                    <table id="example" class="table table-striped align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="f-none">Nombre</th>
                                <th class="t-none">Monto</th>
                                <th class="t-none">Pagar</th>
                                <th class="t-none">Interesar</th>
                                <th class="t-none">Quota</th>
                                
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($result as $data)

                            <tr class="clickable text-center" onclick="document.location='{!! route('addnewpay', ['id'=>$data->id]) !!}'">
                                <td>
                                    <div class="image"><img class="td-avatar" src="{{$data->image}}"></img></div>
                                </td>
                                <td class="f-none">{{$data->first_name}} {{$data->last_name}}</td>
                                <td class="t-none">{{$data->amount}}</td>
                                <td class="t-none">
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
                                <td class="t-none">{{$data->interest}}</td>
                                <td class="t-none">{{$data->quota}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Operaciones recibidas hoy') }}</div>
                <div class="card-body">
                    <table id="example1" class="table table-striped align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="f-none">Nombre</th>
                                <th class="t-none">Recibió</th>
                                <th class="t-none">Pagar</th>
                                <th class="t-none">Interesar</th>
                                <th class="t-none">Mota</th>
                                <th class="t-none">Alquiler fecha</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($result1 as $data1)

                            <tr class="clickable text-center">
                                <td>
                                    <div class="image"><img class="td-avatar" src="{{$data->image}}"></img></div>
                                </td>
                                <td class="f-none">{{$data1->first_name}} {{$data1->last_name}}</td>
                                <td class="t-none">{{$data1->payamt}}</td>
                                <td class="t-none">
                                    @if($data1->paymethod == 1)
                                        {{'Diary'}}
                                    @elseif($data1->paymethod == 2)
                                        {{'Inter Diary'}}
                                    @elseif($data1->paymethod == 7)
                                        {{'Weekly'}}
                                    @elseif($data1->paymethod == 15)
                                        {{'Fortnightly'}}
                                    @else
                                        {{'Monthly'}}
                                    @endif
                                </td>
                                <td class="t-none">{{$data1->interest}}</td>
                                <td class="t-none">{{$data1->amount}}</td>
                                <td class="t-none">{{$data1->rent_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Otros') }}</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($result2 as $data2)
                        <div class="col-md-9">Número de clientes:</div>
                        <div class="col-md-3">{{$data2->total}}</div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-9">Todo remanente:</div>
                        <div class="col-md-3">
                            @php 
                                $ttl = 0;
                            @endphp
                            @foreach($result as $data)
                                @php
                                    $ttl+=$data->quota;
                                @endphp
                            @endforeach
                            @php
                                echo $ttl;
                            @endphp
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">Todo recibió:</div>
                        <div class="col-md-3">
                            @php 
                                $ttl = 0;
                            @endphp
                            @foreach($result1 as $data1)
                                @php
                                    $ttl+=$data1->payamt;
                                @endphp
                            @endforeach
                            @php
                                echo $ttl;
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
            <!-- recibió Todo reciben-->
        </div>
        <p>Referral link: {{ Auth::user()->referral_link }}</p>
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
