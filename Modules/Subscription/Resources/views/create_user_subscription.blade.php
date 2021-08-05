@extends('subscription::layouts.master')

@section('content')



    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">User Custom Subscription Create</div>
            <div class="card-body">

                <form accept-charset="utf-8" action="{{route('store_user_subscription')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label"><b>User Email:</b> {{$user->email}}</label>
                        <input type="hidden" name="id" value="{{$user->id}}" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Name</label>
                        <input type="text" name="name" placeholder="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Price</label>
                        <input type="number" name="price" placeholder="Price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Duration</label>
                        <input type="text" name="duration" placeholder="Duration" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Spend Coins</label>
                        <input type="text" name="coin_spend" placeholder="Enter Spend Coin" class="form-control" required>
                    </div>
                    <div class="mb-3">
                    <label for="state" class="form-label">Type</label>
                    <select name="type" class="form-select" required>
                        <option  selected>Choose...</option>
                        <option value="monthly">Monthly</option>
                        <option value="annual">Annualy</option>
                    </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
