
{{--<div class="card-tools">--}}
{{--                                <ul class="pagination pagination-sm">--}}
{{--                                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>--}}
{{--                                    <li class="page-item"><a href="#" class="page-link">1</a></li>--}}
{{--                                    <li class="page-item"><a href="#" class="page-link">2</a></li>--}}
{{--                                    <li class="page-item"><a href="#" class="page-link">3</a></li>--}}
{{--                                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}

@if ($paginator->hasPages())
    <ul class="pagination pagination-sm">

        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">← Önceki</span></li>
        @else
            <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link"  rel="prev">← Previous</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class=" page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active my-active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">Sonraki →</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Next →</span></li>
        @endif
    </ul>
@endif
