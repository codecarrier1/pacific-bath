<div class="px-16 pb-16 pt-4" xmlns:wire="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
    <div class="flex box-shadow rounded-10 overflow-hidden">
        <div class="w-3/5">
            <div class="pb-24">
                <h2 class="pt-8 pl-16 pb-4 font-bold text-32 text-gray-333">
               @if($isFinanced)
                    Payment Option: <span class="font-light">{{ $selectedNumberOfMonths }} Months</span>
                @else
                   Cash Payment
                @endif
                </h2>
                <div class="text-18 text-gray-333">

                    <dl class="border-solid border-t border-gray-dcdcdc flex justify-between px-16 py-3 items-center">
                        <dt class="font-bold py-5">Down Payment:</dt>
                        <dd>
                            <input type="text" wire:change="setDeposit($event.target.value)" class="payment-field text-gray-666 text-right bg-gray-f2f2f2 rounded-10 py-3 px-8 border-solid border-2 border-gray-e5e5e5 font-bold" value="${{ number_format($deposit, 2) }}"
                            @if($paymentOptionSaved) readonly @endif
                            >
                        </dd>
                    </dl>

                    @if($isFinanced)
                       @include('livewire.partials.interest-rate')
                        @include('livewire.partials.term')
                    @endif

                    <dl class="border-solid border-t border-gray-dcdcdc flex justify-between px-16 py-3 items-center">
                        <dt class="font-bold py-5">Retail Price:</dt>
                        <dd><span class="text-gray-666">${{ number_format($total, 2) }}</span></dd>
                    </dl>
                </div>
            </div>

            <div>
                <h2 class="pt-8 pl-16 pb-4 font-bold text-32 text-gray-333">Promotional Options:</h2>
                <div class="text-18 text-gray-333">
                    <dl class="border-solid border-t border-gray-dcdcdc flex justify-between px-16 py-3 items-center">
                        <dt class="font-bold py-5">30 Day Promotion:</dt>
                        <dd>
                            <div class="relative bg-gray-f2f2f2 border-solid border-2 border-gray-e5e5e5 rounded-10">
                                <select @if($paymentOptionSaved) disabled @endif class="relative z-10 custom-select bg-transparent border-box cursor-pointer text-gray-666 appearance-none block py-3 px-8 font-bold" wire:click="setSelectedPromotion($event.target.value)">
                                    <option value="default">Select a Promotion</option>
                                    @foreach($promotions as $promotion)
                                    <option value="{{ $promotion->id }}" @if($promotion->id === optional($selectedPromotion)->id) selected @endif>{{ $promotion->name }}</option>
                                    @endforeach
                                </select>
                                <i class="absolute right-0 top-0 fa-chevron-down text-14 mr-4 mt-6"></i>
                            </div>
                        </dd>
                    </dl>

                    <dl class="border-solid border-t border-gray-dcdcdc flex justify-between px-16 py-3 items-center">
                        <dt class="font-bold py-5">Veterans Discount:</dt>
                        <dd style="min-width:280px;" id="veterans-discount" class="font-bold text-18 text-gray-666 text-center flex">
                            <span class="w-1/2 cursor-pointer border-solid border-2
                                @if($veteransDiscountEnabled) active border-blue-00849c bg-blue-00849c text-white @else border-gray-e5e5e5 bg-gray-f2f2f2 @endif
                                    rounded-l-10 py-3 px-16
                         @if($paymentOptionSaved) cursor-not-allowed pointer-events-none @else cursor-pointer @endif"
                                  wire:click="setVeteransDiscount(1)"
                            >Yes</span>
                            <span class="w-1/2 cursor-pointer border-solid border-2
                            @if(!$veteransDiscountEnabled) active border-blue-00849c bg-blue-00849c text-white @else border-gray-e5e5e5 bg-gray-f2f2f2 @endif
                                    rounded-r-10 py-3 px-16
                            @if($paymentOptionSaved) cursor-not-allowed pointer-events-none @else cursor-pointer @endif"
                     wire:click="setVeteransDiscount(0)">No</span>
                        </dd>
                    </dl>

                    <dl class="border-solid border-t border-gray-dcdcdc flex justify-between px-16 py-3 items-center">
                        <dt class="font-bold py-5">Additional Discounts:</dt>
                        <dd>
                            <input @if($paymentOptionSaved) readonly @endif
                                type="text"
                                   class="payment-field text-gray-666 text-right  bg-gray-f2f2f2 rounded-10 py-3 px-8 border-solid border-2 border-gray-e5e5e5 font-bold"
                                   wire:change="setAdditionalDiscounts($event.target.value)"
                            >
                        </dd>
                    </dl>

                    <dl class="border-solid border-t border-gray-dcdcdc flex justify-between px-16 py-3 items-center">
                        <dt class="font-bold py-5">Net Price:</dt>
                        <dd>
                            @if($this->netTotal < $total)
                                <span class="text-red-d91a1a line-through mr-2">${{ number_format($total, 2) }}</span>
                            @endif
                            <span class="text-blue-055565 font-bold">${{ number_format($this->netTotal, 2) }}</span>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="w-2/5 border-box gradient flex flex-col px-6 py-32 text-white text-center justify-center">
            <div style="min-height:27.5rem;" class="flex flex-col justify-center">
                @if($isFinanced)
                <span class="text-72 font-light">${{ number_format($this->monthlyPayment) }}/mo</span>
                    <span class="text-gray-999 italic font-light text-18">{{ $selectedNumberOfMonths }} Months <span class="mx-4">|</span> {{ $selectedInterestRate }} APR</span>
                @else
                    <span class="text-72 font-light">${{ number_format($this->netTotal) }}</span>
                    <span class="text-30 font-light">Retail Price - ${{ number_format($total) }}</span>
                @endif

               @if($deposit) <span class="text-gray-999 italic font-light text-18">Deposit: ${{ number_format($deposit, 2) }}</span>@endif
            </div>
            <ul class="text-24 mx-auto text-left">
               @if($totalDiscounts)
                    <li><span class="fa-check-1 mr-2"></span> ${{ number_format( $totalDiscounts) }}  in promotional savings</li>
                @endif
                @if($isFinanced)
                   <li><span class="fa-check-1 mr-2"></span> {{ $selectedNumberOfMonths }} Months fixed fee</li>
                   @endif
                <li><span class="fa-check-1 mr-2"></span> 10 year warranty</li>
            </ul>
            @if($isFinanced)
            <small>{{ $financeOption->institution . ' ' . $financeOption->name }}</small>
            @endif
            @if($paymentOptionSaved)
                <span class="text-72"><i class="fa fa-check-circle"></i></span>
                <p>Payment Option Saved!</p>
                <a class="text-11" href="#" wire:click="$toggle('paymentOptionSaved')">Select different option</a>
                @else
            <button style="max-width:32rem;" wire:click="savePaymentOption" class="cursor-pointer w-full rounded-10 leading-tight py-8 px-4 mt-auto mx-auto font-bold bg-blue-00849c" id="select-payment-option">Select Payment Option</button>
                @endif
        </div>
    </div>
