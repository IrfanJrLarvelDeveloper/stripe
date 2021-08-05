@extends('subscription::layouts.master')

@section('content')


    <div class="page-title">
        <h3>Users Subscription</h3>

    </div>

    <div class="box box-primary">
        <div class="box-body">
            <table width="100%" class="table table-hover" id="dataTables-example">
                <thead>
{{--                <a href="{{url('subscription/create')}}" class="btn btn-sm btn-outline-primary "><i class="fas fa-user-shield"></i>Add Subscription </a>--}}

                <tr>
                    <th>User Name</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Coins Spend</th>
                    <th>Is Custom</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($userscriptions as $subscription)
                <tr>
                    <td>{{$subscription->user->name}}</td>
                    <td>{{$subscription->subscription->name}}</td>
                    <td>{{$subscription->subscription->price}}</td>
                    <td>{{$subscription->subscription->duration}}</td>
                    <td>{{$subscription->subscription->coin_spend}}</td>
                    <td>@if($subscription->subscription->custom_subscription==1) Custom Subscription @endif</td>

                    {{--                    <td class="">--}}
{{--                        <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>--}}
{{--                        <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>--}}
{{--                    </td>--}}
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
