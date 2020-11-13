<ul class="breadcrumbs flex text-white pt-4 text-18 ml-6 text-20">
    @empty($breadcrumbs)
                <li><a href="{{ route('home') }}">Pacific Bath Company</a></li>
        @else
        @foreach($breadcrumbs as $breadcrumb)
            @if($loop->last)
                <li><a href="{{ $breadcrumb['route'] }}">{{ $breadcrumb['name'] }}</a></li>
            @else
                <li class="mr-4 font-bold"><a href="{{ $breadcrumb['route'] }}" class="mr-2">{{ $breadcrumb['name'] }}</a> /</li>
            @endif
        @endforeach
    @endempty
</ul>