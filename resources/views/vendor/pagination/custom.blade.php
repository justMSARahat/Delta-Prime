
@if ($paginator->hasPages())

    <ul class="pager">

        @if ($paginator->onFirstPage())
            <li class="disabled pag_border"><i class="fal fa-angle-left"></i></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fal fa-angle-left"></i></a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled pag_border"><a href=""><span>{{ $element }}</span></a></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><a><span>{{ $page }}</span></a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fal fa-angle-right"></i></a></li>
        @else
            <li class="disabled pag_border"><i class="fal fa-angle-right"></i></li>
        @endif
    </ul>
@endif
