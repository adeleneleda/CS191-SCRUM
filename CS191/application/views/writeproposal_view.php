<meta charset="utf-8" />
		<title>jQuery UI Datepicker - Format date</title>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css" />
		<script>
		$(function() {
			$( "#startdate" ).datepicker();
		$( "#startdate" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		});
		</script>
		<style>
		.ui-datepicker
		{
			font-size:62.5%;
		}
		</style>

			<meta charset="utf-8" />
		<title>jQuery UI Datepicker - Format date</title>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css" />
		<script>
		$(function() {
			$( "#enddate" ).datepicker();
		$( "#enddate" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		});
		</script>
		<style>
		.ui-datepicker
		{
			font-size:62.5%;
		}

		</style>
		
		
<h1>Write a Proposal</h1>
<?php
    $db_host = "localhost";
    $db_username = "root";
    $db_pass = "12345";
    $db_name = "rsportal";

    $con = mysql_connect ("$db_host", "$db_username", "$db_pass") or die ("Unable to connect to MySQL");
    mysql_select_db ("$db_name", $con) or die ("Database was not found");
    $ctr = 0;
    $name_value = array();
    if(!empty($the_list)){
        while($ctr < count($the_list))
        {
            $name = "select lastname, firstname, middlename from proponent where proponent_id=" . (int)$the_list[$ctr] . ";"; 
            $nameres = mysql_query($name);
            while($row = mysql_fetch_array($nameres))
            {
                $lvalue = $row['lastname'];
                $fvalue = $row['firstname'];
                $mvalue = $row['middlename'];
                array_push($name_value, $lvalue . ", " . $fvalue . " " . $mvalue);
            }
            $ctr++;
        }
    }
?>
<br />
<br />
<?php
$ctr = 0;
$v = 0;
if(!empty($the_list)){
    while($ctr < count($the_list))
    {       
        if($ctr == 0)
        {
            echo "Main proponent: " . $name_value[$ctr];
            echo "<br />";
            echo "<br />";
        }
        else
        {
            if($v == 0)
            {
                echo "Co - Proponents: ";
                echo "<br />";
                echo "<br />";
                $v = 1;
            }
            echo $name_value[$ctr];
        ?>
		<a href="<?=site_url('writeproposal/remove_proponent' . "/" . $the_list[$ctr])?>">x</a>
        <?php
            echo "<br />";
            echo "<br />";
        }
        $ctr++;
    }
}
?>

<?php
    if(empty($addcop))
    {
?>
        <a href="<?=site_url('writeproposal/add_coproponent')?>">Add Co-porponents</a>
   
   <?php
   }
   else{
   
   ?>


<form action="<?=base_url()?>writeproposal/add_proponent" method="post">
<?php
$db_host = "localhost";
$db_username = "root";
$db_pass = "12345";
$db_name = "rsportal";

$con = mysql_connect ("$db_host", "$db_username", "$db_pass") or die ("Unable to connect to MySQL");
mysql_select_db ("$db_name", $con) or die ("Database was not found");

$name = "select proponent_id, lastname, firstname, middlename from proponent";
$id = "select proponent_id from proponent";
$nameresult = mysql_query($name);
$idresult = mysql_query($id);

$num_results = mysql_num_rows($nameresult);

if ($num_results > 0){
    $name_values = array(); //array to hold values
    $id_values = array();
}

while($row = mysql_fetch_array($nameresult))
{
    $valid = 0;
    $value = $row['proponent_id'];
    if(!empty($the_list))
    {
        $ctr = 0;
        while($ctr < count($the_list))
        {
            if($value == $the_list[$ctr])
            {
                $valid = 1;
                break;
            }
            $ctr++;
        }
    }
    $lvalue = $row['lastname'];
    $fvalue = $row['firstname'];
    $mvalue = $row['middlename'];
    if($valid == 0)
    {   
        array_push($id_values, $value);
        array_push($name_values, $lvalue . ", " . $fvalue . " " . $mvalue);
    }
}
$ctr = 0;
?>
    <?php if(!empty($name_values)){
        echo "Co - Proponent's Name:";
    ?>
                <select name="proponent">;
                <?php
                            while ($name_values[$ctr] != null){
                                echo '<option value=' . $id_values[$ctr] . '>' . $name_values[$ctr] . '</option>';
                                $ctr++;
                              }
                ?>
                </select>
                <br />
                <br />
                <input type="submit" value="Add a Co - Proponent"/>
                </form>
                <?php
                }
    else{
    echo "Co - Proponent list is empty.";
    ?>
            <br />
            <br />
            <input type="submit" disabled="disabled" value="Add a Co - Proponent"/>
            </form>
    <?php
    }
    ?>
    
    <?php
    }
    ?>

<form action="<?=base_url()?>writeproposal/submit" method="post" enctype="multipart/form-data">
<?php
 
if(!empty($emptyfields))
{
    echo $emptyfields;
}
if(!empty($date_error))
{
    echo $date_error;
}
?>
<br />
<br />
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
	<td> Research Title: </td>
	<td> <input type="text" name="title"/> </td>
</tr>
<tr>
	<td> Research Abstract: </td>
	<td> <textarea type="text" rows="4" cols="50" name="abstract"> </textarea> </td>
</tr>
<tr>
	<td> <label for="file">Research Proposal:</label> </td>
	<td> <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
	<input type="file" name="file" id="file" />  </td>
</tr>
<tr>
	<td> Funding Required:</td>
	<td> Php<input type="integer" name="funding"/> </td>
</tr>
<tr>	 
	<td> Proposed Start Date: </td> 
	<td> <input type="date" id="startdate" name="startdate" size="10" /></td>	
</tr>		 
<tr> 
	<td> Proposed End Date: </td>
	<td> <input type="date" id="enddate" name="enddate" size="10" /> </td>
</tr>
<tr>
	<td colspan="2"> <input type="submit" value="Submit a Proposal" /> </td>
</tr>
</form>
</table>
