<?php
session_start();
$accno = $_SESSION['acc_no'];

//Connecting to database.
$servername = "localhost";
$username = "root";
$password = "";
$database = "bankingsystem_tsfinternship";
//Create a connection.
$conn = mysqli_connect($servername,$username,$password,$database);

//Die if not connected.
if(!$conn){
    die("Sorry we failed to connnect, error is : ". mysqli_connect_error() . "<br>");
}
else{
    //echo "We connected successfully to phpmyadmin." . "<br>";
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RM Banking System</title>
    <link rel="stylesheet" href="CSS/transferMoney.css">
</head>
<body>
<h2 class="h2">Customer Details</h2>
<h3 class="h3">Select the Account to which you want to transfer money.</h3>
        <div>
            <table class="table" >
                <thead>
                    <tr>
                        <th scope="col" class="th tr trb">Sno</th>
                        <th scope="col"class="th tr trb">Account Number</th>
                        <th scope="col"class="th tr trb">Name</th>
                        <th scope="col"class="th tr trb">Email</th>
                        <th scope="col"class="th tr trb">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `customer_details` WHERE `accno` != $accno";
                        $result = mysqli_query($conn,$sql);
                        $sno =1;
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<tr>
                                <th scope="row" class="tr">'. $sno . '</th>&nbsp
                                <td class="tr trb">'. $row['accno'] . '</td>&nbsp
                                <td class="tr trb">'. $row['name'] . '</td>&nbsp
                                <td class="tr trb">'. $row['email'] . '</td>
                                <td class="tr trb">
                                    <a style="text-decoration: none; background-color: #133f3d; color: #ffffff; padding: 3px 10px; border-radius: 3px; text-align: center; display: inline-block;" href="verifyTransfer.php?receiveraccno='.$row['accno'].'">Transfer Money</a>
                                </td>
                                </tr>';
                                $sno = $sno + 1;
                            }
                        }
                    ?>
                </tbody>
        
        </table>
    </div>
</body>
</html>