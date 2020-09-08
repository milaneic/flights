@if(Session::has('message'))
<h5 class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</h5>
@endif