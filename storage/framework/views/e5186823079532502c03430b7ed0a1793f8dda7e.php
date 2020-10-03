<ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?php echo e(route('commission')); ?>">Profile</a></li>
    <!--   <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">My Profile</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="profile.html">Personal Information</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">KYC Details</a></li>
          <li><a class="dropdown-item" href="profile-cards.html">Credit or Debit Cards</a></li>
          <li><a class="dropdown-item" href="profile-notifications.html">Notifications</a></li>
          <li><a class="dropdown-item" href="profile-orders-history.html">Orders History</a></li>
          <li><a class="dropdown-item" href="profile-password.html">Change Password</a></li>
        </ul>
      </li>  -->
      <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Retailer</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?php echo e(route('addretailer')); ?>">Add New Retailer</a></li>
          <li><a class="dropdown-item" href="<?php echo e(route('allretailerlist')); ?>">All Retailer</a></li>
          <li><a class="dropdown-item" href="<?php echo e(route('commission')); ?>">RO Reports</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Report</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?php echo e(route('dsmyreport')); ?>">Transaction Report</a></li>
<!--           <li><a class="dropdown-item" href="profile-favourites.html">Statment Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Payment Load Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Payment Debit Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">PG  Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">PG Statment Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">PG widthrow Report</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">PG widthrow History</a></li>
 -->        </ul>
      </li>
      <li><a class="dropdown-item" href="<?php echo e(route('tatrechargeesybuz')); ?>">Tatkal Money Transfer</a></li>
      <li><a class="dropdown-item" href="<?php echo e(route('transactionstatus')); ?>">Account Statement</a></li>
      <li><a class="dropdown-item" href="<?php echo e(route('transactionstatus')); ?>">Check Transaction Status</a></li>
     <!--   <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Support</a>
      <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="profile.html">Topup Request</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Topup History</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Add Money</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">View All Tickets</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">Raise Complain</a></li>
          <li><a class="dropdown-item" href="profile-favourites.html">PG Statment</a></li>
        </ul>
      </li> -->
      <li><a class="dropdown-item" href="<?php echo e(route('transactionstatus')); ?>">Write Us</a></li>
      <li>
          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <?php echo e(__('Sign Out')); ?>

          </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
      </li>
    </ul>
  </li>
</ul><?php /**PATH /var/www/html/siddiventures/resources/views/user/distributorProfileMenu.blade.php ENDPATH**/ ?>