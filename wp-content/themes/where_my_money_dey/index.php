<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Where My Money Dey?
 */

include 'data.php';

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content">
			<div id="top-cont">
				<div class="site-content wrap" role="main">
					<section id="about">
						<h1>What They Owe You</h1>
						<p>Has your village received its fair share? You can check whether your community has received the funds due to it by simply selecting your location below.</p>
						<form method="get">
							<select name="district">
								<option>Ghana</option>
								<?php echo $district_dropdown; ?>
							</select>
							<button type="submit" />GO</button>
						</form>
					</section>

					<section id="royalties" class="column">
						<div class="white-box">
							<h1>Royalties <span>owed</span></h1>
							<span class="amount"><?php echo "¢ ".$amountDue; ?></span>
						</div>
						<div class="white-box">
							<h1>Royalties <span>paid</span></h1>
							<span class="amount"><?php echo "¢ ".$amountReceived; ?></span>
						</div>
					</section>

					<section id="overdue" class="column full">
						<div class= "gold-box">
							<h1><?php echo $over_under; ?></h1>
							<span class="amount"><?php print "¢ ".$overdue; ?></span>
						</div>
					</section>
				</div>
			</div><!--#top-cont -->

			<div id="bottom-cont">

				<div class="site-content wrap" role="main">

					<section id="infrastructure" class="column full">
						<div class="grey-box">
							<h1>Your royalties were used for:</h1>
							<div id="services" >
								<div class="industry-container">
									<div class="industry"> 
										<img src="wp-content/themes/where_my_money_dey/images/education-icon.png" />
										<h1>Education</h1>
									</div>
									<div class="facilities">
										<h2>0</h2>
									</div>
								</div>
								<div class="industry-container">
									<div class="industry">
										<img src="wp-content/themes/where_my_money_dey/images/health-icon.png" />
										<h1>Health</h1>
									</div>
									<div class="facilities">
										<h2>0</h2>
									</div>
								</div>
								<div class="industry-container">
									<div class="industry">
										<img src="wp-content/themes/where_my_money_dey/images/sanitation-icon.png" />
										<h1>Sanitation</h1>
									</div>
									<div class="facilities">
										<h2>0</h2>
									</div>
								</div>
								<div class="industry-container">
									<div class="industry">
										<img src="wp-content/themes/where_my_money_dey/images/transport-icon.png" />
										<h1>Transport</h1>
									</div>
									<div class="facilities">
										<h2>0</h2>
									</div>
								</div>
							</div>
						</div>
					</section>

					<section id="action" class="column full">
						<div id="citizen" class="grey-box">
							<h2>3% of the revenues generated should go back to local residents</h2>
							<img src="wp-content/themes/where_my_money_dey/images/fist-icon.png" />
							
							<h1>actNOW</h1>
							<button>
								<a class="fancybox" href="#petition1" title="Sign a petition">Petition</a>
							</button>
							<button>
								<a class="fancybox" href="#community1" title="Connect to your community">Connect</a>
							</button>
							<button>
								<a class="fancybox" href="#update1" title="Update me on this">Updates</a>
							</button>
							<button>
								<a class="fancybox" href="#share1" title="Share">Share</a>
							</button>
							   	<script>                          
						                function myCall() {
									$('#email_p').show();
									
									$('#submit_p').show(); 
						                    var request = $.ajax({
						                        url: "../actnow/index.php/subscribe/email_petitions",
									data: "email="+document.getElementById("email_p").value,
						                        type: "GET",            
						                        dataType: "html"
						                    });
						 			
						                    request.done(function(msg) {
									$('#email_p').val("");
						                        $("#mybox").html(msg);
									$('#email_p').hide();
									$('#submit_p').hide();          
						                    });
						 
						                    request.fail(function(jqXHR, textStatus) {
						                        alert( "Request failed: " + textStatus );
						                    });
						                }
						                function myCall2() {
									$('#email_s').show();
									$('#message_s').show();
									$('#submit_s').show(); 
						                    var request = $.ajax({
						                        url: "../actnow/index.php/subscribe/sign_petitions",
									data: "email="+document.getElementById("email_s").value+"&message="+document.getElementById('message_s').value,
						                        type: "GET",            
						                        dataType: "html"
						                    });
						 			
						                    request.done(function(msg) {
									$('#email_s').val("");
						                        $("#mybox2").html(msg);
									$('#email_s').hide();
									$('#message_s').hide();
									$('#submit_s').hide();          
						                    });
						 
						                    request.fail(function(jqXHR, textStatus) {
						                        alert( "Request failed: " + textStatus );
						                    });
						                }
							             
						        </script>

								<div id="petition1" style="width:400px;display: none;">
									<p>Not happy with the amount of royalties paid to your community, or with how your royalties were used? Sign a petition to do something about it!</b><br />
										<textarea id="message_s">Your message here...</textarea>
										<input type="text" id="email_s" placeholder="Email address">
										<input value="sign" type="submit" onclick="myCall2()" id="submit_s">
										<div id="mybox2">
										Alternatively send "Sign, save the wetlands, your message" to +254770494078
										</div>
									</p>
								</div><!-- #petition -->

								<div id="update1" style="width:400px;display: none;">
										<h3>Enter email to stay informed on this</h3>
										<p>
											<input type="text" id="email_p">
											<input type="submit" onclick="myCall()" id="submit_p">
											<div id="mybox"></div>
										</p>
									</div>
									<div id="community1" style="width:400px;display: none;">
										<h3>Find us on</h3>
										<p style="text-align:center">
											<img src="<?php echo get_template_directory_uri(); ?>//images/facebook.png">
											<img src="<?php echo get_template_directory_uri(); ?>//images/twitter.png">
										</p>
									</div>
									<div id="share1" style="width:400px;display: none;">
										<h3>Share This Content</h3>
										<p>
											<a href="https://twitter.com/share" class="twitter-share-button" data-via="act_nowGH">Tweet</a>
											<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
											<!-- Place this tag where you want the share button to render. -->
											<div class="g-plus" data-action="share" data-annotation="bubble" data-height="15"></div>

											<!-- Place this tag after the last share tag. -->
											<script type="text/javascript">
											  (function() {
											    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
											    po.src = 'https://apis.google.com/js/plusone.js';
											    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
											  })();
											</script>
										</p>
									</div>
						</div>	
					</section>

					<section id="company-payments" class="column">

						<div id="distribution-map" class="grey-box">
							<h1>Distribution of funds:</h1>
							<div style="width:100%!important">
								<?php map();?>
							</div>
						</div>

						<div id="region-overview" class="grey-box">
							<h1>Know your region</h1>
							<h1><span>Ashanti:<span></h1>
							<div id="region-stats" >
								<div class="white-box">
									<h1>Total Population</h1>
									<h2><span><?php echo $ashanti_population; ?></span></h2>
								</div>
								<div class="white-box">
									<h1>Area (in sq. km)</h1>
									<h2><span><?php echo $area_size; ?></span></h2>
								</div>
								<div class="white-box">
									<h1>Companies that mine in this area:</h1>
									<li>Anglogold Ashanti</li>
									<li>Ashanti Goldfields</li>
									<li>Ekpeme Mining & Trading</li>
									<li>Sirius Mining Co Ltd</li>
									<li>Akrokeri-Ashanti Gold Mines</li>
								</div>
							</div>
						</div>				
					</section><!-- #company-payments -->

					<div class="column full">
						<div class="grey-box">
							<h1>Stories from the ground:</h1>
						</div>
					</div>
					<section id="stories" class="column">
						<div class="feature grey-box">
							<div class="profile" style="width:100%">
								<div>
									<img src="wp-content/themes/where_my_money_dey/images/abeeku.png" />
								</div>
								<div class="name">
									<h2>Abeeku Kodwo</h2>
									<h3><em>Central Ghana</em></h3>
								</div>
							</div>
							<div class="background"  style="width:100%">
								<p> 
									They also presented a workshop on launching small businesses, sharing methods 
									of making candles using recycled materials such as church candles, milk cartons 
									and leftover fat from butcher shops.
								</p>
							</div>
							<hr />
							<div class="evidence" style="width:100%">
								<h2>Mining company destroys wetlands</h2>
								<img src="wp-content/themes/where_my_money_dey/images/market.jpg" />
								<img src="wp-content/themes/where_my_money_dey/images/swamp-2.jpg" />
								<img src="wp-content/themes/where_my_money_dey/images/wetlands.jpg" />
								<img src="wp-content/themes/where_my_money_dey/images/obuasi.jpg" />
								<img src="wp-content/themes/where_my_money_dey/images/worksite.jpg" />
								<img src="wp-content/themes/where_my_money_dey/images/swamp.jpg" />
							</div>
						</div>
						<div class="grey-box">
							<div class="profile" style="width:100%">
								<div>
									<img src="wp-content/themes/where_my_money_dey/images/boah.png" />
								</div>
								<div class="name">
									<h2>Boahinmaa Dofi</h2>
									<h3><em>Ashanti, Ghana</em></h3>
								</div>
							</div>
							<div class="background"  style="width:100%">
								<p> 
									Las Lomas and other communities that pursued partnerships with local, state
									and federal agencies are viewed as models of progress. But living conditions 
									in other colonies still resemble those in third-world countries; 
									the state doesn’t want more of those developments.
								</p>
							</div>
							<hr />
							<div class="evidence" style="width:100%">
								<h2>Our resurfaced street</h2>
								<img src="wp-content/themes/where_my_money_dey/images/town.jpg" />
								<img src="wp-content/themes/where_my_money_dey/images/typical-paved.jpg" />
								<img src="wp-content/themes/where_my_money_dey/images/bulldozer.jpg" />
								<img src="wp-content/themes/where_my_money_dey/images/paving.jpg" />
								<img src="wp-content/themes/where_my_money_dey/images/brickwork.jpg" />
								<img src="wp-content/themes/where_my_money_dey/images/market.jpg" />
							</div>
						</div>
					</section>
					<section id="prompt" class="column full">
						<div class="grey-box">
							<h1>How have mining royalties changed <span>your</span> neighbourhood?</h1>
							<button onclick="showDiv()">Share your story</button>
						</div>
					</section>
					<section id="testimony" class="column">
						<div class="gold-box story">
							<?php include 'form.php'; ?>
						</div>
					</section>
				</div>
			</div><!-- #bottom-cont -->

			<div id="footer-cont">
				<div class="site-content wrap" role="main">
					<section id="team">
						<div class="team-photos">
							<li><a title="Team Member"><img src="wp-content/themes/where_my_money_dey/images/user.png" /></a></li>
							<li><a title="Team Member"><img src="wp-content/themes/where_my_money_dey/images/user.png" /></a></li>
							<li><a title="Team Member"><img src="wp-content/themes/where_my_money_dey/images/user.png" /></a></li>
							<li><a title="Team Member"><img src="wp-content/themes/where_my_money_dey/images/user.png" /></a></li>
						</div>

					</section>
					
					<section id="statement">
						<div>
							<h2>
								Where My Money Dey? is a <span>citizen-built</span> accountability technology, designed 
								to promote civic engagement and <span>active citizenry</span>.
								Prototyped at Ghana's first ever <a href="http://ghana.databootcamp.org" target="_blank">d|bootcamp</a> 
								in 2012, it was further developed by the <a href="http://code-africa.org/" target="_blank">Code for Africa</a> initiative.
							</h2>
						</div>
					</section>

					<section id="advisory">
						<div>
							<h2> 
								<span>actNOW!</span> is a standalone project to help citizens make their voices heard, by helping
								them to proactively engage with government, corporates and others in positions of power on issues of public 
								interest.<br /> 
								<span>actNOW!</span> is the recipient of an ANIC grant.
							</h2>
						</div>
					</section>

					<section id="invitation" class="column full">
						<div class="white-box">
							<h1>Partner with us!</h1>
							<p>
								We are inviting Civil Society Organisations and grassroots citizen groups to formally partner with us, 
								to help incorporate new data and build out additional functionality.
							</p>
							<button><a href="mailto:anne@openinstitute.com">Get in touch</a></button>
						</div>
					</section>
				</div>
			</div><!-- #footer-cont -->

			<div id="partner-logos">
				<div class="site-content wrap" role="main">
					<section id="partners">
						<div>
							<a href="http://code-africa.org/" target="_blank"><img src="wp-content/themes/where_my_money_dey/images/c4a.png" /></a>
							<a href="http://africannewschallenge.org/" target="_blank"><img src="wp-content/themes/where_my_money_dey/images/anic.png" /></a>
							<a href="http://wbi.worldbank.org/"><img src="wp-content/themes/where_my_money_dey/images/wbi-hires.png" /></a>
							<a href="http://africanmediainitiative.org/"><img style="height: 100px !important" src="wp-content/themes/where_my_money_dey/images/ami-logo.png" /></a>
						</div>
					</section>
				</div>
			</div><!-- #partner-logos -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>