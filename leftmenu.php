<div class="left side-menu">
		<div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                        	<!--<li class="text-muted menu-title">Navigation</li> -->
							<?php
							$coinflip=1;
							if($coinflip==1)
							{
								if($page=="cf")
								{
									$cfa='active';
									$cfd='subdrop';
									$cfc='style="display: block;"';
								}
								echo'
								<li class="has_sub">
                                <a href="index.php" class="waves-effect waves-light '.$cfd.'"><i class="fa fa-circle-o" aria-hidden="true"></i><span>CoinFlip </span> </a>
								<ul class="list-unstyled" '.$cfc.'>
							<!--		<li><a href="index.php">Play!</a></li> -->
                                    <li><a href="cfhistory.php">History</a></li>
                                </ul>
								</li>


								';
							}
							?>
                                                      <li class="has_sub">
                                <a href="index2.php" class="waves-effect <?php if($page=="j2"){echo'subdrop';} ?>"><i class="ti-home"></i><span>Jackpot </span> </a>
								<ul class="list-unstyled" <?php if($page=="j2"){echo'style="display: block;"';} ?>>
						<!--			<li><a href="index2.php">Play!</a></li> -->
									<li><a href="history2.php">History</a></li>
									<li><a href="topusers2.php">Top Users</a></li>
                                </ul>
                            </li>

							<li class="">
                                <a href="rules.php" class="waves-effect waves-light <?php if($page=="rls"){echo'active';} ?>"><i class="fa fa-book"></i><span>Rules </span> </a>
                            </li>

                            <li class="">
                                <a href="tos.php" class="waves-effect waves-light <?php if($page=="tos"){echo'active';} ?>"><i class="fa fa-balance-scale"></i><span>Terms of Service </span> </a>
                            </li>

                            <li class="">
                                <a href="pf.php" class="waves-effect waves-light <?php if($page=="pf"){echo'active';} ?>"><i class="fa fa-check-circle"></i><span>Provably Fair </span></a>
                            </li>

                            <li class="">
                                <a href="support.php" class="waves-effect waves-light <?php if($page=="supp"){echo'active';} ?>"><i class="fa fa-question-circle"></i><span>Support </span></a>
                            </li>
                            <?php
                            	if($admin == 1){
																echo'
																<li class="text-muted menu-title admin-content">Admin Panel</li>
																<li class="has_sub admin-content">
																	<a href="#" class="waves-effect '; if($page=="ad"){echo'subdrop';} echo'"><i class="ti-user"></i><span>Admin</span> </a>
																	<ul class="list-unstyled '; if($page=="ad"){echo'"style="display: block;"';} echo'" style="">
																		<li><a href="apot1.php">Pot 1 Information</a></li>
																		<li><a href="apot2.php">Pot 2 Information</a></li>
																		<li><a href="achat.php">Chat information</a></li>
																		<li><a href="apu.php">Premium users</a></li>
																		<li><a href="abu.php">Banned users</a></li>
																		<li><a href="acu.php">ChatBanned users</a></li>
																		<li><a href="au.php">Users</a></li>
																		<li><a href="ah1.php">History (Pot 1)</a></li>
																		<li><a href="ah2.php">History (Pot 2)</a></li>
																	</ul>
																</li>
																';}
                            ?>
			</ul>
			<div id="fb-root"></div>
<!-- facebook widget script stuff -->
			<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
 				if (d.getElementById(id)) return;
  			js = d.createElement(s); js.id = id;
  			js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
  			fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>
<!-- facebook widget script stuff ends -->
<!-- facebook widget content stuff -->

<!-- facebook widget content ends -->
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <script>
                $("li.has_sub").click(function(){
                    $(this).children("a").toggleClass("subdrop");
                    $(this).children("ul").toggle();
                });
            </script>
