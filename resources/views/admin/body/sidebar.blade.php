<aside class="left-sidebar" data-sidebarbg="skin5">
    


    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('client_onboarding')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">OnBoarding</span></a>
                </li>
                
                

               @if($login_row->progress_status==4&&$login_row->remark_status==0)
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard',0)}}" aria-expanded="false"><i class="mdi mdi-plus-box"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('newallocation')}}" aria-expanded="false"><i class="mdi mdi-plus-box"></i></i><span class="hide-menu">New Allocation </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('wallet')}}" aria-expanded="false"><i class="mdi mdi-wallet"></i><span class="hide-menu">Wallet </span></a>
                </li>
                
                      {{--
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Report</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('clientreports',3)}}" class="sidebar-link"><i class="mdi mdi-check-circle"></i><span class="hide-menu">Report Prepared</span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Profile</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="authentication-login.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Login </span></a></li>
                        <li class="sidebar-item"><a href="authentication-register.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Register </span></a></li>
                    </ul>
                </li>
                
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cash-multiple"></i><span class="hide-menu">Add User</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('adduser')}}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Approved </span></a></li>
                        <li class="sidebar-item"><a href="{{route('adduser')}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Rejected </span></a></li>
                        <li class="sidebar-item"><a href="{{route('adduser')}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Pending </span></a></li>
                    </ul>
                </li>
                      --}}
                  <li class="sidebar-item">
                       <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('invoice',1)}}" aria-expanded="false"><i class="mdi mdi-wallet"></i><span class="hide-menu">Invoice </span></a>
                 </li> 
                      
                  @endif
                 
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>