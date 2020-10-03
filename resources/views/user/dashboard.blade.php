
@extends('layouts.defaultDashboard')

@section('content')

<section class="containers">
<div class="bg-light shadow-md rounded p-4">
  <div class="row"> 
    <div class="col-lg-12">
    <div class="bg-light shadow-md rounded p-4" style="background-color: cadetblue;"> 
      <!--User Profile Section
      ============================================= -->
      @include('user.Distributor.Dashboard')
      <!-- Personal Information end --> 
    </div>
  </div>
  </div>
</div>
</section>

<!-- Document Wrapper end --> 
@endsection
