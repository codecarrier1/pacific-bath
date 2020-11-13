<?php
/**
 * @var \App\Lead $lead
 */
?>@extends('layouts.app')

@section('content')
    @include('partials.main-nav')
    @include('partials.roll-sheet-sub-nav')
    <div class="px-16 pb-16">
        @foreach ($groupedItems as $categoryId => $items)
            <?php /** @var \App\QuoteItem[] $items */ ?>
            @foreach ($items as $item)
                @if ($loop->first)
                    <div class="pb-8">
                        <div class="pb-6 flex">
                            <h2 class="text-20 font-bold w-3/5">{{ $item->category_name }}</h2>
                            <div class="w-2/5 flex items-center">
                                <div class="w-1/2">
                                    <span>Color</span>
                                </div>
                                <div class="w-1/4 -ml-6 text-center">
                                    <span>Quantity</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="box-shadow bg-white p-12 rounded-lg mb-8 flex">
                            <div class="flex w-3/5 items-center">

                                @isset($item->image)
                                    <div class="mr-10 w-32 flex items-center">
                                        <img class="block max-w-full h-auto mx-auto" src="{{ $item->image }}" alt="">
                                    </div>
                                @endisset

                                <div>
                                    <h3 class="font-bold text-20">{{ $item->full_product_name }}</h3>

                                    @isset($item->sku)
                                        <dl class="text-gray-999 flex mb-5">
                                            <dt>Model #</dt>
                                            <dd>{{ $item->sku }}</dd>
                                        </dl>
                                    @endisset

                                    <dl class="params text-gray-333 flex">
                                        @if(!empty($item->size))
                                            <dt class="font-bold mr-2">Size:</dt>
                                            <dd class="mr-5">{{ $item->size }}</dd>
                                        @endif

                                        @isset($item->glass_color)
                                            @isset($item->glass_color['name'])
                                                <dt class="font-bold mr-2">@isset($item->size) <span class="text-gray-ddd mr-5">|</span> @endisset Glass:</dt>
                                                <dd class="mr-5">{{ $item->glass_color['name'] }}</dd>
                                            @endisset
                                        @endisset

                                        @isset($item->plumbing_position)
                                            <dt class="font-bold mr-2">@isset($item->glass_color) <span class="text-gray-ddd mr-5">|</span> @endisset Plumbing:</dt>
                                            <dd class="mr-5">{{ $item->plumbing_position }}</dd>
                                        @endisset
                                            @if(!empty($item->long_description))
{{--                                                <dt class="font-bold mr-2"></dt>--}}
                                                <dd class="mr-5">{{ $item->long_description }}</dd>
                                            @endif
                                    </dl>
                                </div>
                            </div>
                            <div class="w-2/5 flex text-center items-center">
                                <div class="w-1/2">
                                    <div class="flex items-center">
                                        @if(!empty($item->color) && !empty($item->color['url']) && !empty($item->color['name']))

                                            <span class="block flex-shrink-0 rounded-full color-holder"
                                                  style="background-image: url('{{ $item->color['url'] }}'); width:77px; height:77px;"></span>
                                            <span class="ml-6 font-bold">{{ $item->color['name'] }}</span>
                                        @else
                                            <span class="text-32 text-gray-333">N/A</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="w-1/4">
                                    <span class="text-32">{{ \App\Helpers\Math::getOptionalDecimal($item->quantity) }}</span>
                                </div>
                                <div class="w-1/4">
                                    <a class="text-blue-00849c"
                                       href="{{ route('build-estimate', [$lead, $stepMap[$categoryId] ?? 1]) }}">Edit</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
    </div>
    @include('partials.btm-nav')

@endsection
