@component('mail::message')

    Dear Mr. <h3>{{$details['admin_name']}}</h3><br>

    {{$details['title']}}<br>
    Mr <b>{{$details['customer_name']}}</b> its mail is <b>{{$details['email']}}</b> request you custom subscription package.
    They demand Package name is <b>{{$details['package_name']}}</b> and its Price is <b>{{$details['price']}}</b>
    and its duration period is <b>{{$details['duration']}}</b> and its type is <b> {{$details['type']}}</b> and they spend coin <b>{{$details['coin_spend']}}</b>



    Thanks,<br>
    {{ env('APP_TEAM') }}
@endcomponent
