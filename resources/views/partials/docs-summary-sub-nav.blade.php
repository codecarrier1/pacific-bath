<ul id="subnav" class="flex justify-between text-16 text-center mb-12">
  <li class="w-full @if(request()->route()->getName() === 'product.select') active @endif"><a class="text-gray-999" href="{{ $showerPansRoute ?? '' }}">1. Document Summary</a></li>
  <li class="w-full @if(request()->route()->getName() === 'product.select.walls') active @endunless"><a class="text-gray-999" href="{{ $wallsJointsTrimRoute ?? '' }}">2. Deposit Information</a></li>
</ul>