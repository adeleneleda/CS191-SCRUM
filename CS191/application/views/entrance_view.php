<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
	<head>
		<!--
		Created by Artisteer v3.1.0.48375
		Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
		-->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>UP DCS Research Submission Portal</title>
		<link rel="stylesheet" href="<?= base_url() ?>stylesheets/style.css" type="text/css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
		<script type="text/javascript" src="<?= base_url() ?>javascripts/jquery.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>javascripts/script.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>javascripts/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="<?= base_url()?>javascripts/jquery-ui-1.8.23.custom.min.js"></script>
		<script> 	
		
		function toggleshowhide() {
		 $('#aaaa').slideToggle();
		}
		
		function backna() {
		document.location = '<?= site_url('home') ?>';
		}
		</script>
		
		
		
		
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
					<div class="art-bar art-nav"></div>
						<div class="art-header">
							<div>
								<table width="100%">
									<tr>
										<td width="65%">
											<img src="<?= base_url() ?>images/banner.png" width="300px" height="180" style="margin-left:180px; margin-top:10px;"/>
											<h1 class="art-logo-name" style="margin-left:30px"><a href="#">DCS Research Submission Portal</a></h1>
											<h2 class="art-logo-text" style="margin-left:280px">UP Diliman</h2>
										</td>
										<td>
											<form action="<?= base_url() ?>home/login" method="post">
											<div style="background-color:rgba(256,256,256,.7); width:290px; padding:10px">
												<div>
												<div id="login_error" style="display:none; background-color:#B22222; padding:5px; color:white;"><?= $error?></div>
												</div>
												<table width="100%">
													<tr>
														<td>UP Webmail:</td>
														<td><input name="upwebmail"/></td>
													</tr>
													<tr>
														<td>Password:</td>
														<td><input type="password" name="password"/></td>
													</tr>
													<tr>
														<td></td>
														<td><input type="submit" value="Login"/></td>
													</tr>
												</table>
											<div>
											</form>
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
												<div class="cleared"></div>
												
												<h1>View Proposals</h1>
												
	
<br/>




<? if (isset($search)) {?>


<font face="helvetica" style="font-size:15px;"><a style='color: #597F0B; text-decoration : underline; font-family: Lucida Sans Unicode", "Lucida Grande", Sans-Serif;' href="javascript:backna()">Back to all approved proposals.</a></font>
<br/><br/>
<?}?>

<font face="helvetica" style="font-size:15px;"><a style='color: #597F0B; text-decoration : underline; font-family: Lucida Sans Unicode", "Lucida Grande", Sans-Serif;' href="javascript:toggleshowhide()">SEARCH PROPOSALS</a></font>
<br/>

<? if (isset($search)) {?>
<?if (!empty($a)) { ?>
	<br/>
	<font face="helvetica" style="font-size:12px;"><a style='color: #597F0B;  font-family: Lucida Sans Unicode", "Lucida Grande", Sans-Serif;'>Searched Proponent: <?=$a?> </a></font>
<?}?>
<?if (!empty($b)) { ?>
	<br/>
	<font face="helvetica" style="font-size:12px;"><a style='color: #597F0B; font-family: Lucida Sans Unicode", "Lucida Grande", Sans-Serif;'>Searched Year: <?= $b?> </a></font>
<?}?>
<?if (!empty($c)) { ?>
	<br/>
	<font face="helvetica" style="font-size:12px;"><a style='color: #597F0B;font-family: Lucida Sans Unicode", "Lucida Grande", Sans-Serif;'>Searched Keyword: <?=$c?> </a></font>
<?}?>
<?}?>

<br/>
<br/>

<div id = "aaaa" style="display:none;">
	You can search all the approved proposals by title or topic and/or proponents and/or by year of approval.<br/>
	You can leave other fields blank if you wish to only search by a certain category.<br/><br/>
	<form action="<?=site_url()?>home/prop_search" method = "post">
		<table >
			<tr>
			<td>Title / Topic</td>
			<td><input style = "width: 250px; height: 20px; padding: 5px;" name = "keyword" type = "text"></input></td>
			</tr>
			
			<tr>
			<td>Proponent</td>
			<td><input style = "width: 250px; height: 20px; padding: 5px;" name = "proponent" type = "text"></input></td>
			</tr>
			
			<tr>
			<td>Year</td>
				<td>
					<select name="year">	
						<option value="">Choose a Year</option>
					<? foreach($years as $y): ?>
						<option value="<?= $y['year'] ?>"> <?= $y['year']  ?></option>
					<? endforeach; ?>
					</select>
				</td>
			</tr>

			<tr></tr>
			<tr>
			<td colspan = "2"><input style="margin: 5px 1px;" type="submit" value = "Search for Proposals"></input></td>
			</tr>
		</table>
	</form>
</div>
<br/>												
<?foreach ($proposal as $indiv_proposal) { ?>


	
	<font face="helvetica" style="font-size:25px;"><a style='color: #D97511; text-decoration : underline; font-family: Lucida Sans Unicode", "Lucida Grande", Sans-Serif;' href = "<?= site_url('home/view_prop_info'."/".$indiv_proposal['proposal_id'])?>"><?=$indiv_proposal['title']?></a></font><br/>
	<br/>
	 <div>
				<span class="art-postdateicon"><?=$indiv_proposal['status_date']?></span> <span class="art-postauthoricon">Author:
				
				
					<?$parts = array();
					foreach ($indiv_proposal['author'] as $indiv_author) { 
						$parts[] = $indiv_author;
					}
					
					$outstring  = implode(", ", $parts);
					
					
					?>
		<font face = "verdana" style="font-size:12px;"><?=$outstring?></font>

				
				</span>
            </div>
			
			

		
	<div>
	
	</div>
	

	



<hr size=2 noshade>
<?}?>				
											</div>
											</div>
										</div>
									</div>
								</div>
								<div class="cleared"></div>
								<div class="art-footer">
									<div class="art-footer-body">
										<div class="art-footer-text">
											<p>UP Diliman - Department of Computer Science</p>
											<p>Copyright © 2012. All Rights Reserved.</p>
										</div>
										<div class="cleared"></div>
									</div>
								</div>
							<div class="cleared"></div>
					</div>
				</div>
			</div>
			<div class="cleared"></div>
				<p class="art-page-footer"></p>
			<div class="cleared"></div>
		</div>
	</body>
</html>