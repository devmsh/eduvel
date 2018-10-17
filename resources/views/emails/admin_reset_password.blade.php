@component('mail::message')
# Reset Account
Welcome {{ $data['data']->name }} <br>

The body of your message.

@component('mail::button', ['url' => '/reset/password/'.$data['token']])
Click Here To Reset Your Password
@endcomponent

Or Copy Link | <a href="{{ url('/reset/password/'.$data['token']) }}">{{ url('/reset/password/'.$data['token']) }}</a>

Thanks,<br>
Education Alzard
<!-- {{ config('app.name') }} -->
@endcomponent
