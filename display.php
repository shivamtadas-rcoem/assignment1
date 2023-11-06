<h2>Saved data</h2>

<?php 
  
  $servername = "localhost"; 
  $username = "root"; 
  $password = NULL; 
  $databasename = "assign1"; 
  
  // CREATE CONNECTION 
  $conn = new mysqli($servername, $username, $password, $databasename); 
  
  // IF ERROR OCCURS IN CONNECTION 
  if ($conn->connect_error)
      die("Connection failed: " . $conn->connect_error); 
  
  // SQL QUERY 
  $query = "SELECT * FROM `user`;"; 
$firstName="";
$lastName="";
 $gender="";
 $email="";
 $city="";
  $number="";
  // FETCHING DATA FROM DATABASE 
  $result = $conn->query($query); 
  
    if ($result->num_rows > 0) 
        // OUTPUT DATA OF EACH ROW 
        while($row = $result->fetch_assoc()) { 
            echo
                "First Name: " . $row["firstName"]. 
                "<br>Last Name: " . $row["lastName"].          
                "<br>Email: " . $row["email"]. 
                "<br>Number: " . $row["number"] .
                "<br>City: " . $row["city"].
                "<br><br>";
        }
    else 
        echo "0 results";
  
   $conn->close(); 
  
?>
