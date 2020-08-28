<div class="m-portlet m-portlet--mobile">
    @if($title)
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        {{ $title }}
                    </h3>
                </div>
            </div>
                @if($button)
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{ route($button['route']) }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                    <span>
                                        <i class="{{ $button['icon'] }}"></i>
                                        <span>{{ $button['name'] }}</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
        </div>
    @endif

    <div class="m-portlet__body">
        @if($contentHeader)
            {{ $contentHeader }}
        @endif`
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable {{ $tableClass }}" id="{{ $tableId }}">
            <thead>
                <tr>
                    @foreach($theads as $thead)
                        <th>{{ $thead }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


@push('script')
    <script>
        $(document).ready(function() {
            var id = {!! json_encode($tableId)  !!}
            var columns =
                {!! $columns  !!}
            var url = {!! json_encode($url) !!}

            $('#' + id).DataTable({
                processing: true,
                serverSide: true,
                ajax: url,
                columns: columns,
            });
        })
    </script>
@endpush
