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
							<h1>Royalties owed to the people of <?php echo $region; ?></h1>
							<span class="amount"><?php echo "¢ ".$amountDue; ?></span>
						</div>
						<div class="white-box">
							<h1>Royalties paid to the people of <?php echo $region; ?></h1>
							<span class="amount"><?php echo "¢ ".$amountReceived; ?></span>
						</div>
					</section>

					<section id="overdue" class="column">
						<div class= "gold-box">
							<h1><?php echo $over_under; ?></h1>
							<span class="amount"><?php print "¢ ".$overdue; ?></span>
						</div>
					</section>
				</div>
			</div>
			<div id="bottom-cont">

				<div class="site-content wrap" role="main">
					<section id="region-overview" class="column">
						<div class="grey-box">
							<h1>REGION OVERVIEW</h1>
							<h1><span>Ashanti:<span></h1>
							<div id="region-stats" >
								<div class="pop-area white-box">
									<h1>Total Population<h1>
									<h2><span><?php echo $ashanti_population; ?></span></h2>
								</div>
								<div class="pop-area white-box">
									<h1>Area (in sq. km)</h1>
									<h2><span><?php echo $area_size; ?></span></h2>
								</div>
								<div class="white-box">
									<h1>Companies that mine in this area:</h1>
									<h2><span>Anglogold Ashanti</span></h1>
								</div>
							<div>
						</div>
					</section>

					<section id="company-payments" class="column">

						<div id="distribution-map" class="grey-box" style="vertical-align:top;margin-top:20px">
							<h1>Distribution of funds:</h1>
							<div style="width:100%!important">
								<?php map();?>
							</div>
						</div>

						<div class="two-rows">
							<div id="citizen" class="grey-box">
								<h2>3% of the revenues generated should go back to local residents</h2>
								<img src="wp-content/themes/where_my_money_dey/images/fist-icon.png"; />
							</div>						
							<div id="act-now" class="grey-box">
								<h1>actNOW</h1>
								<button>
									<a class="fancybox" href="#petition1" title="Sign a petition">Sign a petition</a>
								</button><br/>
								<button>
									<a class="fancybox" href="#community1" title="Connect to your community">Connect to your community</a>
								</button><br/>
								<button>
									<a class="fancybox" href="#update1" title="Update me on this">Update me on this issue</a>
								</button><br/>
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
									<p>Petition: <b>Save the wetlands!</b><br />
										<textarea id="message_s">Your message here...</textarea>
										<input type="text" id="email_s" placeholder="Email address">
										<input value="sign" type="submit" onclick="myCall2()" id="submit_s">
										<div id="mybox2"></div>
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
											<img src="<?php echo get_template_directory_uri(); ?>//images/twitter.png">
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
								</div><!--#update1 -->
							</div><!-- #act-now -->
					</section><!-- #company-payments -->

					<section id="stories" class="column">
						<div class="grey-box">
							<h1>Stories from the ground:</h1>
							<div class="stories-container">
								<div class="profile">
									<img src="wp-content/themes/where_my_money_dey/images/abeeku.png"; />
									<h2>Abeeku Kodwo</h2>
									<h2><span><em>Central Ghana</em></span></h2>
									<p> 
										They also presented a workshop on launching small businesses, sharing methods 
										of making candles using recycled materials such as church candles, milk cartons 
										and leftover fat from butcher shops.
									</p>
								</div>
								<div class="images">
									<h1>Mining company destroys wetlands</h1>
									<img src="wp-content/themes/where_my_money_dey/images/market.jpg"; />
									<img src="wp-content/themes/where_my_money_dey/images/swamp-2.jpg"; />
									<img src="wp-content/themes/where_my_money_dey/images/wetlands.jpg"; />
									<img src="wp-content/themes/where_my_money_dey/images/obuasi.jpg"; />
									<img src="wp-content/themes/where_my_money_dey/images/worksite.jpg"; />
									<img src="wp-content/themes/where_my_money_dey/images/swamp.jpg"; />
								</div>
							</div>
					</section>
					<section id="prompt" class="column">
						<div class="grey-box">
							<h1>How have mining royalties changed <span>your</span> neighbourhood?</h1>
							<button onclick="showDiv()">Share your story</button>
						</div>
					</section>
					<section id="testimony" class="sub-column">
						<div class="gold-box">
							<form method="send">
								<label>Name:</label><input type="text" name="name" id="name" /><br />
								<label>Email address:</label><input type="text" name="email" id="email" /><br />
								<label>Your story:</label><textarea name="story" id="story" cols="24" rows="5"></textarea>
								<button type="submit"/>SUBMIT</button>
							</form>
						</div>
					</section>
				</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>