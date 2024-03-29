<br/>
<a style="color: #597F0B; text-decoration : underline; font-family: Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, Sans-Serif;" href="<?= base_url()?>userhome">Back to list of pending proposals.</a>
<br/>
<br/>
<h1>Welcome to Review Module!</h1>
<p>Submit your review for <?=$proposal_details['title']?> by <?=$proposal_details['lastname']?>, <?=$proposal_details['firstname']?> <?=$proposal_details['middlename']?></p>
<br/>

<script>
	$(document).ready(function() {															
		$("#approve").click(function(){
			$("#uploadreason").slideUp();
			$("#uploadfile").slideDown();
		});
		
		$("#disapprove").click(function(){
			$("#uploadreason").slideUp();
			$("#uploadfile").slideDown();
		});
		
		$("#abstain").click(function(){
			$("#uploadfile").slideUp();
			$("#uploadreason").slideDown();
		});
	});																																									
</script>

<form action="<?= base_url()?>review/submit/<?= $proposalid?> " method="post" enctype="multipart/form-data">
	<div style="padding:20px; background-color: rgba(146,166,113,.2)">
	<table width="100%" border="0" cellpadding="1" cellspacing="1">
		<tr> 
			<td width="25%" style="border:none; vertical-align:middle">
				Verdict
			</td>
			<td style="border:none;">
				<label>
				<input id="approve" style="margin-bottom:5px" name="verdict" type="radio" value="1"/>			
				Approve
				</label><br/>
				<label>
				<input id="disapprove" style="margin-bottom:5px" name="verdict" type="radio" value="2"/>
				Disapprove
				</label><br/>
				<label>
				<input id="abstain" style="margin-bottom:5px" name="verdict" type="radio" value="0"/>
				Abstain
				</label>
			</td>
		</tr>
		<tr> 
			<td width="20%" style="border:none">
				<div id="uploadfile">Upload Decision</div>
				<div id="uploadreason" style="display:none">Upload Reason</div>
			</td>
			<td width="80%" style="border:none">
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
				<input name="userfile" type="file" id="userfile"/> 
			</td>
		</tr>
		<tr> 
			<td width="20%" style="border:none">
				Comments
			</td>
			<td width="80%" style="border:none">
				<textarea name="comment" style="width:350px; height:150px"></textarea>
			</td>
		</tr>
	</table>
	</div>
	<br/>
	<div align="center"><input type="submit" value=" Submit Review "></div>
</form>