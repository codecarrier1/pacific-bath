@extends('layouts.app')

@section('content')
  @include('partials.main-nav')
  @include('partials.roll-sheet-sub-nav')

  <div class="px-16 pb-16">
    <h2 class="text-32 text-gray-333 font-bold text-center mb-12">Select a Payment Option</h2>
    <div class="flex justify-between">
    
      <div class="box-shadow bg-white rounded-lg w-flex1/3">
        <div class="flex text-center flex-col justify-center font-light border-solid border-b border-gray-dcdcdc relative" style="height:287px;">
          <span class="text-54 text-blue-0c839b mt-12">$399/mo</span>
          <span class="text-gray-999 italic">for first 12 months</span>
        </div>
        <dl class="justify-center flex text-18 text-gray-666 border-solid border-b border-gray-dcdcdc py-5">
          <dt class="font-bold mr-2">Minimum Down Payment:</dt>
          <dd class="font-light">$1,000</dd>
        </dl>
        <dl class="justify-center flex text-18 text-gray-666 border-solid border-b border-gray-dcdcdc py-5">
          <dt class="font-bold mr-2">Interest Rate:</dt>
          <dd class="font-light">0% for first 12 months</dd>
        </dl>
        <dl class="justify-center flex text-18 text-gray-666 border-solid border-b border-gray-dcdcdc py-5">
          <dt class="font-bold mr-2">Term:</dt>
          <dd class="font-light">12 months</dd>
        </dl>
        <div class="px-14 py-16">
          <a class="block bg-blue-00849c text-white font-bold text-center rounded-lg py-8" style="line-height:20px;" href="">View Details</a>
        </div>
      </div>

      <div class="box-shadow bg-white rounded-lg w-flex1/3">
        <div class="flex text-center flex-col justify-center font-light border-solid border-b border-gray-dcdcdc relative" style="height:287px;">
          <span class="uppercase text-blue-0c839b font-bold absolute w-full text-center" style="top:30px">most popular</span>
          <span class="text-54 text-blue-0c839b mt-12">$499/mo</span>
          <span class="text-gray-999 italic">for 60 months</span>
        </div>
        <dl class="justify-center flex text-18 text-gray-666 border-solid border-b border-gray-dcdcdc py-5">
          <dt class="font-bold mr-2">Minimum Down Payment:</dt>
          <dd class="font-light">$1,000</dd>
        </dl>
        <dl class="justify-center flex text-18 text-gray-666 border-solid border-b border-gray-dcdcdc py-5">
          <dt class="font-bold mr-2">Interest Rate:</dt>
          <dd class="font-light">4.99% - 6.99%</dd>
        </dl>
        <dl class="justify-center flex text-18 text-gray-666 border-solid border-b border-gray-dcdcdc py-5">
          <dt class="font-bold mr-2">Term:</dt>
          <dd class="font-light">60 months</dd>
        </dl>
        <div class="px-14 py-16">
          <a class="block bg-blue-00849c text-white font-bold text-center rounded-lg py-8" style="line-height:20px;" href="">View Details</a>
        </div>
      </div>

      <div class="box-shadow bg-white rounded-lg w-flex1/3">
        <div class="flex text-center flex-col justify-center font-light border-solid border-b border-gray-dcdcdc relative" style="height:287px;">
          <span class="text-54 text-blue-0c839b mt-12">$599/mo</span>
          <span class="text-gray-999 italic">for 120 months</span>
        </div>
        <dl class="justify-center flex text-18 text-gray-666 border-solid border-b border-gray-dcdcdc py-5">
          <dt class="font-bold mr-2">Minimum Down Payment:</dt>
          <dd class="font-light">$1,000</dd>
        </dl>
        <dl class="justify-center flex text-18 text-gray-666 border-solid border-b border-gray-dcdcdc py-5">
          <dt class="font-bold mr-2">Interest Rate:</dt>
          <dd class="font-light">6.99%</dd>
        </dl>
        <dl class="justify-center flex text-18 text-gray-666 border-solid border-b border-gray-dcdcdc py-5">
          <dt class="font-bold mr-2">Term:</dt>
          <dd class="font-light">120 months</dd>
        </dl>
        <div class="px-14 py-16">
          <a class="block bg-blue-00849c text-white font-bold text-center rounded-lg py-8" style="line-height:20px;" href="">View Details</a>
        </div>
      </div>
    </div>
  </div>

@endsection