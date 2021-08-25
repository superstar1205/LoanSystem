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
                                <th class="dtd">#</th>
                                <th class="s-none">name</th>
                                <th class="f-none">Amount</th>
                                <th class="t-none">Fee</th>
                                <th class="t-none">Method</th>
                                <th class="nones">Paydate</th>
                                <th class="t-none">Time</th>
                                <th class="t-none">Total</th>
                                <th class="t-none">Quota</th>
                                <th class="none">Status</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($results as $data)

                            <tr class="clickable text-center" onclick="document.location='{!! route('addnewpay', ['id'=>$data->id]) !!}'">
                                <td class="dtd">
                                    <div class="image"><img class="td-avatar" src="{{$data->image}}"></img></div>
                                </td>
                                <td class="s-none">{{$data->first_name}} {{$data->last_name}}</td>
                                <td class="f-none">{{$data->amount}}$</td>
                                <td class="t-none">{{$data->interest}}%</td>
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
                                <td class="none">{{$data->next_date}}</td>
                                <td class="t-none">{{$data->day}}day</td>
                                <td class="t-none">{{$data->payamount}}$</td>
                                <td class="t-none">{{$data->quota}}$</td>
                                <td class="none">
                                    @if($data->ongoing==null)
                                        <div style="background:#f00;border-radius: 5px;"> {{'0%'}}</div>
                                    @elseif($data->ongoing <= 1)
                                        <div style="background:#a14;border-radius: 5px;"> {{$data->ongoing}} %</div>
                                    @elseif($data->ongoing <= 10)
                                        <div style="background:#d26;border-radius: 5px;"> {{$data->ongoing}} %</div>
                                    @elseif($data->ongoing <= 20)
                                        <div style="background:#a38;border-radius: 5px;"> {{$data->ongoing}} %</div>
                                    @elseif($data->ongoing <= 50)
                                        <div style="background:#64a;border-radius: 5px;"> {{$data->ongoing}} %</div>
                                    @elseif($data->ongoing <= 70)
                                        <div style="background:#35d;border-radius: 5px;"> {{$data->ongoing}} %</div>
                                    @elseif($data->ongoing <= 90)
                                        <div style="background:#07f;border-radius: 5px;"> {{$data->ongoing}} %</div>
                                    @endif
                                </td>
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
