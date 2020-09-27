<select name="payment_status" onchange="changePaymentStatus()" id="payment_status">
    @foreach($datas as $data)
        <option value="{{ $data['id'] }}" {{ $data['id'] == $value ? 'selected' : null }}>{{ $data['name'] }}</option>
    @endforeach
</select>

<script>
    function changePaymentStatus() {
        $.ajax({
            url : '{{ config('app.url') }}/admin/order/{{$id}}',
            type : 'PUT',
            data: {
                '_token': '{{ csrf_token() }}',
                'payment_status': $("#payment_status").val()
            },
            success : function(data) {
                toastr.success('Payment status changed successfully.');
            },
            error : function(request,error)
            {
                toastr.error('Sorry something went wrong.');
                alert("Request: "+JSON.stringify(request));
            }
        });
    }
</script>
