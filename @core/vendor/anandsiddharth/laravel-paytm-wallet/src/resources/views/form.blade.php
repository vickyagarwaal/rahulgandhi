@extends($view)
@section('payment_redirect')
<form method="post" action="{{$txn_url}}" name="f1"  style="visibility: hidden;">
<table border="1">
<tbody>
@foreach ($params as $key => $value)
<input type="hidden" name="{{$key}}"  value="{{$value}}" />
@endforeach
<input type="hidden" name="CHECKSUMHASH" value="{{$checkSum}}">
<input type="submit" style="visibility: hidden;" id="paytm_form_sumit">
</tbody>
</table>
<script type="text/javascript">
document.getElementById('paytm_form_sumit').dispatchEvent(new MouseEvent('click'));
</script>
</form>
@stop