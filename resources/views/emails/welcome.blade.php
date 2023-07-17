@component('mail::message')
# Thank you for subscribing to our site!

You will now receive latest news from our team to your email {{$subscriber->email}}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
