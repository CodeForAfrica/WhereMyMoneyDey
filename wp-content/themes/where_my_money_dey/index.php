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
			</div>

			<div id="bottom-cont">

				<div class="site-content wrap" role="main">

					<section id="infrastructure" class="column full">
						<div class="grey-box">
							<h1>Your royalties were used for:</h1>
							<div id="services" >
								<div class="industry-container">
									<div class="industry"> 
										<img src="wp-content/themes/where_my_money_dey/images/education-icon.png"; />
										<h1>Education</h1>
									</div>
									<div class="facilities">
										<h2>0</h2>
									</div>
								</div>
								<div class="industry-container">
									<div class="industry">
										<img src="wp-content/themes/where_my_money_dey/images/health-icon.png"; />
										<h1>Health</h1>
									</div>
									<div class="facilities">
										<h2>0</h2>
									</div>
								</div>
								<div class="industry-container">
									<div class="industry">
										<img src="wp-content/themes/where_my_money_dey/images/sanitation-icon.png"; />
										<h1>Sanitation</h1>
									</div>
									<div class="facilities">
										<h2>0</h2>
									</div>
								</div>
								<div class="industry-container">
									<div class="industry">
										<img src="wp-content/themes/where_my_money_dey/images/transport-icon.png"; />
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
							<img src="wp-content/themes/where_my_money_dey/images/fist-icon.png"; />
							<h1>actNOW</h1>
							<p>
								<button onclick="showPet()"><a>Petition</a></button>
								<button><a>Connect</a></button>
								<button><a>Share</a></button>
								<button><a>Update</a></button>
							</p>
							<div id="call-to-action">
								<p>
									Not happy with the amount of royalties paid to your community, or with how your royalties were used? Sign a petition to do something about it!
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
							<h1>REGION OVERVIEW</h1>
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
									<img src="wp-content/themes/where_my_money_dey/images/abeeku.png"; />
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
								<img src="wp-content/themes/where_my_money_dey/images/market.jpg"; />
								<img src="wp-content/themes/where_my_money_dey/images/swamp-2.jpg"; />
								<img src="wp-content/themes/where_my_money_dey/images/wetlands.jpg"; />
								<img src="wp-content/themes/where_my_money_dey/images/obuasi.jpg"; />
								<img src="wp-content/themes/where_my_money_dey/images/worksite.jpg"; />
								<img src="wp-content/themes/where_my_money_dey/images/swamp.jpg"; />
							</div>
						</div>
						<div class="grey-box">
							<div class="profile" style="width:100%">
								<div>
									<img src="wp-content/themes/where_my_money_dey/images/boah.png"; />
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
								<img src="wp-content/themes/where_my_money_dey/images/town.jpg"; />
								<img src="wp-content/themes/where_my_money_dey/images/typical-paved.jpg"; />
								<img src="wp-content/themes/where_my_money_dey/images/bulldozer.jpg"; />
								<img src="wp-content/themes/where_my_money_dey/images/paving.jpg"; />
								<img src="wp-content/themes/where_my_money_dey/images/brickwork.jpg"; />
								<img src="wp-content/themes/where_my_money_dey/images/market.jpg"; />
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
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>