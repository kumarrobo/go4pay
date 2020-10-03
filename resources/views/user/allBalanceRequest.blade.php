
@extends('layouts.defaultDashboard')

@section('content')

<section class="containers">
<div class="bg-light shadow-md rounded p-4">
      <!--User Profile Section
      ============================================= -->
      @include('user.Distributor.Wallet.allWalletBalanceRequest')
      <!-- Personal Information end --> 
</div>
</section>

<!-- Document Wrapper end --> 
@endsection
