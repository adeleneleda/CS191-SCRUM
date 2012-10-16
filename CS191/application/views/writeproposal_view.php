<h1>Write a Proposal</h1>
<?php
    $db_host = "localhost";
    $db_username = "root";
    $db_pass = "";
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
Proponents:
<br />
<?php
$ctr = 0;
if(!empty($the_list)){
    while($ctr < count($the_list))
    {       
        if($ctr == 0)
        {
            echo $name_value[$ctr];
        }
        else
        {
            echo $name_value[$ctr];
        ?>
		<a href="<?=site_url('writeproposal/remove_proponent' . "/" . $the_list[$ctr])?>">x</a>
        <?php
        }
        echo "<br />";
        echo "<br />";
        $ctr++;
    }
}
?>


<form action="<?=base_url()?>writeproposal/add_proponent" method="post">
<?php
$db_host = "localhost";
$db_username = "root";
$db_pass = "";
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

Proponent's Name: <select name="proponent">
                        <?php
                            while ($name_values[$ctr] != null){
                                echo '<option value=' . $id_values[$ctr] . '>' . $name_values[$ctr] . '</option>';
                                $ctr++;
                              }
                        ?>
                </select>
<br />
<br />
<input type="submit" value="Add a Proponent"/>
</form>
<br />
<br />

<form action="<?=base_url()?>writeproposal/submit" method="post" enctype="multipart/form-data">
<?php
 
if(!empty($emptyfields))
{
    echo $emptyfields;
}
?>
<br />
<br />
Research Title: <input type="text" name="title"/>
<br />
<br />
Research Abstract: 
<textarea type="text" rows="4" cols="50" name="abstract">
</textarea>
<br />
<br />
<label for="file">Research Proposal:</label>
<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
<input type="file" name="file" id="file" /> 
<br />
<br />
Funding Required: Php<input type="integer" name="funding"/>
<br />
<br />
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
</head>
<body>
 
<p>Proposed Start Date: <input type="date" id="startdate" name="startdate" size="10" /></p>
<br />
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
</head>
<body>
 
<p>Proposed End Date: <input type="date" id="enddate" name="enddate" size="10" /></p>
<br/ >
<input type="submit" value="Submit a Proposal" />
</form>
