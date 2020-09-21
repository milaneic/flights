@extends('layouts.app2')
@section('content')
<div id="msg">
    @foreach ($flights as $item)
    <p>{{$item->id}}</p>
    @endforeach
</div>
<button class="click">click</button>
<input type="text" name="min" id="min">
<input type="text" name="max" id="max">
@endsection
@section('script')
<script>
    $(document).ready(function(){
    $('.click').click(function(){
        console.log('click');
        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
        $.ajax({
            type:'GET',
            url:'/gm',
            data:{
                min:$('#min').val(),
                max:$('#max').val()
            },
            success:function(result) {
               $('#msg').html('');
                   result.flight.forEach(element => {
                    $('#msg').append('<p>'+element.id+'</p>');
                   });
               },
        });
    });
 });
</script>
@endsection