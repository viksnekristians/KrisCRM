@component('mail::message')
# Thank you for subscribing to KrisCRM news

{{$text}}

Visit to see latest news:
@component('mail::button', ['url' => ''])
Go to site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
