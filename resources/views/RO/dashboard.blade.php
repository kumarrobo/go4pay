
@extends('layouts.defaultRODashboard')

@section('content')

<section class="containers">
<div class="bg-light shadow-md rounded p-4">


            <!-- Personal Information
          ============================================= -->
             <div class="row">
              <div class="col-lg-6">
              <h5 style="padding-bottom: 1px; margin-bottom: 1px;">{{ __('Welcome Back,') }}&nbsp;{{ Auth::user()->name }}</h5>
              <small>You have logged from ip address:: {{$_SERVER['REMOTE_ADDR']}}</small>
              </div>
              <div class="col-lg-6">
              <h5>{{ __('Total Earn Commission') }}:&nbsp;{{ GeneralHelper::getAllCommission() }}</h5>
              </div>
              <div class="col-lg-6" style="padding: 20px;background-color: cadetblue;">

                

               
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-12">
                        <ul class="nav secondary-nav">

                            <li class="nav-item"> 
                          <a class="nav-link 
                          {{GeneralHelper::isActiveMenu('romoneytransfer')}}
                          {{GeneralHelper::isActiveMenu('roaddaccount')}}
                          " href="{{route('romoneytransfer')}}">
                            <span><i class="fas fa-rupee-sign"></i></span>Money Transfer</a>
                        </li>
                     
                        
                      
                        <li class="nav-item"> 
                          <a class="nav-link {{GeneralHelper::isActiveMenu('moneytransfer')}}" href="{{route('ropushbalance')}}">
                            <span><i class="fas fa-retweet"></i></span>Push Balance</a>
                        </li>

                      
                         <li class="nav-item"> 
                          <a class="nav-link {{GeneralHelper::isActiveMenu('tatrechargeesybuz')}}" href="{{route('rotatrechargeesybuz')}}">
                            <span><i class="fas fa-wallet"></i></span> Tatkal Recharge</a>
                        </li>
                           <li class="nav-item"> 
                          <a class="nav-link {{GeneralHelper::isActiveMenu('myreport')}}" href="{{route('myreport')}}">
                            <span><i class="fas fa-chart-line"></i></span>My Report</a>
                        </li>

                    
                        </ul>
                           <ul class="nav secondary-nav">
                        
                         <li class="nav-item"> 
                          <a class="nav-link 
                          {{GeneralHelper::isActiveMenu('myreport')}}
                          " href="#">
                            <span><i class="fas fa-hand-holding-usd" aria-hidden="true"></i></span>Commission</a>
                        </li>
                        <li class="nav-item"> 
                          <a class="nav-link {{GeneralHelper::isActiveMenu('rorechargesreport')}}" href="{{route('rorechargesreport')}}">
                            <span><i class="fas fa-unlink"></i></span>All Transaction Report</a>
                        </li>
                     
                         <li class="nav-item"> 
                            <a class="nav-link"  href="#">
                              <span><i class="fas fa-gavel"></i></span>Raise Ticket</a> 
                          </li>
                    
                        </ul>


                      </div>
                   </div>
                  </div>
              </div>
               <div class="col-lg-6" style="border: solid 1px #eee;padding: 20px;">

                <h4 class="mb-4">{{ __('Report') }}</h4>
                
               
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-12">
                       @include('user.Distributor.ReportChart')
                      </div>
                   </div>
                  </div>
              </div>
                <div class="col-lg-6" style="border: solid 1px #eee;padding: 20px;">

                <h4 class="mb-4">{{ __('Monthly') }}</h4>
                
               
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-12">
                       @include('user.Distributor.ReportBarChart')
                      </div>
                   </div>
                  </div>
              </div>


            </div>
</div>


</section>

<section class="containers section pb-4">
  <div class="bg-light shadow-md rounded p-4">
  
  <div class="row"> 
    <div class="col-lg-12">

        <h2 class="text-9 font-weight-600 text-center">Welcome to the world of SiddhiVenture Pvt Ltd!</h2>
        <p class="lead mb-5 text-center">Best Recharge , Topup and Bill Payment Appication!</p>
        <div class="row">
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="fas fa-dollar-sign"></i> </div>
              <h3>Easy To Understand</h3>
              <p>No hidden charges, no payment fees, and free customer service. So you get the best deal every time!</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="fas fa-search"></i> </div>
              <h3>Quick and Easy Bill Payment</h3>
              <p>We'll find you the best deals available from top bus companies for you to choose from, combining quality and economy. </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="fas fa-percentage"></i> </div>
              <h3>Instant Money Transfer</h3>
              <p>Always get cheapest price with the best in the industry. So you get the best deal every time.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="fas fa-road"></i> </div>
              <h3>100+ Cities</h3>
              <p>Make your road journeys easier across world with 10000+ Operators.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="far fa-times-circle"></i> </div>
              <h3>Easy Cancellation &amp; Refunds</h3>
              <p>Get instant refund and get any booking fees waived off!</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="fas fa-heart"></i> </div>
              <h3>Every time, anywhere</h3>
              <p>Because your trip doesn't end with a ticket, we’re here for you all the way</p>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
      </section>
<!-- Document Wrapper end --> 
@endsection

