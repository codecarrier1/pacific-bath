<ul id="subnav" class="flex justify-between text-16 text-center mb-12">
    @foreach($productCategories as $productCategory)
        <li class="w-full @if($loop->index + 1 == $currentStep) active @endif"><a class="text-gray-999" href="{{ route('build-estimate', ['lead' => $lead, 'step' => $loop->index + 1]) }}">{{ $loop->index + 1 }}. {{ $productCategory->name }}</a></li>
    @endforeach
</ul>
