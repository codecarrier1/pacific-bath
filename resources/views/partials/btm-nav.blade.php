<ul id="btm-nav" class="flex justify-between text-16 text-center content-center">
  <li><a id="prev-link" class="btn text-white font-bold bg-blue-00849c" href="{{ $prevLinkOverride ?? $prevLink }}"><i class="fa-angle-left"></i> Previous: <span class="ml-2 pointer-events-none">{{ $prevTextOverride ?? $prevText }}</span></a></li>
  <li id="save-finish-later" class="flex items-center"><a class="text-blue-00849c" href="{{ $salesRepDashRoute }}">Save &amp; Finish Later</a></li>
  @if (isset($services))
  <li id="change-service" class="flex items-center"><a class="text-blue-00849c" href="{{ $salesRepDashRoute }}">Change Service</a>
    <div class='service-switch'>
    @foreach ($services as $service)
      @if ($service->id === $lead->service_id)
        <a class='active' href="{{'/build-estimate/change-service/'.$lead->id.'/'.$service->id}}"> {{ $service->name }} </a>
      @else
        <a href="{{'/build-estimate/change-service/'.$lead->id.'/'.$service->id}}"> {{ $service->name }} </a>
      @endif
    @endforeach
    </div>
  </li>
  @endif
  <li><a id="next-link" class="btn text-white font-bold bg-blue-00849c @if(!$nextLink && !isset($nextLinkOverride)) opacity-0 pointer-events-none @endif" href="{{ $nextLinkOverride ?? $nextLink }}">Next: <span class="ml-2 pointer-events-none">{{ $nextTextOverride ?? $nextText }}</span> <i class="fa-angle-right"></i></a></li>
</ul>
