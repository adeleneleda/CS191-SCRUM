<h1>Welcome to Review Downloads!</h1>
<p>Download reviews here.</p>
<br/>

<?foreach($reviews as $review){?>
	<a href="<?= base_url()?>review_download/download/<?= $review['review_id']?>"><?= $review['filename']?></a>
	<br/>
<?}?>

