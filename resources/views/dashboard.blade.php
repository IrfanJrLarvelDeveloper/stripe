@extends('layouts.master')
@section('content')
    <?php
    $users=\App\Models\User::all()->except(1);
    ?>
    <div class="page-title">
        <h3>Users

        </h3>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <table width="100%" class="table table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created_at</th>
                    <th>Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('D-m-Y')}}</td>

                    <td class="">
                        <a href="{{url('subscription/create_user_subscription',$user->id)}}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
{{--                        <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>--}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
