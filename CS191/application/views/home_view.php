<?if($this->session->userdata('activerole') == 'P'){?>
<script type = "text/javascript">

function showhideTable(what){
	$('.show_'+what).toggle();
	$('.hide_'+what).toggle();
}

</script>

		<div class="cleared"></div>   
        </div>
		<div class="cleared"></div>
    </div>
</div>

<div id = 'pending'>
<?if (!empty($proposals_approved)) { ?>
<div style="margin-left:17px">
<h1>Approved Proposals</h1>
<hr/>
</div>
<? foreach ($proposals_approved as $indiv_proposal) { ?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article" style="margin-left:20px">
			<h2 class="art-postheader"><a href = "<?= site_url('userhome/view_prop_info'."/".$indiv_proposal['proposal_id'])?>"><?=$indiv_proposal['title']?></a></h2> 
			<div class="art-postheadericons art-metadata-icons">
				<span class="art-postdateicon"><?=$indiv_proposal['status_date']?></span> <span class="art-postauthoricon">Author:
				
					<?
					$results = $this->db->query('SELECT lastname, firstname, middlename FROM proponent JOIN proposes USING (proponent_id) WHERE proposal_id  = '.$indiv_proposal['proposal_id'].';');
					$results = $results->result_array();
					?>
					<?$parts = array();
					foreach ($results as $indiv_author) { 
						$parts[] = $indiv_author['lastname'].", ".$indiv_author['firstname']." ".$indiv_author['middlename'];
					}
					
					$outstring  = implode(", ", $parts);
					
					
					?>
		<font face = "verdana" style="font-size:12px;"><?=$outstring?></font>

				
				</span>| Status: Approved
            </div>
            <div class="art-postcontent">
				<p>
				<?
				$results = $this->db->query('SELECT abstract FROM proposals WHERE proposal_id = '.$indiv_proposal['proposal_id'].';');
				$results = $results->result_array();
				?>
				<?=$results[0]['abstract']?>
				</p>
            </div>
            <div class="cleared"></div>   
        </div>
		<div class="cleared"></div>
    </div>
</div>
<?}?>
<?} else {?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<h1>Approved Proposals</h1>
		<hr/>
		<div style="margin-left:20px">You have no approved proposals.</div>
    </div>
</div>
<?}?>

<?if (!empty($proposals_pending)) { ?>
<div style="margin-left:17px">
<h1>Pending Proposals</h1>
<hr/>
</div>
<? foreach ($proposals_pending as $appr) { ?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article" style="margin-left:20px">
		<h2 class="art-postheader"><a href = "<?= site_url('userhome/view_prop_info'."/".$appr['proposal_id'])?>"><?=$appr['title']?></a></h2>  
			<div class="art-postheadericons art-metadata-icons">
				<span class="art-postdateicon"><?=$appr['status_date']?></span> <span class="art-postauthoricon">Author:
				
					<?
					$results = $this->db->query('SELECT lastname, firstname, middlename FROM proponent JOIN proposes USING (proponent_id) WHERE proposal_id  = '.$appr['proposal_id'].';');
					$results = $results->result_array();
					?>
					<?$parts = array();
					foreach ($results as $indiv_author) { 
						$parts[] = $indiv_author['lastname'].", ".$indiv_author['firstname']." ".$indiv_author['middlename'];
					}
					
					$outstring  = implode(", ", $parts);
					
					
					?>
		<font face = "verdana" style="font-size:12px;"><?=$outstring?></font>

				
				</span>| Status: Pending
				</div>
            <div class="art-postcontent">
				<p>
				<?
				$results = $this->db->query('SELECT abstract FROM proposals WHERE proposal_id = '.$appr['proposal_id'].';');
				$results = $results->result_array();
				?>
				<?=$results[0]['abstract']?>
				</p>
            </div>
		<div class="cleared"></div>   
        </div>
		<div class="cleared"></div>
    </div>
</div>
<?}?>
<?} else {?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<h1>Pending Proposals</h1>
		<hr/>
		<div style="margin-left:20px">You have no pending proposals.</div>
    </div>
</div>
<?}?>

<?if (!empty($proposals_disapproved)) { ?>
<div style="margin-left:17px">
<h1>Disapproved Proposals</h1>
<hr/>
</div>
<? foreach ($proposals_disapproved as $appr) { ?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article" style="margin-left:20px">
			<h2 class="art-postheader"><a style = "text-decoration : underline; color: #597F0B;" href = "<?= site_url('userhome/view_prop_info'."/".$appr['proposal_id'])?>"><?=$appr['title']?></a></h2>           
			<div class="art-postheadericons art-metadata-icons">
				<span class="art-postdateicon"><?=$appr['status_date']?></span> <span class="art-postauthoricon">Author:
				
					<?
					$results = $this->db->query('SELECT lastname, firstname, middlename FROM proponent JOIN proposes USING (proponent_id) WHERE proposal_id  = '.$appr['proposal_id'].';');
					$results = $results->result_array();
					?>
					<?$parts = array();
					foreach ($results as $indiv_author) { 
						$parts[] = $indiv_author['lastname'].", ".$indiv_author['firstname']." ".$indiv_author['middlename'];
					}
					
					$outstring  = implode(", ", $parts);
					
					
					?>
		<font face = "verdana" style="font-size:12px;"><?=$outstring?></font>

				
				</span>| Status: Disapproved
			</div>
            <div class="art-postcontent">
				<p>
				<?
				$results = $this->db->query('SELECT abstract FROM proposals WHERE proposal_id = '.$appr['proposal_id'].';');
				$results = $results->result_array();
				?>
				<?=$results[0]['abstract']?>
				</p>
            </div>
		<div class="cleared"></div>   
        </div>
		<div class="cleared"></div>
    </div>
</div>			
	<?}?>
<?} else {?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<h1>Disapproved Proposals</h1>
		<hr/>
		<div style="margin-left:20px">You have no disapproved proposals.</div>
    </div>
</div>
<?}?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
<?}else if($this->session->userdata('activerole') == 'R'){?>
			<div class="cleared"></div>   
        </div>
		<div class="cleared"></div>
    </div>
</div>

<script>
	$(document).ready(function() {															
		$(".art-button").click(function(){
			window.location.replace("<?=base_url()?>review/index/" + $(this).val());
		});
	});																																									
</script>

<?if (!empty($review_proposals)) { ?>
<div style="margin-left:17px">
<h1>Pending Proposals</h1>
<hr/>
</div>
<? foreach ($review_proposals as $prop) { ?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article" style="margin-left:20px">
		<table width="100%">
		<tr>
		<td width="80%" style="border:none;">
		<h2 class="art-postheader"><a href = "<?= site_url('userhome/view_prop_info'."/".$prop['proposal_id'])?>"><?=$prop['title']?></a></h2>
		</td>
		<td style="border:none; vertical-align:middle">
		<button class="art-button reviewprop" value="<?= $prop['proposal_id']?>">Review Proposal</button>
		</td>
		</tr>
		</table>
			<div class="art-postheadericons art-metadata-icons">
				<span class="art-postdateicon"><?=$prop['status_date']?></span> | <span class="art-postauthoricon">Author <a title="Posts by Admin"><?=$prop['lastname']?>, <?=$prop['firstname']?> <?=$prop['middlename']?></a></span> | Status: Pending
			</div>
            <div class="art-postcontent">
				<p>
				<?=$prop['abstract']?>
				</p>
            </div>
		<div class="cleared"></div>   
        </div>
		<div class="cleared"></div>
    </div>
</div>
<?}?>
<?} else {?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<h1>Pending Proposals</h1>
		<hr/>
		<div style="margin-left:20px">You have no pending proposals.</div>
    </div>
</div>
<?}?>

<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article">
<?}?>