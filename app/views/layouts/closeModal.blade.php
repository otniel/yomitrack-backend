@extends('layouts.modal')

@section('head')
<script>
    $( document ).ready(function() {
        $.notify("La operacion se ejecuto con exito!", { className: 'success', clickToHide: true,  globalPosition: 'top center'});
        setTimeout( function() { parent.jQuery.fancybox.close(); parent.location.reload(true); },2000); // 2000 = 2 secs
    });
</script>
@stop