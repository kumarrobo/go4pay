

<!--Include Distributor Profile Menu-->
@if(Auth::guard('user')->check())

  @include('user.distributorProfileMenu')

@endif
<!--Include Distributor Ends Menu-->


<!--Include RO Profile Menu-->
@if(Auth::guard('ro')->check())

    @include('RO.ROProfileMenu')   

@endif
<!--Include RO Profile Menu-->
