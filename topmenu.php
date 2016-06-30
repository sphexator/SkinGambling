 <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                    </div>

                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                          <a href="index.php" class="logo-improved"><i class="#"></i><span><img src="assets/images/logo.png"></span></a>
                          <ul class="nav navbar-nav navbar-right pull-right">
                            <?php
                            if($admin == 1){
                              echo'
                              <li class="has_sub admin-content">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="" '; if($page=="ad"){echo'subdrop';} echo'"><i class="ti-user"></i><span>Admin</span> </a>
                                <ul class="dropdown-menu" style="">
                                  <li><a href="apot2.php">Jackpot Information</a></li>
                                  <li><a href="achat.php">Chat information</a></li>
                                  <li><a href="apu.php">Premium users</a></li>
                                  <li><a href="abu.php">Banned users</a></li>
                                  <li><a href="acu.php">ChatBanned users</a></li>
                                  <li><a href="au.php">Users</a></li>
                                  <li><a href="ah2.php">History (Jackpot)</a></li>
                                </ul>
                              </li>
                              ';}
                            ?>
                            <li><a href="index.php">Coinflip</a></li>
                            <li><a href="index2.php">Jackpot</a></li>
                            <li class="dropdown">
                              <a href="" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="">History</a>
                              <ul class="dropdown-menu">
                                <li><a href="cfhistory.php"><i class="ti-book m-r-5"></i>Coinflip History</a></li>
                                <li><a href="history2.php"><i class="ti-book m-r-5"></i>Jackpot History</a></li>
                              </ul>
								<?php
								if(isset($_SESSION["steamid"])){
                  echo'
                  <li class="dropdown">
                    <a href="" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded=""><img src="'.$steamprofile['avatarfull'].'" alt="user-img" class="img-circle"> </a>
                    <ul class="dropdown-menu">
                      <li class="notifi-title">'.$steamprofile['personaname'].'</li>
                      <li><a href="profile.php"><i class="ti-user m-r-5"></i> Profile</a></li>
                      <li><a href="usersettings.php"><i class="ti-settings m-r-5"></i> Settings</a></li>
                      <li><a href="userhistory.php"><i class="ti-book m-r-5"></i> History</a></li>
                      <li><a href="steamauth/logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                    </ul>
                  </li>';
								}
								else
								{

									echo '<li class="hidden-xs" style="padding-top:15px">'.steamlogin().'</li>';
								}
								?>
                            </ul>
                        </div>

                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>

			<script src="assets/js/jquery.app.js"></script>
