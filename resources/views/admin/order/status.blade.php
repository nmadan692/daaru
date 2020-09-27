    <select name="status" onchange="changeStatus()" id="status">
        @foreach($datas as $data)
            <option value="{{ $data['id'] }}" {{ $data['id'] == $value ? 'selected' : null }}>{{ $data['name'] }}</option>
        @endforeach
    </select>

    <script>
        function changeStatus() {
            $.ajax({
                url : '{{ config('app.url') }}/admin/order/{{$id}}',
                type : 'PUT',
                data: {
                  '_token': '{{ csrf_token() }}',
                    'status': $("#status").val()
                },
                success : function(data) {
                    toastr.success('Status changed successfully.');
                },
                error : function(request,error)
                {
                    toastr.error('Sorry something went wrong.');
                    alert("Request: "+JSON.stringify(request));
                }
            });
        }
    </script>
