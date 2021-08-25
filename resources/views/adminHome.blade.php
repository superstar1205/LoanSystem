@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>
                <div class="card-body">
                    <table id="example" class="table table-striped align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="">Nombre</th>
                                <th class="">Refer ID</th>
                                <th class="f-none">E-mail</th>
                                <th class="t-none">Role</th>
                                <th class="s-none">status</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach($results as $i=>$data)
                            <tr onclick="document.location='{!! route('edituser', ['id'=>$data->id]) !!}'">
                                <td>{{$i+1}}</td>
                                <td>{{$data->id}}</td>
                                <td class="">{{$data->name}}</td>
                                <td class="">{{$data->referal_id}}</td>
                                <td class="f-none">{{$data->email}}</td>
                                <td class="t-none">{{$data->is_admin}}</td>
                                <td class="s-none">{{$data->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
