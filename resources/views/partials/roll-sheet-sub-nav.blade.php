<ul id="subnav" class="flex justify-between text-16 text-center mb-12 text-gray-999">
  <li class="w-full @if(request()->route()->getName() === 'roll.sheet.summary') active @endif"><a class="text-gray-999" href="{{ route('roll.sheet.summary', $lead) }}">1. Order Summary</a></li>
  <li class="w-full @if(request()->route()->getName() === 'roll.sheet.product.info') active @endif"><a class="text-gray-999" href="{{ route('roll.sheet.product.info', $lead) }}">2. Product Information</a></li>
  <li class="w-full @if(request()->route()->getName() === 'roll-sheet.payment-options') active @endif"><a class="text-gray-999" href="{{ route('roll-sheet.payment-options', $lead)  }}">3. Payment Options</a></li>
</ul>
