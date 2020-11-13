<dl class="border-solid border-t border-gray-dcdcdc flex justify-between px-16 py-3 items-center">
    <dt class="font-bold py-5">Interest Rate:</dt>
    <dd style="min-width:280px;" id="interest-rate" class="font-bold text-18 text-gray-666 text-center flex">
        @foreach($rates as $rate)
            <span class="@if($loop->first) rounded-l-10 @endif @if($loop->last) rounded-r-10 @endif
            @if($rate == $selectedInterestRate) active border-blue-00849c bg-blue-00849c text-white @else border-gray-e5e5e5 bg-gray-f2f2f2 @endif
                    active w-1/2 border-box  border-solid border-2 border-l-0  py-3 px-16 @if($paymentOptionSaved) cursor-not-allowed pointer-events-none @else cursor-pointer @endif"
                  wire:click="setSelectedInterestRate($event.target.innerText)"

            >{{ $rate }}%</span>
        @endforeach
    </dd>
</dl>