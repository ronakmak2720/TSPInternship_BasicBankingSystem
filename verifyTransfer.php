<?php
session_start();
$accno = $_SESSION['acc_no'];
$recv_accno = $_GET['receiveraccno'];
$_SESSION['recv_accno'] = $recv_accno;

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
        $sql = "SELECT * FROM `customer_details` WHERE `accno` = $recv_accno";
        $result = mysqli_query($conn,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $recv_name = $row['name'];
                $recv_email = $row['email'];
            }
        }
        $sql = "SELECT * FROM `customer_details` WHERE `accno` = $accno";
        $result = mysqli_query($conn,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $acc_bal = $row['account_balance'];
                
            }
        }
    ?>
    <h1 class="h1">RM Banking Portal</h1>
    <div class="main">
        <div class="container1">
            <div class="container2">
                <h3>Verify Transfer Details</h3>
                <table>
                   <tbody>
                       <tr>
                            <th>Your Account Number</th>
                            <td><?php echo $accno;?></td>
                       </tr>
                       <tr>
                            <th>beneficiary Account Number:</th>
                            <td><?php echo $recv_accno;?></td>
                       </tr>
                       <tr>
                            <th>beneficiary Name:</th>
                            <td><?php echo  $recv_name;?></td>
                       </tr>
                       <tr>
                            <th>beneficiary Email ID:</th>
                            <td><?php echo $recv_email;?></td>
                       </tr>
                       <tr>
                            <th>Your Account Balance:</th>
                            <td><?php echo $acc_bal;?></td>
                       </tr>
                       <form method="POST" action="transferStatus.php">
                            <tr>
                                <th><label for="transfer_amount">Enter amount to transfer:</label></th>
                                <td><input type="text" name="transfer_amount"></td>
                            </tr>
                            <tr>
                                <td><input class="button" type="submit" value="Transfer Money"></td>
                            </tr>
                            
                        </form>
                   </tbody>
                </table>
                <!--<form method="POST" action="transferMoney.php">
                    <label for="transfer_amount">Enter amount to transfer:</label>
                    <input type="text" name="transfer_amount">
                    <input class="button" type="submit" value="Transfer Money">
                </form>-->
            </div>
        </div>
    </div>
</body>
</html>