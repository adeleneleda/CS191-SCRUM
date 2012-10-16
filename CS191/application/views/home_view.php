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


<h2 class="art-postheader" style='font-size:25px;'>Approved Proposals</h2>
<?if (!empty($proposals_approved)) { ?>
<? foreach ($proposals_approved as $appr) { ?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article">
			<h2 class="art-postheader"><a style = "text-decoration : underline; color: #597F0B;" href = "<?= site_url('userhome/view_prop_info'."/".$appr['proposal_id'])?>"><?=$appr['title']?></a></h2>           
            <div class="cleared"></div>   
        </div>
		<div class="cleared"></div>
    </div>
</div>
<?}?>
<?} else {?>
	<div style = "margin:15px;">*  You have no approved proposals.</div>
<?}?>



<h2 class="art-postheader" style='font-size:25px;'>Pending Proposals</h2>
<?if (!empty($proposals_pending)) { ?>
<? foreach ($proposals_pending as $appr) { ?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article">
		<h2 class="art-postheader"><a style = "text-decoration : underline; color: #597F0B;" href = "<?= site_url('userhome/view_prop_info'."/".$appr['proposal_id'])?>"><?=$appr['title']?></a></h2>           
		<div class="cleared"></div>   
        </div>
		<div class="cleared"></div>
    </div>
</div>
<?}?>
<?} else {?>
	<div style = "margin:15px;">*  You have no pending proposals.</div>
<?}?>


<h2 class="art-postheader" style='font-size:25px;'>Disapproved Proposals</h2>
<?if (!empty($proposals_disapproved)) { ?>
<? foreach ($proposals_disapproved as $appr) { ?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article">
			<h2 class="art-postheader"><a style = "text-decoration : underline; color: #597F0B;" href = "<?= site_url('userhome/view_prop_info'."/".$appr['proposal_id'])?>"><?=$appr['title']?></a></h2>           

            <div class="cleared"></div>   
        </div>
		<div class="cleared"></div>
    </div>
</div>
<?}?>
<?} else {?>
	<div style = "margin:15px;">*  You have no disapproved proposals.</div>
<?}?>


</div>






<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article">
			
