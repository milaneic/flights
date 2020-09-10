@component('mail::message')
<h1>Hi Admin!!!</h1>

You have a new message from <strong>{{$data['name']}}</strong>
<br>
<h4>Email: {{$data['email']}}</h4>
<hr>
<h4>Subject: {{$data['subject']}}</h4>
<h5>Message:</h5>
<p>{{$data['message']}}</p>
{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent