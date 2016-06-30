<?php
include ('link.php');
include ('core.php');
require_once('steamauth/steamauth.php');
@include_once('steamauth/userInfo.php');
$page="j2";
if(isset($_SESSION["steamid"]))
{
	$time = time();
    mysql_query("UPDATE users SET lastseen=".$time." WHERE steamid=".$_SESSION['steamid']."");
	$premium=fetchinfo("premium","users","steamid",$_SESSION["steamid"]);
	$banned=fetchinfo("ban","users","steamid",$_SESSION["steamid"]);
	$cbanned=fetchinfo("cban","users","steamid",$_SESSION["steamid"]);
	$mytrade = fetchinfo("tlink","users","steamid",$_SESSION["steamid"]);
	$admin = fetchinfo("admin","users","steamid",$_SESSION["steamid"]);
	$name=$steamprofile['personaname'];
	$name = mysql_real_escape_string($name);
	if($name)
	{
		mysql_query("UPDATE `users` SET `name`='".$name."', `avatar`='".$steamprofile['avatarfull']."' WHERE `steamid`='".$_SESSION["steamid"]."'");
	}
	if($banned==1)
	{
		$banby=fetchinfo("banby","users","steamid",$_SESSION["steamid"]);
		$banend=fetchinfo("banend","users","steamid",$_SESSION["steamid"]);
		$banreason=fetchinfo("banreason","users","steamid",$_SESSION["steamid"]);
		if($banend!=-1)
		{
			$banendt=date('Y-m-d - H:i', $banend);
			$bmsg='You have been banned from this site by '.$banby.'.<br>Your ban ends on '.$banendt.'.<br>Ban reason: '.$banreason.'.';
		}
		else if($banend==-1)
		{
			$bmsg='You have been banned from this site by '.$banby.'.<br>Your ban is permanent.<br>Ban reason: '.$banreason.'.';
		}




		if($banend>=$time || $banend==-1)
		{
			echo $bmsg;
			die();
		}
		else
		{
			mysql_query("UPDATE `users` SET `ban`='0' WHERE `steamid`='".$_SESSION["steamid"]."'");
			mysql_query("UPDATE `users` SET `banend`='0' WHERE `steamid`='".$_SESSION["steamid"]."'");
			mysql_query("UPDATE `users` SET `banreason`='' WHERE `steamid`='".$_SESSION["steamid"]."'");
		}
	}
	$cbanstring='';
	if($cbanned==1)
	{
		$cbanby=fetchinfo("cbanby","users","steamid",$_SESSION["steamid"]);
		$cbanend=fetchinfo("cbanend","users","steamid",$_SESSION["steamid"]);
		$cbanreason=fetchinfo("cbanreason","users","steamid",$_SESSION["steamid"]);
		if($cbanend!=-1)
		{
			$cbanendt=date('Y-m-d - H:i', $cbanend);
			$cbtt='Chat ban by '.$cbanby.'';
			$cbmsg='Reason: '.$cbanreason.' - Ends on '.$cbanendt.'.';

		}
		else if($cbanend==-1)
		{
			$cbtt='You have been banned from the chat by '.$banby.'';
			$cbmsg='Reason: '.$cbanreason.' - The ban is permanent.';
		}
		if($cbanend>=$time || $cbanend==-1)
		{
					$cbanstring="
					<script>
					$.Notification.notify('black', 'top center',
                     '".$cbtt."',
                     '".$cbmsg."');
					 </script>
					 ";
		}
		else
		{
			mysql_query("UPDATE `users` SET `cban`='0' WHERE `steamid`='".$_SESSION["steamid"]."'");
			mysql_query("UPDATE `users` SET `cbanend`='0' WHERE `steamid`='".$_SESSION["steamid"]."'");
			mysql_query("UPDATE `users` SET `cbanreason`='' WHERE `steamid`='".$_SESSION["steamid"]."'");
		}
	}
}
if($premium==1)
{
	$id=$_SESSION['steamid'];
	$time=time();
	$puntil = fetchinfo("puntil","users","steamid","$id");
	if($puntil<=$time)
	{

		mysql_query("UPDATE users SET `premium`='0' WHERE `steamid`='$id'");
		mysql_query("UPDATE users SET `profile`='1' WHERE `steamid`='$id'");

	}
}
 ?>

 <!-- TITLE FOR JACKPOT SITE -->
 <?php
 $cg = fetchinfo("value","p2info","name","current_game");
 $cb = fetchinfo("cost","games","id",$cg);
 $cb=round($cb,2);
 ?>
<!-- END OF JACKPOT TITLE -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site description">
        <meta name="author" content="Website.com">

        <link rel="shortcut icon" href="defico.png">

        <title><?php echo "$",$cb," ",$title; ?></title>

        <!--Morris Chart CSS -->
		    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>

        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>



        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="assets/pages/jquery.dashboard.js"></script>

        <script src="assets/js/jquery.core.js"></script>

        <link href="assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
				<link href="assets/css/core-improved.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="assets/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="assets/plugins/notifications/notify-metro.js"></script>
        <script src="chat/chat.js"></script>
        <link rel="stylesheet" href="chat/chat.css">
        <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
		<script src="js/script2.js"></script>
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="fixed-left"  onload="setInterval('chat.update()', 500)" style="margin-bottom:10%;">
<?php echo $cbanstring; ?>
<span class="msg"></span>
<!-- Begin page -->
<div id="wrapper">

