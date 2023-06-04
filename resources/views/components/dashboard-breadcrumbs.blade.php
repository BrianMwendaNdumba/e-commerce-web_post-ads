<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>

        @if (Request::segment(2))
            <li class="breadcrumb-item text-capitalize"><a
                    href="{{ url('dashboard') . '/' . Request::segment(2) }}">{{ Request::segment(2) }}</a></li>
        @endif
        {{-- Such a hack, use a package ffs --}}
    </ol>
</nav>
