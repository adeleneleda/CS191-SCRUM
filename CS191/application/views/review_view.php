<h1>Welcome to Review Module!</h1>
<p>Submit your review for Proposal 1</p>
<br/>

<form action="<?= base_url()?>review/submit" method="post" enctype="multipart/form-data">
	<div style="padding:20px; background-color: rgba(146,166,113,.2)">
	<table width="100%" border="0" cellpadding="1" cellspacing="1">
		<tr> 
			<td width="20%" rowspan="2" style="border:none">
				Verdict
			</td>
			<td width="80%" style="border:none">
				<label>
				<input style="margin-bottom:5px" name="verdict" type="radio" value="1"/>			
				Approve
				</label>
			</td>
		</tr>
		<tr>
			<td style="border:none">
				<label>
				<input style="margin-bottom:5px" name="verdict" type="radio" value="0"/>
				Disapprove
				</label>
			</td>
		</tr>
		<tr> 
			<td width="20%" style="border:none">
				Upload File
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