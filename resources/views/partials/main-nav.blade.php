<ul id="mainnav" class="-mt-16 flex text-center text-16 justify-between">
  <li class="w-full @if(request()->route()->getPrefix() === '/needs-analysis') active @endif"><a href="{{ $needsAnalysisRoute }}"><i class="fa-pencil-ruler"></i> Needs Analysis</a></li>
  <li class="w-full @if(request()->route()->getName() === 'build-estimate') active @endif"><a href="{{ $buildEstimateRoute }}"><i class="fa-clipboard-list"></i> Build Estimate</a></li>
  <li class="w-full @if(request()->route()->getPrefix() === '/roll-sheet') active @endif"><a href="{{ $rollSheetRoute }}"><i class="fa-list-alt"></i> Roll Sheet</a></li>
  <li class="w-full @if(request()->route()->getPrefix() === '/sales-documentation') active @endif"><a href="{{ $salesDocumentationRoute }}"><i class="fa-file-invoice-dollar"></i> Sales Documentation</a></li>
</ul>
