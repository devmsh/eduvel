@component('mail::message')
    # Welcome : {{ $data['data']->name }} <br>
    A financial impulse has been withdrawn.

    #Batch Number {{ $data['payment_id'] }}
    #Sent by <a href="#">info@education-alzard.com</a>
    #Amount
    @component('mail::button', ['url' => ''])
        {{ $data['total'] }}$
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
