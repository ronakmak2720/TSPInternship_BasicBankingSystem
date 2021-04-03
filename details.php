<?php
session_start();
$accno=$_GET['accno'];
$_SESSION['acc_no'] = $accno;

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
    <link rel="stylesheet" href="CSS/details.css">
</head>
<body>
    <?php
        $sql = "SELECT * FROM `customer_details` WHERE `accno` = $accno";
        $result = mysqli_query($conn,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row['name'];
                $email = $row['email'];
                $acc_bal = $row['account_balance'];
            }
        }
    ?>
    <h1 class="h1">RM Banking Portal</h1>
    <div class="main">
        <div class="container1">
            <div class="container2">
                <h3>Your Account Details</h3>
                <table>
                   <tbody>
                       <tr>
                            <th>Name:</th>
                            <td><?php echo $name;?></td>
                       </tr>
                       <tr>
                            <th>Account Number:</th>
                            <td><?php echo $accno;?></td>
                       </tr>
                       <tr>
                            <th>Email ID:</th>
                            <td><?php echo $email;?></td>
                       </tr>
                       <tr>
                            <th>Account Balance:</th>
                            <td><?php echo $acc_bal;?></td>
                       </tr>
                   </tbody>
                </table>
                <form method="POST" action="transferMoney.php">
                    <a class="button" href="customerDetails.php">Customer Details</a>
                    <input class="button" type="submit" value="Transfer Money">
                </form>
            </div>
        </div>
    </div>
</body>
</html>