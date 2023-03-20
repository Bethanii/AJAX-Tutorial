<html>
   <body>
      <form action = "<?php $_PHP_SELF ?>" method = "GET">
         Max Age: <input type = 'text' name = 'age' /> <br />
         Max WPM: <input type = 'text' name = 'wpm' /> <br />
         Sex:

         <select name = 'sex'>
            <option value = "m">m</option>
            <option value = "f">f</option>
         </select>

         <input type = "Submit" value = "Query MySQL"/>
      </form>
   </body>
</html>
<?php


if( $_GET["wpm"] || $_GET["age"] ){

        $dbhost = 'fdb23.awardspace.net';
        $dbuser = '';
        $dbpass = '';
        $dbname = '';

//Connect to MySQL Server
//mysql_connect($dbhost, $dbuser, $dbpass);
        $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

//Select Database
//mysql_select_db($dbname) or die(mysql_error());

// Retrieve data from Query String
        $age = $_GET['age'];
        $sex = $_GET['sex'];
        $wpm = $_GET['wpm'];

// Escape User Input to help prevent SQL Injection
        $age = mysqli_real_escape_string($conn,$age);
        $sex = mysqli_real_escape_string($conn,$sex);
        $wpm = mysqli_real_escape_string($conn,$wpm);

//build query
        $query = "SELECT * FROM ajax_example WHERE sex = '$sex'";

        if(is_numeric($age))
           $query .= " AND age <= $age";

        if(is_numeric($wpm))
           $query .= " AND wpm <= $wpm";

//Execute query
        $qry_result = mysqli_query($conn, $query); //mysql_query($query) or die(mysql_error());

//Build Result String
        $display_string = "<table>";
        $display_string .= "<tr>";
        $display_string .= "<th>Name</th>";
        $display_string .= "<th>Age</th>";
        $display_string .= "<th>Sex</th>";
        $display_string .= "<th>WPM</th>";
        $display_string .= "</tr>";

// Insert a new row in the table for each person returned
        while($row = mysqli_fetch_array($qry_result)) {
           $display_string .= "<tr>";
           $display_string .= "<td>$row[ename]</td>";
           $display_string .= "<td>$row[age]</td>";
           $display_string .= "<td>$row[sex]</td>";
           $display_string .= "<td>$row[wpm]</td>";
           $display_string .= "</tr>";
        }

        echo "Query: " . $query . "<br />";
        $display_string .= "</table>";

        echo $display_string;
        exit();
}
?>
