@component('mail::message')
    # Confirm your account
    Welcome {{ $data['data']->name }} <br>


    Please click the link to confirm your account.

    @component('mail::button', ['url' => 'confirmation/'.$data['token']])
        Confirm Account
    @endcomponent

    Or Copy Link | <a href="{{ url('/confirmation/'.$data['token']) }}">{{ url('/confirmation/'.$data['token']) }}</a>
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent


