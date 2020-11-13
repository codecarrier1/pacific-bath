<ul id="subnav" class="flex justify-between text-16 text-center mb-12">
  <li class="w-full @if(request()->route()->getName() === 'product.select') active @endif"><a class="text-gray-999" href="{{ $showerPansRoute ?? '' }}">1. Shower Pans</a></li>
  <li class="w-full @if(request()->route()->getName() === 'product.select.walls') active @endunless"><a class="text-gray-999" href="{{ $wallsJointsTrimRoute ?? '' }}">2. Walls, Joints &amp; Trim</a></li>
  <li class="w-full @if(request()->route()->getName() === 'product.select.fixtures') active @endif"><a class="text-gray-999" href="{{ $fixturesAccessoriesRoute ?? '' }}">3. Fixtures &amp; Accessories</a></li>
  <li class="w-full @if(request()->route()->getName() === 'product.select.door') active @endif"><a class="text-gray-999" href="{{ $selectADoorRoute ?? '' }}">4. Select a Door</a></li>
  <li class="w-full @if(request()->route()->getName() === 'product.select.construction') active @endunless"><a class="text-gray-999" href="{{ $constructionAdditionsRoute ?? '' }}">5. Construction &amp; Additions</a></li>
</ul>