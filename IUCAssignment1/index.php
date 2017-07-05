<?php

/* Connection Parameters PRIVATE!*/
$host = "***";
$username = "***";
$password = "***";
$database = "***";
$newline = "<br/>";

/* MySql Connection. */
$con = mysqli_connect($host,$username,$password,$database);

if (!$con) {
    echo "Unable to connect to the MySql database. Please verify the configuration." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}

echo "  Connected to the remote MySql Database.  " . PHP_EOL;
if (!isset($_POST['id'])){

$xml=simplexml_load_file('http://www.iu.edu/~iubweb/academic/majors/xml/degree-list.xml');	//xml loaded from the given link.
// echo $newline;
// echo "XML file found.";
/* Deleting the degrees table if it exist */
$delete_query = "DROP TABLE DEGREES";
if($con->query($delete_query)){
	// echo "Existing Table Dropped";
}
else{
	// Degrees table doesn't exist!
}

$columns = [];	//column names are stored in this array.
$number_of_rows = count($xml->degree);	//total number of degrees in the given xml.

/* populating the columns array with the xml attributes of the first degree */
$i=0;	
$number_of_columns = 0;
foreach($xml->degree[0]->attributes() as $a => $b) {
    $columns[$i]=$a;
    $i++;
}
$number_of_columns = $i;	//current value of the number of columns(attributes of each xml record).

/* Table Creation Query */
$query_table_creation = " CREATE TABLE DEGREES (
	$columns[0] VARCHAR(300) ,
	$columns[1] VARCHAR(300) ,
	$columns[2] VARCHAR(300) NOT NULL,
	$columns[3] VARCHAR(300) NOT NULL,
	$columns[4] VARCHAR(300) NOT NULL,
	$columns[5] VARCHAR(300) ,
	$columns[6] VARCHAR(300) NOT NULL,
	$columns[7] VARCHAR(300) 
	);";
echo $newline;
$result = $con->query($query_table_creation);
if($result == 1){
	echo "  Table Created  ";
}

/* Inserting the values of the given XML into the degrees table created above. */
$i=0;	//temporary looping parameters.
$j=0;	//temporary looping parameters.
while($j<$number_of_rows){	//looping until j is equal to number of records in the xml.
	$values= [];
	foreach($xml->degree[$j]->attributes() as $a => $b) {	//looping through all the xml records.
    $values[$i] = "'".$b."'";	//adding single quotes to convert values as strings.
    $i++;
}
$string = implode(",", $values);	//gluing values with ,
$query_insert = "INSERT INTO DEGREES VALUES( $string );";	//generating the insertion string dynamically.
$con->query($query_insert);	//inserting into the table degrees.
$j++;
}
echo $newline;
echo "  Table Initialized with values.  ";
}
/* The following part deals with the form handling and inserting data into database. */
else {
    
echo "Inside the insertion logic.";

/*error function.*/
function errorExit($error) {
]    echo $error."<br /><br />";
    die();
}


/*validating for required fields. */
if(!isset($_POST['id']) ||
    !isset($_POST['letter']) ||
    !isset($_POST['link']) ||
    !isset($_POST['name'])
    ) {
    errorExit('Errors Encountered. Required Fields are not filled. ');       
}

 
/*reading the values After Form Submission.*/ 
$bp = "'".$_POST['bp']."'";
$dp = "'".$_POST['dp']."'"; 
$id = "'".$_POST['id']."'"; 
$letter = "'".$_POST['letter']."'"; 
$link = "'".$_POST['link']."'"; 
$mp = "'".$_POST['mp']."'";
$name = "'".$_POST['name']."'";
$school = "'".$_POST['school']."'";

/*concatentation to empty string to form the values parameter of Insert query string */
$string = "";
$string.=$bp;
$string.=',';
$string.=$dp;
$string.=',';
$string.=$id;
$string.=',';
$string.=$letter;
$string.=',';
$string.=$link;
$string.=',';
$string.=$mp;
$string.=',';
$string.=$name;
$string.=',';
$string.=$school;

$insertquery = "INSERT INTO DEGREES VALUES ( $string );";
echo $insertquery;
$result = $con->query($insertquery);
if($result){
  header("Location: close.php"); /* Redirect browser */
  exit();
}
else {
  echo "Some Unknown Network Error occured!";
}
}

?>



