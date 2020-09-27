<span class="m-switch m-switch--outline m-switch--success">
    <label>
        <input type="checkbox" {{ $checked ? 'checked' : null }} name="{{ $name ?? null }}"  value="{{ $id }}" onchange="changeStatus(this.value)">
        <span></span>
    </label>
</span>

<script>
    function changeStatus(id) {
        $.ajax({
            url : '{{ config('app.url') }}/admin/category/status/change/' + id,
            type : 'GET',
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
