<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
	<head>
		<!--
		Created by Artisteer v3.1.0.48375
		Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
		-->
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>UP DCS Research Submission Portal</title>
		<link rel="stylesheet" href="<?= base_url() ?>stylesheets/style.css" type="text/css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
		<script type="text/javascript" src="<?= base_url() ?>javascripts/jquery.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>javascripts/script.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>javascripts/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="<?= base_url()?>javascripts/jquery-ui-1.8.23.custom.min.js"></script>
	</head>
	<body>
		<script type="text/javascript">
		$(document).ready(function() {
			<?
			if($error){
				echo '$("#login_error").show();';
				echo '$("#login_error").effect( "highlight", {color:"red"}, 1000 );';
			}
			?>
		});
		</script>
		
		<div id="art-page-background-glare-wrapper">
			<div id="art-page-background-glare"></div>
		</div>
		<div id="art-main">
			<div class="cleared reset-box"></div>
			<div class="art-box art-sheet">
				<div class="art-box-body art-sheet-body">
					<div class="art-bar art-nav">
							<div class="art-nav-outer">
								<ul class="art-hmenu">
									<li>
										<a href="<?base_url()?>userhome" class="active">Home</a>
									</li>
									<li>
										<a href="<?base_url()?>userhome/writeproposal">Write a Proposal</a>
									</li>	
									<li>
										<a href="<?base_url()?>review">Submit Review</a>
									</li>
									<li>
										<a href="">About</a>
									</li>	
									<li				
										<a href="<?base_url()?>userhome/logout">Logout</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="art-header">
							<div>
							<table>
								<tr>
								<td>
								<img src="<?= base_url() ?>images/banner.png" width="300px" height="180" style="vertical-align:top; margin-left:35px; margin-top:40px;"/>
								</td>
								<td>
								<h1 class="art-logo-name" style="margin-left:30px; margin-top:50px"><a href="<?= base_url()?>userhome">DCS Research Submission Portal</a></h1>
								<h2 class="art-logo-text" style="margin-left:280px">UP Diliman</h2>
								</td>
								</tr>
							</table>		
							</div>		
						</div>
						<div class="cleared reset-box"></div>
						<div class="art-layout-wrapper">
							<div class="art-content-layout">
								<div class="art-content-layout-row">
									<div class="art-layout-cell art-content">
										<div class="art-box art-post">
											<div class="art-box-body art-post-body">
												<div class="art-post-inner art-article">