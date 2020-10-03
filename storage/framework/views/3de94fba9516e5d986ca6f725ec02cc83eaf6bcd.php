<ul class="dropdown-menu">
      <li><a class="dropdown-item" href="about-us.html">Home</a></li>
      <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">My Profile</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="profile.html">Personal Information</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">KYC Details</a></li>
          <li><a class="dropdown-item" href="profile-password.html">Change Password</a></li>
        </ul>
      </li> 
     <li><a class="dropdown-item" href="profile.html">Tatkal Wallet Topup</a></li>
     <li><a class="dropdown-item" href="profile.html">Wallet To Wallet Topup</a></li>
     <li><a class="dropdown-item" href="payment.html">Money Transfer</a></li>
     <li><a class="dropdown-item" href="payment-2.html">Tatkal Money Transfer</a></li>
     <li><a class="dropdown-item" href="payment-2.html">Account Statement</a></li>
     <li><a class="dropdown-item" href="payment-2.html">Check Transaction Status</a></li>
     <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Report</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="profile.html">Transaction Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Statment Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Payment Load Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Payment Debit Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">PG  Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">PG Statment Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">PG widthrow Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">PG widthrow History</a></li>
        </ul>
      </li>
       <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Support</a>
      <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="profile.html">Topup Request</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Topup History</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Add Money</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">View All Tickets</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Raise Complain</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">PG Statment</a></li>
        </ul>
      </li>
      <li>
          <a class="dropdown-item" href="<?php echo e(route('ro.logout')); ?>"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <?php echo e(__('Sign Out')); ?>

          </a>
        <form id="logout-form" action="<?php echo e(route('ro.logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
      </li>
    </ul>
  </li>
</ul><?php /**PATH /var/www/html/siddiventures/resources/views/RO/ROProfileMenu.blade.php ENDPATH**/ ?>