<!-- Top Bar Start -->
<?php include('topmenu.php'); ?>
<!-- Top Bar End -->
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="jackpot-content-page-improved">
	<!-- Start content -->
	<div class="content" style="text-align:center;">
		<div class="row">
			<!-- Left side content panel starts -->
			<div class="card-box-improved left-side-panel-improved">
				<h3 style="text-align:center;">Giveaway</h3>
				<div style="position:relative; margin-left 10px; margin-right:10px; overflow:auto;">
					<br>
					<p style="padding-left: 5px;">Its summer time! and WE like to GIVEAWAY skins!
					<p  style="padding-left: 5px;">All you have to do:</p>
					<p style="padding-left: 5px;">Like <a href="https://www.facebook.com/Skinz4uDotCom" target="_blank">our facebook</a> and Post your steamlink in the comment = 1 ticket
					<p style="padding-left: 5px;">Optional<br>
					✓ Host or Flip a coin for atleast 1 dollar = 2 tickets
					<br>✓ Win a jackpot with atleast 10 dollars in the pot = 3 tickets
					<br>
					<br>What we are giving away:
					<br>★ StatTrak™ Gut Knife|Doppler FN
					<br>Float value: 0.0373 Phase 3
					<br>
					<br>★ SSG 08 | Blood in the Water FN</p>
					<br>
				</div>
			</div>
			<!-- Left side content panel ends -->
			<!-- Main side content panel begins -->
			<div class="main-content-improved">
				<div class="card-box-improved">
					<div class="row">
							<div class="jackpot-card-box-improved">
									<h3 class="text-white"><b>Jackpot</b></h3>
									<?php
									$minbet = fetchinfo("value","p2info","name","minbet");
									$maxbet = fetchinfo("value","p2info","name","maxbet");
									$maxskins = fetchinfo("value","p2info","name","maxitems");
									echo'
									<p class="text-muted" style="text-align:center"><b><u>Min Bet</u>: $'.$minbet.'</b></p>
									<p class="text-muted" style="text-align:center"><b><u>Max Skins</u>: '.$maxskins.'</b></p>
									';
									?>
								<div class="clearfix"></div>
							</div>
							<div class="jackpot-card-box-improved">
								<h4 class="text-white">Time Left</h4>
								<h2 class="text-white text-center"><span class="tl1"><?php include('tl1.php');?></span></h2>
								<p class="text-muted">Pot: <font color="#598749"><span class="pot1"><?php include('pot1.php');?></span></font> </p>
							</div>
					</div>
					<div class="jacpot-progress-improved">
						<?php include('prog2.php'); ?>
					</div>
					<div class="widget-bg-color-icon card-box">
						<div class="row-improved">
						<span class="wnr hidden"></span>
						<span class="t1">
							<?php include('table2.php'); ?>
						</span>
						<br>
						<?php
						if(isset($_SESSION["steamid"])){
							if($mytrade){
								echo'
								<a href="'.$bot2url.'" target="_blank"><button type="button" class="btn btn-success waves-effect waves-light">Deposit now!</button></a>';
							}
							else{
								echo'<a href="usersettings.php"><button type="button" class="btn btn-warning waves-effect waves-light">Set your Trade URL!</button></a>';
							}
						}
						else{
							echo'<a href="?login"><button type="button" class="btn btn-danger waves-effect waves-light">Please log in!</button></a>';
						}
						?>
						<br>
						<br>
						<br>
					</div>
						<span class="hash1"><?php include('hash2.php') ?> </span>
					</div>
					<br>
				</div> <!-- container -->
			</div>
			<!-- Right side content panel starts -->
			<div class="card-box-improved right-side-panel-improved">
					<script>
						var name = "<?php echo $steamprofile['personaname'] ?>";
						var ava = "<?php echo $steamprofile['avatarfull'] ?>";
						var id = "<?php echo $_SESSION['steamid'] ?>";
						var color = "<?php echo 'FF0000' ?>";
						var admin = "<?php echo $admin ?>";

						// display name on page
						$("#name-area").html("You are: <span>" + name + "</span>");
						// kick off chat
						var chat =  new Chat();
						$(function() {
							chat.getState();
							// watch textarea for key presses
								$("#sendie").keydown(function(event) {
									var key = event.which;
									//all keys including return.
									if (key >= 33) {
										var maxLength = 57;
										var length = this.value.length;
										// don't allow new content if length is maxed out
										if (length >= maxLength) {
											event.preventDefault();
										}
									}
								});
								// watch textarea for release of key press
								$('#sendie').keyup(function(e) {
									if (e.keyCode == 13) {
										var text = $(this).val();
										var maxLength = $(this).attr("maxlength");
										var length = text.length;
										// send
										if (length <= maxLength + 1) {
											chat.send(text, name, ava,id,admin,color);
											$(this).val("");
										} else {
											$(this).val(text.substring(0, maxLength));
										}
									}
								});

								// watch textarea for release of key press
								$("#sendchat").click( function() {
										var text = $('#sendie').val();
										var maxLength = $('#sendie').attr("maxlength");
										var length = text.length;

										if (length >= maxLength) {
											event.preventDefault();
										}
										// send
										else if (length <= maxLength + 1) {
											chat.send(text, name, ava,id,admin,color);
											$('#sendie').val("");
										} else {
											$('#sendie').val(text.substring(0, maxLength));
										}
								});
						});
					</script>
					<div id="chat-wrap" style="overflow:auto;  height: 450px;">
						<?php include "chat/chat.php";?>
					</div>
					<div class="botton" style="overflow:hidden;">
						<?php
							if(!isset($_SESSION["steamid"])){
								echo '
								<div id="otpsoob">
									<div style="padding-top: 7px;">
										<a href="?login" class="btn btn-success">
											<p style="padding: 0; margin: 20px 0 20px 0; text-transform: uppercase; font-weight: bold; color:#fff;">Login through Steam</p>
										</a>
									</div>
								</div>';
							} else {
								echo '
								<div id="otpsoob">
									<form id="send-message-area">
										<textarea id="sendie" maxlength="125" rows="2" placeholder="Enter your message"></textarea>
										<button onClick="return false;" id="sendchat" class="btn btn-success">Send</button>
									</form>
								</div>
								';
							}
						?>
					</div>
			</div>
			<!-- Right side content panel ends -->
		</div> <!-- content -->

		<?php include('footer.php'); ?>

	</div>

	<!-- ============================================================== -->
	<!-- End Right content here -->
	<!-- ============================================================== -->

	<!-- Right Sidebar -->
									<div class="side-bar right-bar nicescroll" style="overflow: visible">
										<script>
										var name = "<?php echo $steamprofile['personaname'] ?>";
										var ava = "<?php echo $steamprofile['avatarfull'] ?>";
      							var id = "<?php echo $_SESSION['steamid'] ?>";
      							var color = "<?php echo 'FF0000' ?>";
      							var admin = "<?php echo $admin ?>";

										// display name on page
										$("#name-area").html("You are: <span>" + name + "</span>");
										// kick off chat
										var chat =  new Chat();
										$(function() {
											chat.getState();
											// watch textarea for key presses
											$("#sendie").keydown(function(event) {
												var key = event.which;
												//all keys including return.
												if (key >= 33) {
													var maxLength = 57;
													var length = this.value.length;
													// don't allow new content if length is maxed out
													if (length >= maxLength) {
														event.preventDefault();
													}
												}
											});
											// watch textarea for release of key press
											$('#sendie').keyup(function(e) {
												if (e.keyCode == 13) {
              						var text = $(this).val();
              						var maxLength = $(this).attr("maxlength");
              						var length = text.length;
              						// send
              						if (length <= maxLength + 1) {
                						chat.send(text, name, ava,id,admin,color);
                						$(this).val("");
													} else {
														$(this).val(text.substring(0, maxLength));
													}
												}
											});

          // watch textarea for release of key press
          $("#sendchat").click( function() {
              var text = $('#sendie').val();
              var maxLength = $('#sendie').attr("maxlength");
              var length = text.length;

              if (length >= maxLength) {
                event.preventDefault();
              }
              // send
              else if (length <= maxLength + 1) {
                chat.send(text, name, ava,id,admin,color);
                $('#sendie').val("");
              } else {
                $('#sendie').val(text.substring(0, maxLength));
              }
          });
      });
      </script>
                <h4 class="text-center">Chat</h4>
                    <div class="row userarea slimScrollDiv" style="height:78%; padding: 0 5%;">
                          <div id="chat-wrap" class="slimScrollleft">
                            <?php include "chat/chat.php";?>
                            </div>
                            <div class="slimScrollBar" style="width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 737.093px; visibility: visible; background: rgb(220, 220, 220);"></div>
                        <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div>

                            <div class="botton">
                            <?php
                if(!isset($_SESSION["steamid"])){
                  echo '
                  <div id="otpsoob"><div style="padding-top: 7px;">
                      <a href="?login" class="btn btn-success">
                        <p style="padding: 0; margin: 20px 0 20px 0; text-transform: uppercase; font-weight: bold;">Login through Steam</p>
                      </a>
                  </div></div>';
                } else {
                  echo '

                    <div id="otpsoob"><form id="send-message-area">
                      <textarea id="sendie" maxlength="125" rows="2" placeholder="Enter your message"></textarea>
                      <button onClick="return false;" id="sendchat" class="btn btn-success">
                        Send
                      </button>
                      </form>
                    </div>
                  ';
                }
              ?>
                            </div>
                        </div>
                                    </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->

<script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="assets/pages/jquery.sweet-alert.init.js"></script>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->


        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
                $(".knob").knob();
            });
        </script>
    </body>
</html>
