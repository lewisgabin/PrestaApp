{{-- navabar  --}}
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu
@if(isset($configData['navbarType'])){{$configData['navbarClass']}} @endif"
data-bgcolor="@if(isset($configData['navbarBgColor'])){{$configData['navbarBgColor']}}@endif">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
          @if (request()->is('sk-layout-1-column'))
          <ul class="nav navbar-nav nav-back">
            <li class="nav-item mobile-menu d-xl-none mr-auto">
              <a class="nav-link nav-menu-main hidden-xs font-small-3 d-flex align-items-center" href="{{asset('sk-layout-2-columns')}}">
                <i class="bx bx-left-arrow-alt"></i>Back
              </a>
            </li>
          </ul>
          @else
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu d-xl-none mr-auto">
              <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                <i class="ficon bx bx-menu"></i>
              </a>
            </li>
          </ul>
          @endif

          <ul class="nav navbar-nav bookmark-icons">
            
        </ul>
        <li class="nav-item d-none d-lg-block">
        <a href="/calculadora" type="button" class="" style="color: #475F7B;">
          <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Calculator.svg--><svg style="width:28px !important" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <rect fill="#000000" opacity="0.3" x="7" y="4" width="10" height="4"/>
                <path d="M7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,20 C19,21.1045695 18.1045695,22 17,22 L7,22 C5.8954305,22 5,21.1045695 5,20 L5,4 C5,2.8954305 5.8954305,2 7,2 Z M8,12 C8.55228475,12 9,11.5522847 9,11 C9,10.4477153 8.55228475,10 8,10 C7.44771525,10 7,10.4477153 7,11 C7,11.5522847 7.44771525,12 8,12 Z M8,16 C8.55228475,16 9,15.5522847 9,15 C9,14.4477153 8.55228475,14 8,14 C7.44771525,14 7,14.4477153 7,15 C7,15.5522847 7.44771525,16 8,16 Z M12,12 C12.5522847,12 13,11.5522847 13,11 C13,10.4477153 12.5522847,10 12,10 C11.4477153,10 11,10.4477153 11,11 C11,11.5522847 11.4477153,12 12,12 Z M12,16 C12.5522847,16 13,15.5522847 13,15 C13,14.4477153 12.5522847,14 12,14 C11.4477153,14 11,14.4477153 11,15 C11,15.5522847 11.4477153,16 12,16 Z M16,12 C16.5522847,12 17,11.5522847 17,11 C17,10.4477153 16.5522847,10 16,10 C15.4477153,10 15,10.4477153 15,11 C15,11.5522847 15.4477153,12 16,12 Z M16,16 C16.5522847,16 17,15.5522847 17,15 C17,14.4477153 16.5522847,14 16,14 C15.4477153,14 15,14.4477153 15,15 C15,15.5522847 15.4477153,16 16,16 Z M16,20 C16.5522847,20 17,19.5522847 17,19 C17,18.4477153 16.5522847,18 16,18 C15.4477153,18 15,18.4477153 15,19 C15,19.5522847 15.4477153,20 16,20 Z M8,18 C7.44771525,18 7,18.4477153 7,19 C7,19.5522847 7.44771525,20 8,20 L12,20 C12.5522847,20 13,19.5522847 13,19 C13,18.4477153 12.5522847,18 12,18 L8,18 Z M7,4 L7,8 L17,8 L17,4 L7,4 Z" fill="#000000"/>
            </g>
        </svg><!--end::Svg Icon--></span>
        <span>Calculadora</span>
        </a>
      </li>
        </div>
        <ul class="nav navbar-nav float-right">
    
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
          <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon bx bx-search"></i></a>
            <div class="search-input">
              <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
              <input class="input" type="text" placeholder="Explore Frest..." tabindex="-1" data-search="starter-list">
              <div class="search-input-close"><i class="bx bx-x"></i></div>
              <ul class="search-list"></ul>
            </div>
          </li>
          <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 new Notification</span><span class="text-bold-400 cursor-pointer">Mark all as read</span></div>
              </li>
              <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Congratulate Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15 12:32pm</small>
                    </div>
                  </div></a>
                <div class="d-flex justify-content-between read-notification cursor-pointer">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-16.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">New Message</span> received</h6><small class="notification-text">You have 18 unread messages</small>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between cursor-pointer">
                  <div class="media d-flex align-items-center py-0">
                    <div class="media-left pr-0"><img class="mr-1" src="{{asset('images/icon/sketch-mac-icon.png')}}" alt="avatar" height="39" width="39"></div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Updates Available</span></h6><small class="notification-text">Sketch 50.2 is currently newly added</small>
                    </div>
                    <div class="media-right pl-0">
                      <div class="row border-left text-center">
                        <div class="col-12 px-50 py-75 border-bottom">
                          <h6 class="media-heading text-bold-500 mb-0">Update</h6>
                        </div>
                        <div class="col-12 px-50 py-75">
                          <h6 class="media-heading mb-0">Close</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between cursor-pointer">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content text-primary font-medium-2">LD</span></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">New customer</span> is registered</h6><small class="notification-text">1 hrs ago</small>
                    </div>
                  </div>
                </div>
                <div class="cursor-pointer">
                  <div class="media d-flex align-items-center justify-content-between">
                    <div class="media-left pr-0">
                      <div class="media-body">
                        <h6 class="media-heading">New Offers</h6>
                      </div>
                    </div>
                    <div class="media-right">
                      <div class="custom-control custom-switch">
                        <input class="custom-control-input" type="checkbox" checked id="notificationSwtich">
                        <label class="custom-control-label" for="notificationSwtich"></label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between cursor-pointer">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar bg-danger bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content"><i class="bx bxs-heart text-danger"></i></span></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Application</span> has been approved</h6><small class="notification-text">6 hrs ago</small>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between read-notification cursor-pointer">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-4.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">New file</span> has been uploaded</h6><small class="notification-text">4 hrs ago</small>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between cursor-pointer">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar bg-rgba-danger m-0 mr-1 p-25">
                        <div class="avatar-content"><i class="bx bx-detail text-danger"></i></div>
                      </div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Finance report</span> has been generated</h6><small class="notification-text">25 hrs ago</small>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between cursor-pointer">
                  <div class="media d-flex align-items-center border-0">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-16.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">New customer</span> comment recieved</h6><small class="notification-text">2 days ago</small>
                    </div>
                  </div>
                </div>
              </li>
              <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-user nav-item" id="dropdownUser">
            <a class="dropdown-toggle nav-link dropdown-user-link"  href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name">{{Auth::user()->nombre}} </span>
                <span class="user-status text-muted">{{Auth::user()->apellido}} </span>
              </div>
              <span><img class="round" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pb-0">
              <a class="dropdown-item" href="#">
                <i class="bx bx-user mr-50"></i> Edit Profile
              </a>
             
          
              <div class="dropdown-divider mb-0"></div>
              <router-link :to="'/logoutt'" class="dropdown-item"><i class="bx bx-power-off mr-50"></i> Salir</router-link>
             
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
