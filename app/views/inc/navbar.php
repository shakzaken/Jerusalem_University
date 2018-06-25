

<header class="main-header">
        <nav class="navbar">
            <div class="space-div"></div>
            <ul class="nav-left-ul">
                <li class="medium-li"><a href="<?php echo URLROOT; ?>">Home</a></li>
                <li class="big-li"><a href="<?php echo URLROOT;?>/students/myCourses">My Courses</a></li>
                <li class="medium-li"><a href="<?php echo URLROOT; ?>/admin/index">Admin</a></li>
            </ul>
            <ul class="nav-right-ul">
              <?php if(isset($_SESSION['user'])) : ?>
                <li class="email-li">
                  <a href="#"><?php echo $_SESSION['user']->email; ?></a>
                </li>
                <li class="medium-li">
                  <a href="<?php echo URLROOT; ?>/authapi/logout">Logout</a>
                </li>
              <?php else : ?>
                <li class="medium-li">
                  <a href="<?php echo URLROOT; ?>/users/login">Login</a>
                </li>
                <li class="medium-li">
                  <a href="<?php echo URLROOT; ?>/users/register">Register</a>
                </li>
              <?php endif ; ?>
          </ul>
        </nav>
        <nav class="nav-logo">
            <h1> Jerusalem University</h1>
        </nav>
  </header>