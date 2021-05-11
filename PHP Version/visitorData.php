<?php
if(isSet($_POST['GenderSelect']))
{
    session_start();
    UpdateHealthData();
    header('Location: visitor.php');
} else if(isset($_POST['dependent']))
{
    session_start();
    AddDependent();
    header('Location: visitor.php');
}else if(isset($_POST['licence']))
{
    session_start();
    UpdateVehicle();
    header('Location: visitor.php');
}else if(isset($_POST['name']))
{
    session_start();
    UpdatePerson();
    header('Location: visitor.php');
}


function GetPersonData() {
    include('connection.php');  
    $username = $_SESSION["username"];
    $sql = "SELECT * FROM person WHERE username = '$username'";  
    $result = mysqli_query($db, $sql);  
    $row = mysqli_fetch_row($result);  

        $_SESSION['ID'] = $row[0];
        $_SESSION['name'] = $row[1];
        $_SESSION['phone'] = $row[2];
        $_SESSION['address'] = $row[3];
        mysqli_close($db);
 
}
    function GetVisitorData() {
        include('connection.php');  
        $id = $_SESSION["ID"];
        $sql = "SELECT * FROM visitor WHERE ID = '$id'";  
        $result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_row($result);  
    
            $_SESSION['homecountry'] = $row[1];
            $_SESSION['entrypoint'] = $row[2];
            $_SESSION['exitpoint'] = $row[3];
            $_SESSION['entrydate'] = $row[4];
            $_SESSION['exitdate'] = $row[5];
            $_SESSION['processedby'] = $row[6];
            $_SESSION['status'] = $row[7];
            mysqli_close($db);
    }

    function GetHealthData() {
        include('connection.php');  
        $id = $_SESSION["ID"];
        $sql = "SELECT * FROM healthrecord WHERE personID = '$id'";  
        $result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_row($result);  
    
            $_SESSION['gender'] = $row[1];
            $_SESSION['lasttestdate'] = $row[2];
  
            mysqli_close($db);
    }
    function UpdateHealthData() {
        include('connection.php');  
        $gender = $_POST['GenderSelect'];  
        $date = $_POST['Date'];  
        $id = $_SESSION["ID"];
        $sql = "UPDATE healthrecord SET gender='$gender', lasttestdate='$date' WHERE personID = '$id'";  
        mysqli_query($db, $sql);  
        mysqli_close($db);
    }
    
    function GetDependent() {
        include('connection.php');  
        $id = $_SESSION["ID"];
        $sql = "SELECT * FROM dependent WHERE visitorID = '$id'";  
        $result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_row($result);  
    
            $_SESSION['dependentName'] = $row[1];
  
            mysqli_close($db);
    }
    function UpdateDependent() {
        include('connection.php');  
        $name = $_POST['dependent'];  
        $id = $_SESSION["ID"];
        $sql = "UPDATE dependent SET name='$name' WHERE visitorID = '$id'";  
        mysqli_query($db, $sql);  
        mysqli_close($db);
    }

    function UpdatePerson(){
        include('connection.php');  
        $name = $_POST['name'];  
        $address = $_POST['address'];  
        $phone = $_POST['phone'];  
        $id = $_SESSION["ID"];
        $sql = "UPDATE person SET name='$name', phone='$phone', address='$address' WHERE ID = '$id'";  
        mysqli_query($db, $sql);  
        mysqli_close($db);
    }

    function GetVehicle() {
        include('connection.php');  
        $id = $_SESSION["ID"];
        $sql = "SELECT * FROM vehicle WHERE vvisitorID = '$id'";  
        $result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_row($result); 
        $count = mysqli_num_rows($result);  

        if($count==0){
            return;
        } 
    
            $_SESSION['licence'] = $row[1];
  
            mysqli_close($db);
    }
    function UpdateVehicle() {
        include('connection.php');  
        $licence = $_POST['licence'];  
        $id = $_SESSION["ID"];
        $sql = "UPDATE vehicle SET licensenum='$licence' WHERE vvisitorID = '$id'";  
        mysqli_query($db, $sql);  
        mysqli_close($db);
    }

    function AddDependent() {
        include('connection.php');  
        $name = $_POST['dependent'];  
        $ID = $_SESSION["ID"];
        $sql = "INSERT INTO dependent (visitorID, name) VALUES (?, ?)";
        if ($stmt = mysqli_prepare($db, $sql)) {
          mysqli_stmt_bind_param($stmt, "is", $ID, $name);
          if (mysqli_stmt_execute($stmt)) {
          } else {
            echo "Error - healthrecord";
          }
          mysqli_stmt_close($stmt);
        }
    }

    function DisplayDependent(){
        include('connection.php');  
        $id = $_SESSION["ID"];
        $sql = "SELECT * FROM dependent WHERE visitorID = '$id'";  
        $result = mysqli_query($db, $sql);  
        $count = mysqli_num_rows($result);  

        if($count==0){
            return;
        }

echo '<table>';
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
echo '<td style="padding:10px">Name: </td> ';
echo '<td style="padding:10px">' . $row[1] . '</td>'; 
echo "<td><a href=\"DeleteDependent.php?id=".$row[1]."\">Delete</a></td>";
echo '</tr>';
}

echo '</table>';
   }

?>