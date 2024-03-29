<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns
@if($configData['isMenuCollapsed'] == true){{'menu-collapsed'}}@endif
@if($configData['theme'] === 'dark'){{'dark-layout'}} @elseif($configData['theme'] === 'semi-dark'){{'semi-dark-layout'}} @else {{'light-layout'}} @endif
@if($configData['isContentSidebar'] === true) {{'content-left-sidebar'}} @endif @if(isset($configData['navbarType'])){{$configData['navbarType']}}@endif
@if(isset($configData['footerType'])) {{$configData['footerType']}} @endif
{{$configData['bodyCustomClass']}}
@if($configData['mainLayoutType'] === 'vertical-menu-boxicons'){{'boxicon-layout'}}@endif
@if($configData['isCardShadow'] === false) {{'no-card-shadow'}} @endif"
@if (!Auth::check())style="background:url('img/auth-bg.jpg') no-repeat
center center !important;    overflow: hidden;" @endif
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-framework="laravel" >
<div id="app" style="    min-height: calc(100% - 3.5rem);">
  <!-- BEGIN: Header-->
  @yield('login')
  
  @if (Auth::check())
  @include('panels.navbar')
  <!-- END: Header-->

  <!-- BEGIN: Main Menu-->
  @yield('sidebar2')
  <!-- END: Main Menu-->

  <!-- BEGIN: Content-->
  <div class="app-content content" >
  {{-- Application page structure --}}
	@if($configData['isContentSidebar'] === true)
		<div class="content-area-wrapper">
			<div class="sidebar-left">
				<div class="sidebar">
					@yield('sidebar-content')
       


				</div>
			</div>
			<div class="content-right">
          <div class="content-overlay"></div>
				<div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
            @yield('content')
          </div>
        </div>
			</div>
		</div>
	@else
    {{-- others page structures --}}
    <div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
        @if($configData['pageHeader']=== true && isset($breadcrumbs))
          @include('panels.breadcrumbs')
        @endif
			</div>
			<div class="content-body">
				@yield('content')
			</div>
		</div>
	@endif
  </div>
  @endif
  <!-- END: Content-->
</div>
  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  @if (Auth::check())
  <!-- BEGIN: Footer-->
    @include('panels.footer')
  <!-- END: Footer-->
@endif
  @include('panels.scripts')

</body>
<!-- END: Body-->
