<?php 
// include 'includes/admin_header.php'; 
// require 'scripts/vendor/autoload.php';

?>

	<div id="content">
		<div id="back">
			<img src="img/a1.png" alt="">
		</div>
	<div class="profil">
		<h1 class="h1"><?php echo $server_user_lastname . " " . $server_user_firstname ?></h1>
		<h1 class="h1">Profile</h1>
		<div id="navigate" style="display:none;" class="ab">
			<ul>
				<li class="abselected">
					<a href="#"><i class="fas fa-home"></i><span>Basics</span></a>
				</li>
				<li>
					<a href="#"><i class="fas fa-money-check-alt"></i><span>Work</span></a>
				</li>
				<li>
					<a href="#"><i class="fas fa-envelope"></i><span>Contact</span></a>
				</li>
			</ul>
		</div>
		<div id="abwrapper">
			<div id="steps" style="margin:0 auto;" class="steps">
				<form id="formElem" name="formElem" action="#" method="post" class="form">
					<fieldset class="step">
						<legend>About</legend>
						<div class="abt-ab">
							<div class="abt-ab-left">
								<img src="<?php echo "img/".$server_picture_name; ?>" alt="">
							</div>
							<div class="abt-ab-right">
								<h3 class="h3"><?php echo $server_user_lastname . " " . $server_user_firstname ?></h3>
								<h5 class="h5"><?php echo ucfirst($server_user_position) . " " . ucfirst($server_user_ministry) . " " . "Ministry"; ?></h5>
								<ul class="address">
									<li>
										<ul class="address-text">
											<li><b>D.O.B </b></li>
											<li>: 03-02-1984</li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>PHONE </b></li>
											<li>: <?php echo $server_user_tel; ?></li>
										</ul>
									</li>
									<li> 
										<!-- 22 Russell Street, AUSTRALIA. -->
										<ul class="address-text">
											<li><b>ADDRESS </b></li>
											<li>: <?php echo $server_user_address.", ".$server_user_state; ?>.</li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>E-MAIL </b></li>
											<li><a href="mailto:example@mail.com">:  <?php echo $server_user_email; ?></a></li>
										</ul>
									</li>
								</ul>
							</div>
								<div class="clear"></div>
						</div>
					</fieldset>

					<fieldset class="step">
						<legend>Work</legend>
						<!-- <div class="work-ab">
							<div class="work-ab-top">
								<div class="hover14">
									<div class="ab_work_effect">
										<ul>
											<li>
												<a href="images/c1.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="images/c1.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="images/c2.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="images/c2.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="images/c3.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="images/c3.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="images/c4.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="images/c4.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="images/c5.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="images/c5.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="images/c6.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="images/c6.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
												<div class="clear"></div>
										</ul> 
									</div>
								</div>
							</div>
						</div> -->
					</fieldset>

					<fieldset class="step">
						<legend>Contact</legend>
							<div class="abcontact-grid">
								<div class="ab-con-left">
								<h6 class="h6">Mail or SMS :</h6>
									<form action="#" method="post">
										<!-- <input type="text" name="First Name" value="FIRST NAME" required="">
										<input type="email" name="Email" value="EMAIL" required=""> -->
										<textarea name="Message" placeholder="MESSAGE" required=""></textarea>
										<div class="send-button">
											<input type="submit" value="MAIL">
											<input type="submit" value="SMS">
										</div>
									</form>
								</div>
								<div class="ab-con-right">
									<h6 class="h6">Address :-</h6>
									<p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>22 Russell Street, Victoria ,Melbourne AUSTRALIA </p>
									<p><span><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#">E: info [at] domain.com</a> </p>
									<p><span><i class="fa fa-mobile" aria-hidden="true"></i></span>P: +254 2564584 / +542 8245658 </p>
									<p><span><i class="fa fa-globe" aria-hidden="true"></i></span><a href="#">W: www.layouts.com</a></p>
								</div>
								<div class="clear"></div>
							</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	</div>
<?php

?>
<!-- --------------- End  -->
  