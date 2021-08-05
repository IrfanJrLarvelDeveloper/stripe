@extends('subscription::layouts.master')

@section('content')


    <div class="page-title">
        <h3>Subscription</h3>

    </div>

    <div class="box box-primary">
        <div class="box-body">
            <table width="100%" class="table table-hover" id="dataTables-example">
                <thead>
                <a href="{{url('subscription/create')}}" class="btn btn-sm btn-outline-primary "><i class="fas fa-user-shield"></i>Add Subscription </a>

                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Coins Spend</th>
                    <th>Is Custom</th>

                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscriptions as $subscription)
                <tr>
                    <td>{{$subscription->name}}</td>
                    <td>{{$subscription->price}}</td>
                    <td>{{$subscription->duration}}</td>
                    <td>{{$subscription->coin_spend}}</td>
                    <td>@if($subscription->custom_subscription==1) Custom Subscription @endif</td>

                    <td class="">
                        <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                        <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
