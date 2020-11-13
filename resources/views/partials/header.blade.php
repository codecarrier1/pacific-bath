<div id="header" class="px-20 py-8 flex justify-between mb-16">
  <div class="flex">
    <a class="flex items-center" href="{{ route('home') }}">
      <img src="{{ asset('images/svg/logo.svg') }}" alt="Pacific Bath Company" width="52" height="43">
    </a>
  @include('partials.breadcrumbs')
  </div>
  <div class="flex items-center">
    @livewire('notifications')
    <div class="ml-12 relative" id="account-drop-holder">
      <span class="block cursor-pointer" id="account-drop-opener">
        {!! auth()->user()->getAvatar() !!}
        <i class="fa-angle-down text-white text-18 ml-2 mt-2 inline-block"></i>
      </span>
      <div id="account-drop" class="absolute right-0 whitespace-no-wrap pt-4 hidden">
        <ul class="rounded-lg bg-white box-shadow">
          <li class="font-bold px-8 py-4">{{ auth()->user()->full_name }}</li>
          @can('view_nova')
            <li><a class="text-blue-00849c hover:bg-blue-e5f2f5 block px-8 py-4 rounded-b-lg" href="{{  config('nova.url') . config('nova.path') }}">Nova Admin</a></li>
          @endcan
           <li><a class="text-blue-00849c hover:bg-blue-e5f2f5 block px-8 py-4" href="{{ route('logout') }}">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>


