<div class="container-xl">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb px-0">
                <ol class="breadcrumb bg-transparent px-0 py-1 mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-second" href="{{ route('home') }}">Home</a>
                    </li>
                    @foreach ($items as $item)
                        <li class="breadcrumb-item">
                            <a class="text-second" href="{{ $links[$loop->index] }}">{{ $item }}</a>
                        </li>
                    @endforeach
                    @if (@$lastItem)
                        <li class="breadcrumb-item active" aria-current="page">{{ $lastItem }}</li>
                    @endif
                </ol>
            </nav>
        </div>
    </div>
</div>
