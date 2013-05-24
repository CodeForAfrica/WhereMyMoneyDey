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

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div id="year" class="aligncenter">
				<form>
					<section class="main">
						<div class="wrapper-demo">
							<div id="dd" class="wrapper-dropdown-1" tabindex="1">
									<span>Select Year</span>
								    <ul class="dropdown" tabindex="1" >
								        <li><a href="#" value='2006'>2006</a></li>
								        <li><a href="#" value='2007'>2007</a></li>
								        <li><a href="#" value='2008'>2008</a></li>
								        <li><a href="#" value='2009'>2009</a></li>
								        <li><a href="#" value='2010'>2010</a></li>
								        <li><a href="#" value='2011'>2011</a></li>
								    </ul>
							</div>
				​		</div>
					</section>
				</form>
				<?php include "wp-content/themes/where_my_money_dey/dropdown/dropdown.php"; ?>
			</div>
			<div id="loading" align='center'>
				<img src='wp-content/themes/where_my_money_dey/mapthingy/loader.gif'>
			</div>
			<script type="text/javascript">document.getElementById("loading").style.display = 'none';</script>
			<div id="context">
				
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>