
    <!-- Secondary Navigation
    ============================================= -->
    <div class="bg-secondary">
      <div class="container">
        <ul class="nav secondary-nav">
          <li class="nav-item"> 
            <a class="nav-link {{GeneralHelper::isActiveMenu('rodashboard')}}" href="{{route('rodashboard')}}">
              <span><i class="fas fa-home"></i></span> Dashboard</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            {{GeneralHelper::isActiveMenu('myreport')}}
            {{GeneralHelper::isActiveMenu('rorechargesreport')}}

            " href="{{route('myreport')}}">
              <span><i class="fas fa-chart-line"></i></span>My Report</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            {{GeneralHelper::isActiveMenu('robankaccountlist')}}
            {{GeneralHelper::isActiveMenu('romoneytransfer')}}
            {{GeneralHelper::isActiveMenu('roaddaccount')}}
         
            " href="{{route('romoneytransfer')}}">
              <span><i class="fas fa-rupee-sign"></i></span>Money Transfer</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            {{GeneralHelper::isActiveMenu('ropushbalance')}}
            {{GeneralHelper::isActiveMenu('rotxncreditsuccess')}}
            " href="{{route('ropushbalance')}}">
              <span><i class="fas fa-retweet"></i></span>Push Balance</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            {{GeneralHelper::isActiveMenu('wallet')}}
            {{GeneralHelper::isActiveMenu('rotatrechargeesybuz')}}
            {{GeneralHelper::isActiveMenu('roconfirmrecharge')}}
            " href="{{route('rotatrechargeesybuz')}}">
              <span><i class="fas fa-wallet"></i></span>Tatkal Recharge</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link {{GeneralHelper::isActiveMenu('writeus')}}" href="{{route('writeus')}}">
              <span><i class="fas fa-envelope"></i></span> Write Us</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link {{GeneralHelper::isActiveMenu('help')}}" href="{{route('help')}}">
              <span><i class="fas fa-life-ring"></i></span> Help</a> 
          </li>
         <!--  <li class="nav-item pull-right" style="float:right; margin-left:80px; color: #FFF"> 
            <a class="nav-link" href="#" style="font-size: 18px;color: #FFF;padding-top: 20px;">
              <span  style="font-size:18px;"><i class="fas fa-wallet"></i>&nbsp;Balance&nbsp;{{GeneralHelper::getWalletBalance()}}</span></a>  
          </li> -->
        </ul>
      </div>
    </div>
    <!-- Secondary Navigation end -->
