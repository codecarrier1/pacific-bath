<dl class="border-solid border-t border-gray-dcdcdc flex justify-between px-16 py-3 items-center">
    <dt class="font-bold py-5">Term:</dt>
    <dd>
        <div class="relative bg-gray-f2f2f2 border-solid border-2 border-gray-e5e5e5 rounded-10">
            <select @if($paymentOptionSaved) disabled @endif class="relative z-10 custom-select bg-transparent border-box cursor-pointer text-gray-666 appearance-none block py-3 px-8 font-bold" wire:change="setSelectedNumberOfMonths($event.target.value)">
                <option value="reset">Reset options</option>
                @foreach($terms as $term)
                    <option value="{{ $term }}" @if($term == $selectedNumberOfMonths) selected @endif>{{ $term . " Months" }}</option>
                @endforeach
            </select>
            <i class="absolute right-0 top-0 fa-chevron-down text-14 mr-4 mt-4"></i>
        </div>
    </dd>
</dl>