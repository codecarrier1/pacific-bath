<ul id="subnav" class="flex justify-between text-16 text-center mb-12">
  <li class="w-full @if(request()->route()->getName() === 'discovery.questions') active @endif"><a class="text-gray-999" href="{{ $discoveryRoute ?? '' }}">1. Discovery Questions</a></li>
  <li class="w-full @if(request()->route()->getName() === $secondRouteName) active @endif"><a class="text-gray-999" href="{{ $secondRoute ?? '' }}">2. {{ $secondText ?? '' }}</a></li>
    <li class="w-full @if(request()->route()->getName() === 'needs.analysis.scope.of.work') active @endif"><a class="text-gray-999" href="{{ $scopeRoute ?? '' }}">3. Scope of Work</a></li>
</ul>
