
    <!-- Secondary Navigation
    ============================================= -->
    <div class="bg-secondary">
      <div class="container">
        <ul class="nav secondary-nav">
          <li class="nav-item"> 
            <a class="nav-link {{GeneralHelper::isActiveMenu('dashboard')}}" href="{{route('dashboard')}}">
              <span><i class="fas fa-home"></i></span> Dashboard</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            {{GeneralHelper::isActiveMenu('addretailer')}} 
            {{GeneralHelper::isActiveMenu('retaileraddress')}} 
            {{GeneralHelper::isActiveMenu('personaldetails')}} 
            {{GeneralHelper::isActiveMenu('documentproof')}} 
            {{GeneralHelper::isActiveMenu('viewrodetails')}} 
            {{GeneralHelper::isActiveMenu('allretailerlist')}} 
            {{GeneralHelper::isActiveMenu('roprofile')}} 
            {{GeneralHelper::isActiveMenu('rocompanyprofile')}} 
            {{GeneralHelper::isActiveMenu('setcommission')}} 
            {{GeneralHelper::isActiveMenu('editusercommission')}} 
            {{GeneralHelper::isActiveMenu('retailercompany')}}" 

            href="{{route('allretailerlist')}}">
              <span><i class="fas fa-users"></i></span>RO</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link {{GeneralHelper::isActiveMenu('dsmyreport')}}" href="{{route('dsmyreport')}}">
              <span><i class="fas fa-chart-line"></i></span>My Report</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            {{GeneralHelper::isActiveMenu('verifytransfer')}}
            {{GeneralHelper::isActiveMenu('pushbalancenow')}}
            {{GeneralHelper::isActiveMenu('pushbalance')}}
            {{GeneralHelper::isActiveMenu('txncreditsuccess')}}
           
            " href="{{route('pushbalance')}}">
              <span><i class="fas fa-retweet"></i></span>Push Balance-RO</a>
          </li>
      <!--     <li class="nav-item"> 
            <a class="nav-link 
            {{GeneralHelper::isActiveMenu('moneytransfer')}}
            {{GeneralHelper::isActiveMenu('bankaccountlist')}}
            " href="{{route('moneytransfer')}}">
              <span><i class="fas fa-university"></i></span>Money Transfer</a>
          </li> -->
          <li class="nav-item"> 
            <a class="nav-link 
            {{GeneralHelper::isActiveMenu('allbalancerequest')}}
            {{GeneralHelper::isActiveMenu('wallet')}}
             {{GeneralHelper::isActiveMenu('balancerequest')}}" href="{{route('balancerequest')}}">
              <span><i class="fas fa-wallet"></i></span> Balance Request</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link {{GeneralHelper::isActiveMenu('tatrechargeesybuz')}}" href="{{route('tatrechargeesybuz')}}">
              <span><i class="fas fa-rupee-sign"></i></span> Tatkal Recharge</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link {{GeneralHelper::isActiveMenu('help')}}" href="{{route('dashboard')}}">
              <span><i class="fas fa-life-ring"></i></span> Help</a> 
          </li>
        </ul>
      </div>
    </div>
    <!-- Secondary Navigation end -->
