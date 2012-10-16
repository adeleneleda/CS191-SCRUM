<script type = "text/javascript">

function backna() {
		document.location = '<?= site_url('userhome') ?>';
		}

</script>


            <div class="cleared"></div>   
        </div>
		<div class="cleared"></div>
    </div>
</div>



<div style = "margin:20px">


<font face="helvetica" style="font-size:12px;"><a style='color: #597F0B; text-decoration : underline; font-family: Lucida Sans Unicode", "Lucida Grande", Sans-Serif;' href="javascript:backna()">Back to all Proposals page.</a></font>
<br/><br/>

<h1><?=$abstract_info[0]['title']?></h1>
<br/>
	 <div>
				<span class="art-postdateicon"><?=$abstract_info[0]['status_date']?></span> <span class="art-postauthoricon">Author:
				
					
					<?$parts = array();
					foreach ($authors as $indiv_author) { 
						$parts[] = $indiv_author['lastname'].",".$indiv_author['firstname']." ".$indiv_author['middlename'];
					}
					
					$outstring  = implode(", ", $parts);
					
					
					?>
		<font face = "verdana" style="font-size:12px;"><?=$outstring?></font>

				
				</span>
            </div>
			
		
		
		<br/>
		
		<a href="<?= base_url()?>userhome/download/<?=$proposal_id?>">Download file.</a>
		<br/>
		<br/>
		<font face = "verdana" style="font-size:14px;">ABSTRACT:</font> <br/>		
		<font face = "verdana" style="font-size:12px;"><?=$abstract_info[0]['abstract']?></font><br/>


</div>







<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article">
			
