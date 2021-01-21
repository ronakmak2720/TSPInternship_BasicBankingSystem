<?php
session_start();
$accno = $_SESSION['acc_no'];
$recv_accno = $_SESSION['recv_accno'];


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
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $transfer_amt = $_POST['transfer_amount'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RM Banking System</title>
    <link rel="stylesheet" href="CSS/details.css">
    <link rel="stylesheet" href="CSS/transferStatus.css">
</head>
<body>
<?php
        $sql = "SELECT * FROM `customer_details` WHERE `accno` = $recv_accno";
        $result = mysqli_query($conn,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $recv_acc_bal = $row['account_balance'];
                $recv_name = $row['name'];
            }
        }
        $sql = "SELECT * FROM `customer_details` WHERE `accno` = $accno";
        $result = mysqli_query($conn,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $acc_bal = $row['account_balance'];
                $name = $row['name'];
                
            }
        }
        $flag = 0;
        if( $acc_bal > $transfer_amt){
            $new_acc_bal = $acc_bal - $transfer_amt;
            $sql = "UPDATE `customer_details` SET `account_balance` = $new_acc_bal WHERE `customer_details`.`accno` = $accno;";
            $result = mysqli_query($conn,$sql);
            if($result){
                $new_recv_acc_bal = $recv_acc_bal + $transfer_amt;
                $sql = "UPDATE `customer_details` SET `account_balance` = $new_recv_acc_bal WHERE `customer_details`.`accno` = $recv_accno;";
                $result = mysqli_query($conn,$sql);
                if($result){
                   $flag=0; 
                }
                else{
                    $flag=3;
                }
            }
            else{
                $flag = 2;
            }
        }
        else{
            $flag = 1;
        }
        
    ?>
    <h1 class="h1">RM Banking Portal</h1>
    <div class="main">
        <div class="container1">
            <div class="container2">
                <h3>Verify Transfer Details</h3>
                <?php
                if($flag==0){
                    echo '<p>Transaction Successfull.</p>';
                    echo '<p>Your Updated Balance:' . $new_acc_bal.'</p>';
                    $sql = "INSERT INTO `transactions_details` (`sender_name`, `sender_accno`, `receiver_name`, `receiver_accno`, `amount`, `timestamp`) VALUES ('$name', '$accno', '$recv_name', '$recv_accno', '$transfer_amt', current_timestamp());";
                    $result = mysqli_query($conn,$sql);
                    echo var_dump($result);
                }
                else if( $flag==1){
                    echo '<p>Insufficient balance to complete the transaction.</p>';
                }
                else if( $flag==2){
                    echo '<p>Some Technical issues in our server. Please try after some time.</p>';
                }
                else if( $flag==3){
                    echo "<p>Some technical issues in the benificiary's bank. Please ensure that the cerdentials you have entered are valid</p>";
                }?>
                <form method="POST" action="index.php">
                <input class="button" type="submit" value="Return to Homepage"></form>
            </div>
        </div>
    </div> 
</body>
</html>