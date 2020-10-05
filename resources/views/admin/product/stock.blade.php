<span class="m-switch m-switch--outline m-switch--success">
    <label>
        <input type="checkbox" {{ $checked ? 'checked' : null }} {{ $disabled ? 'disabled' : null }} name="{{ $name ?? null }}"  value="{{ $id }}" onchange="changeStock(this.value)">
        <span></span>
    </label>
</span>

<script>
    function changeStock(id) {
        $.ajax({
            url : '{{ config('app.url') }}/admin/product/stock/change/' + id,
            type : 'GET',
            success : function(data) {
                toastr.success('Stock changed successfully.');
            },
            error : function(request,error)
            {
                toastr.error('Sorry something went wrong.');
                alert("Request: "+JSON.stringify(request));
            }
        });
    }
</script>
