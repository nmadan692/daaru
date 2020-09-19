@if($actionData['icon'])
    @if($actionData['view'])
        <a href="{{ route($actionData['viewUrl'], $id) }}" class="btn btn-success">
            <i class="{{$actionData['viewIcon']}}"></i>
        </a>
    @endif

    @if($actionData['edit'])
        <a href="{{ route($actionData['editUrl'], $id) }}" class="btn btn-primary">
            <i class="{{$actionData['editIcon']}}"></i>
        </a>
    @endif

    @if($actionData['delete'])
        <a class="btn btn-danger " href="javascript:;"
           onclick="confirmation('delete-{{$id}}')">
            <i class="la la-trash"></i>
            {!! Form::open(['route' => [$actionData['deleteUrl'], $id], 'method' => 'delete', 'id'=>'delete-'.$id]) !!}
            {!! Form::close() !!}
        </a>
    @endif
@endif

<script type="text/javascript">
    function confirmation(formId) {
        document.getElementById(formId).submit();
    }
</script>
