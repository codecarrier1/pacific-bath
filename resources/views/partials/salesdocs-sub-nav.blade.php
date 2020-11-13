<ul id="subnav" class="flex justify-between text-16 text-center mb-12 text-gray-999">
  <li class="w-full @if(request()->route()->getName() === 'sales.documents.summary') active @endif"><a class="text-gray-999" href="{{ route('sales.documents.summary', $lead) }}">1. Document Summary</a></li>
  <li class="w-full @if(request()->route()->getName() === 'sales.payment') active @endif"><a class="text-gray-999" href="{{ route('sales.payment', $lead) }}">2. Deposit Information</a></li>
</ul>
