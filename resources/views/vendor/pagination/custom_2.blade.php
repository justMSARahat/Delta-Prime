
@if ($paginator->hasPages())

{{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">»</a></li> --}}

<ul class="pagination pagination-sm m-0 float-right">

    @if ($paginator->onFirstPage())
        <li class="disabled page-item"><a class="page-link" href="#">«</a></li>

    @else
        <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a></li>
    @endif



    @foreach ($elements as $element)

        @if (is_string($element))
            <li class="disabled page-item"><a class="page-link" href="#">{{ $element }}</a></li>
        @endif



        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active page-item"><a class="page-link" href="#">{{ $page }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach



    @if ($paginator->hasMorePages())
        <li class="page-item"><a class="page-link" {{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
    @else
        <li class="disabled page-item"><a class="page-link" href="#">»</a></li>
    @endif
</ul>
@endif