</div>
<script>
  /**
   * Original idea found here: https://codepen.io/vanecendales/pen/ZEYOgWw
   */
  let startX
  let startY
  let endX
  let endY
  let threshold = 300; //this sets the minimum swipe distance, to avoid noise and to filter actual swipes from just moving fingers

  //Function to handle swipes
  function handleTouch(start,end, leftSwipeCallback, rightSwipeCallback){
    const distance = endX - startX;

    // do not trigger the callbacks if the swipe is too small
    if(Math.abs(distance) < threshold){
      return false
    }
    // Distance will be a negative number if left
    if(distance < 0){
      leftSwipeCallback();
      // or a positive number if right
    }else{
      rightSwipeCallback();
    }
  }

  //writing the callback fn()
  const left = () =>{
    @this.set('isFinanced', false)
  }
  const right = () =>{
    @this.set('isFinanced', true)
  }


  window.onload = () => {
    window.addEventListener('touchstart', function(event){
      startX = event.touches[0].clientX;
      startY = event.touches[0].clientY;
    })

    window.addEventListener('touchend', function(event){
      endX = event.changedTouches[0].clientX;
      endY = event.changedTouches[0].clientY;
      handleTouch(startX, endX, left, right)

    })
  }

  window.addEventListener('beforeunload', function (e) {

    if(!@this.get('paymentOptionSaved')){
      e.preventDefault(); // If you prevent default behavior in Mozilla Firefox prompt will always be shown
      // Chrome requires returnValue to be set
      e.returnValue = 'You have unsaved changes'
    }

  });


</script>