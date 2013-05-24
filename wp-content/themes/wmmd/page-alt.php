<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Where My Money Dey?
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<div>
				<form>
					<select style='width:70%' name="URL" onchange="window.location.href='?year='+this.form.URL.options[this.form.URL.selectedIndex].value">
						<option>Select Year</option>
						<option value='2006'>2006</option>
						<option value='2007'>2007</option>
						<option value='2008'>2008</option>
						<option value='2009'>2009</option>
						<option value='2010'>2010</option>
						<option value='2011'>2011</option>
					</select>
				</form>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->
