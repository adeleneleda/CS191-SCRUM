														<div class="cleared"></div>   
														</div>
													<div class="cleared"></div>
													</div>
												</div>
											</div>
											<div class="art-layout-cell art-sidebar1">
												<div class="art-box art-block">
													<div class="art-box-body art-block-body">
														<div class="art-bar art-blockheader" align="center">
															<script type="text/javascript">
															$(document).ready(function() {
																$("#userrole").click(function(){
																	<?
																	$userroles = $this->session->userdata('userroles');
																	 
																	if(count($userroles) > 1){
																	?>
																	$(this).hide();
																	$("#roleselect").show();
																	<?}?>
																});
																
																$("#roleselect").change(function(){
																	window.location.replace("<?=base_url()?>userhome/changerole/" + $(this).val());
																});
															});
															</script>
															<h3 class="t" style="color:white;">You are logged in as 
															<select id="roleselect" style="display:none; font-family:arial; width:100px;">
																<option <?if($this->session->userdata('activerole') == 'P') echo 'selected="selected"';?>value="P" >Proponent</option>
																<option <?if($this->session->userdata('activerole') == 'R') echo 'selected="selected"';?>value="R">Reviewer</option>
															</select>
															<a href="#" id="userrole" style="text-decoration:underline; color:white">
															<?if($this->session->userdata('activerole') == 'P'){?>
																Proponent
															<?}else if($this->session->userdata('activerole') == 'R'){?>
																Reviewer
															<?}?>
															</a>
															</h3>
														</div>
														<div class="cleared"></div>
													</div>
												</div>
												<div class="cleared"></div>
												<div class="art-box art-vmenublock">
													<div class="art-box-body art-vmenublock-body">
														<div class="art-bar art-vmenublockheader">
															<h3 class="t">Pages</h3>
														</div>
														<div class="art-box art-vmenublockcontent">
															<div class="art-box-body art-vmenublockcontent-body">
																<ul class="art-vmenu">
																	<li>
																		<a href="#">Item</a>
																		<ul>
																			<li><a href="#">Subitem 1</a></li>
																			<li><a href="#">Subitem 2</a></li>
																			<li><a href="#">Subitem 3</a></li>
																		</ul>
																	</li>	
																	<li>
																		<a href="#">News</a>
																		<ul>
																			<li><a href="#">Top 10</a></li>
																		</ul>
																	</li>	
																	<li><a href="#">Video</a></li>	
																	<li>
																		<a href="#">Archive</a>
																		<ul>
																			<li><a href="#">2008</a>
																				<ul>
																					<li><a href="#">January</a></li>
																					<li><a href="#">February</a></li>
																					<li><a href="#">March</a></li>
																				</ul>
																			</li>
																			<li>
																				<a href="#">2007</a>
																				<ul>
																					<li><a href="#">January</a></li>
																					<li><a href="#">February</a></li>
																					<li><a href="#">March</a></li>
																				</ul>
																			</li>
																			<li><a href="#">2006</a>
																				<ul>
																					<li><a href="#">January</a></li>
																					<li><a href="#">February</a></li>
																					<li><a href="#">March</a></li>
																				</ul>
																			</li>
																		</ul>
																	</li>	
																	<li><a href="#">Forum</a></li>	
																	<li><a href="#">About</a></li>	
																	<li><a href="#">Contact</a></li>	
																</ul>
																<div class="cleared"></div>
															</div>
														</div>
													<div class="cleared"></div>
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
											<p>Copyright � 2012. All Rights Reserved.</p>
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