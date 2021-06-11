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
							<h1>Royalties <span>Owed</span></h1>
							<span class="amount"><?php echo "¢ ".$amountDue; ?></span>
						</div>
						<div class="white-box">
							<h1>Royalties <span>Paid</span></h1>
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
										<p>Schools or Universities built</p>
									</div>
								</div>
								<div class="industry-container">
									<div class="industry">
										<img src="wp-content/themes/where_my_money_dey/images/health-icon.png" />
										<h1>Health</h1>
									</div>
									<div class="facilities">
										<h2>0</h2>
										<p>Clinics or Hospitals built</p>
									</div>
								</div>
								<div class="industry-container">
									<div class="industry">
										<img src="wp-content/themes/where_my_money_dey/images/sanitation-icon.png" />
										<h1>Sanitation</h1>
									</div>
									<div class="facilities">
										<h2>0</h2>
										<p>Water or Sewerage schemes built</p>
									</div>
								</div>
								<div class="industry-container">
									<div class="industry">
										<img src="wp-content/themes/where_my_money_dey/images/transport-icon.png" />
										<h1>Transport</h1>
									</div>
									<div class="facilities">
										<h2>0</h2>
										<p>Roads or Bridges built</p>
									</div>
								</div>
							</div>
						</div>
					</section>

					<section id="action" class="column full">
						<div id="citizen" class="grey-box">
							<img src="wp-content/themes/where_my_money_dey/images/fist-icon.png" />
							<h1>actNOW!</h1>
							<button>
								<a class="fancybox" id="petition-trigger" href="#petition1" title="Sign a petition">Petition</a>
								<div id="petition-popup">
									<h2>Petition</h2>
									<p>Do you disagree with the impact extractive companies are having on your community, 
										or how the royalties for your community are being used? Do something positive about it. <br /> 
										Sign a petition to demand change.
									</p>
								</div>
							</button>

							<button>
								<a id="connect-trigger" class="fancybox" href="#community1" title="Connect to your community">Connect</a>
								<div id="connect-popup">
									<h2>Connect</h2>
									<p>Do you want to get involved in creating a better tomorrow for your community? 
										Collective action will amplify your efforts. Find others in your community or wider world who also want 
										to do something positive.
									</p>
								</div>
							</button>

							<button>
								<a id="updates-trigger" class="fancybox" href="#update1" title="Update me on this">Updates</a>
								<div id="updates-popup">
									<h2>Updates</h2>
									<p>Want to be kept informed about any new developments about mining royalties relating to your community? 
										Sign-up here for SMS or email alerts about new payments, campaigns, or mining company activities.
									</p>
								</div>
							</button>

							<button>
								<a id="share-trigger" class="fancybox" href="#share1" title="Share">Share</a>
								<div id="share-popup">
									<h2>Share</h2>
									<p>Why do it alone? Help spread the word about how extractive industries are impacting on your world. 
										The more people who shine a light on the issues, the quicker everyone will understand what's important.
									</p>
								</div>
							</button>

							<div id="petition1" style="width:400px;display: none;">
								<p>Save the wetlands!</p><br />
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
								Alternatively send "Subscribe, save the wetlands" to +254770494078
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

					<section id="stories" class="column">
						<div class="white-box">
							<h1>Your Stories:</h1>
							<div class="feature grey-box">
								<div class="profile">
									<div>
										<img src="wp-content/themes/where_my_money_dey/images/abeeku.png" />
									</div>
									<div class="name">
										<h2>Abeeku Kodwo</h2>
										<h3><em>Central Ghana</em></h3>
									</div>
								</div>
								<div class="background">
									<p> 
										They also presented a workshop on launching small businesses, sharing methods 
										of making candles using recycled materials such as church candles, milk cartons 
										and leftover fat from butcher shops.
									</p>
								</div>
								<hr />
								<div class="evidence">
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
								<div class="profile">
									<div>
										<img src="wp-content/themes/where_my_money_dey/images/boah.png" />
									</div>
									<div class="name">
										<h2>Boahinmaa Dofi</h2>
										<h3><em>Ashanti, Ghana</em></h3>
									</div>
								</div>
								<div class="background">
									<p> 
										Las Lomas and other communities that pursued partnerships with local, state
										and federal agencies are viewed as models of progress. But living conditions 
										in other colonies still resemble those in third-world countries; 
										the state doesn’t want more of those developments.
									</p>
								</div>
								<hr />
								<div class="evidence">
									<h2>Our resurfaced street</h2>
									<img src="wp-content/themes/where_my_money_dey/images/town.jpg" />
									<img src="wp-content/themes/where_my_money_dey/images/typical-paved.jpg" />
									<img src="wp-content/themes/where_my_money_dey/images/bulldozer.jpg" />
									<img src="wp-content/themes/where_my_money_dey/images/paving.jpg" />
									<img src="wp-content/themes/where_my_money_dey/images/brickwork.jpg" />
									<img src="wp-content/themes/where_my_money_dey/images/market.jpg" />
								</div>
							</div>
							<section id="prompt" class="column full">
								<div class="grey-box">
									<h1>How have mining royalties changed <span>your</span> neighbourhood?</h1>
									<button id="testimony-trigger" onclick="toggleForm()">Share your story</button>
								</div>
							</section>
							<section id="testimony" class="column">
								<div class="gold-box story">
									<?php include 'form.php'; ?>
								</div>
							</section>

						</div>
					</section>

					<section id="company-payments" class="column">
						<div class="white-box">
							<h1>What The Numbers Tell Us:</h1>
							<div id="distribution-map" class="grey-box">
								<h1>Who Gets What</h1>
								<div style="width:100%!important">
									<?php map(); ?>
								</div>
							</div>
							<div id="region-overview" class="grey-box">
								<h1>Who Lives There</h1>
								<form method="get">
									<select name="region-name">
										<option value="Ghana">Ghana</option>
										<option value="Ashanti" selected="selected">Ashanti</option>
										<option value="Western">Western</option>
										<option value="Central">Central</option>
										<option value="Greater Accra">Greater Accra</option>
										<option value="Volta">Volta</option>
										<option value="Eastern">Eastern</option>
										<option value="Brong Ahafo">Brong Ahafo</option>
										<option value="Northern">Northern</option>
										<option value="Upper East">Upper East</option>
										<option value="Upper West">Upper West</option>
									</select>
									<button type="submit">GO</button>
								</form>
								<h1><span><?php echo $selectedRegion.":"; ?></span></h1>
								<div id="region-stats" >
									<div class="white-box">
										<h1>Total Population</h1>
										<h2><span><?php echo $region_population; ?></span></h2>
									</div>
									<div class="white-box">
										<h1>Area (in sq. km)</h1>
										<h2><span><?php echo $area_size; ?></span></h2>
									</div>
								</div>
							</div>
							<div id="companies" class="grey-box">
								<h1>Which Companies Are Active Here:</h1>	
								<?php echo $active_companies; ?>
							</div>		
						</div>		
					</section><!-- #company-payments -->
					
				</div>
			</div><!-- #bottom-cont -->

			<div id="getdata-cont">
				<div class="site-content wrap" role="main">
					<section>
						<div class="trigger-headers">
							<button id="data-trigger" onclick="toggleData();">Does the Data Lie?</button>
						</div>
						<div class="trigger-headers">
							<button id="build-trigger" onclick="toggleBuild();">Get The Data</button>
						</div>
					</section>
					<div id="revealdata">
						<h2>Help Us Get It Right</h2>
						<p>
							All the numbers above are based on official records. But, records are not always right. Sometimes errors slip 
							into the official record, both by mistake and deliberate distortion. Data shapes government policy and company actions, 
							so 'dirty data' can harm our communities. The new age of 'open data' and transparent governance means that us ordinary citizens 
							can now help ensure that errors are corrected. So, if you have evidence that any of the above numbers are wrong, please help us fix them.
						</p>
						<p>
							You can find the dataset that we used <a href="http://africaopendata.org/dataset/mineral-royalties-ghana" target="_blank">here</a>.
						</p>
					</div>
					
					<div id="revealbuild">
						<h2>Build Your Own Projects</h2>
						<p>
							Want to use the raw data to check the facts, or build your own projects? Where My Money Dey? is built with data that we pulled together from various 
							government and corporate sources. Some of this data had to be 'liberated' from paper documents which we had to digitise, or from static PDFs 
							which we had to turn into machine readable data. Everything has been uploaded onto the <a href="http://github.com/CodeForAfrica">openAFRICA.org</a> repository. You're welcome to re-use all 
							of this information, in any way you please and without any cost, as long as you acknowledge where you got the data from.
						</p>
					</div>
				</div>
			</div> <!-- #getdata-cont --> 

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
							<p class="blurb">
								Where My Money Dey? is a <span>volunteer-built</span> project designed to improve public accountability and civic engagement 
								through <span>active citizenry</span>. The prototype was built at Ghana's first ever <a href="http://ghana.databootcamp.org" target="_blank">d|Bootcamp</a> 
								that brought together journalists and hacktivists in October 2012. A 2nd iteration was refined at a follow-up d|Bootcamp in May 2013 
								with help from the <a href="http://code-africa.org/" target="_blank">Code for Africa</a> initiative.
							</p>
						</div>
					</section>

					<section id="advisory">
						<div>
							<img class="actnow-logo" src="wp-content/themes/where_my_money_dey/images/fist-icon.png" />
							<p style="margin-top: -25px"> <span>actNOW!</span></p>
							<p>	is a standalone project that helps citizens make their voices heard on issues 
								of public interest, by helping them to engage proactively with leaders in government, corporates, and others in 
								positions of power. </p>
							<br />
							<p><strong>actNow!</strong> is one of 20 recipients of seed grants in 2012 from the African News Innovation Challenge.</p> <br />
								<a href="http://africannewschallenge.org/" target="_blank"><img src="wp-content/themes/where_my_money_dey/images/anic.png" /></a>	
							</p>
						</div>
					</section>

					<section id="code" class="column full">
						<div class="white-box">
							<h1>Steal Our Code</h1>
							<p>
								The code for both Where My Money Dey? and <strong>actNOW!</strong> is open source. This means that you can use our code to build your own projects, 
								without any license cost or usage fees. You can find the code for both these projects, plus other African-built transparency 
								technologies, on our umbrella repository at Github.
							</p>
							<a href="https://github.com/CodeForAfrica" target="_blank"><img alt="Get the code!" src="wp-content/themes/where_my_money_dey/images/GitHub-Mark-64px.png" /></a></br>
						</div>
					</section>

					<section id="invitation">
						<p><strong>Still stumped?</strong></p>
						<p>If your grassroots community or social justice organisation doesn't have the technical capacity to use the code itself, we might still be able to help. 
						Give us a shout to see if we can connect you with local hacktivists.</p><br />
						<a href="mailto:info@code-africa.org"><img alt="Talk to us" src="wp-content/themes/where_my_money_dey/images/email-icon.png" /></a>
						<a href="http://twitter.com/code4africa"><img alt="Follow us on Twitter @code4africa" src="wp-content/themes/where_my_money_dey/images/twitter-icon.png" /></a>
					</section
				</div>
				</div>
			</div><!-- #footer-cont -->

			<div id="partner-logos">
				<div class="site-content wrap" role="main">
					<section id="partners">
						<h1>Made Possible By</h1>
						<div class="main-partners">
							<a href="http://africanmediainitiative.org/"><img class="ami" src="wp-content/themes/where_my_money_dey/images/ami-logo.png" /></a>
							<a href="http://wbi.worldbank.org/"><img class="wbi" src="wp-content/themes/where_my_money_dey/images/wbi-hires.png" /></a>
							<a href="http://code-africa.org/"><img class="c4a" src="wp-content/themes/where_my_money_dey/images/c4a.png" /></a>
						</div>

						<div class="capacity-partners">
							<h2>Capacity Partners</h2>
							<a href="https://groups.google.com/forum/?hl=en&fromgroups#!forum/hackshackers-ghana"><img src="wp-content/themes/where_my_money_dey/images/accra_side.gif" /></a>
							<a href="http://openinstitute.com/"><img src="wp-content/themes/where_my_money_dey/images/oi-transparent.png" /></a>
							<a href="http://www.icfj.org/"><img src="wp-content/themes/where_my_money_dey/images/icfj.png" /></a>
						</div>
					</section>
				</div>
			</div><!-- #partner-logos -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>