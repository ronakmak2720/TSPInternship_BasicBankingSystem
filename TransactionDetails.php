<?php

//Connecting to database.
$servername = "localhost";
$username = "root";
$password = "";
$database = "bankingsystem_tsfinternship";
$accnophp = '';
//Create a connection.
$conn = mysqli_connect($servername,$username,$password,$database);

//Die if not connected.
if(!$conn){
    die("Sorry we failed to connnect, error is : ". mysqli_connect_error() . "<br>");
}
else{
    //echo "We connected successfully to phpmyadmin." . "<br>";
}
$_SESSION['accno'] = $accnophp;
echo $accnophp;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RM Banking System</title>
        <link rel="stylesheet" href="CSS/transactionDetails.css">
    </head>

    <body>
        <h2 class="h2">Transaction Records</h2>
        <br>
        <div>
            <div class="container">
            <table class="table" >
                <thead>
                    <tr>
                        <th scope="col" class="th tr trb">Transaction Id</th>
                        <th scope="col"class="th tr trb">Sender's Name</th>
                        <th scope="col"class="th tr trb">Sender's Account Number</th>
                        <th scope="col"class="th tr trb">benificiary's Name</th>
                        <th scope="col"class="th tr trb">benificiary's Account Number</th>
                        <th scope="col"class="th tr trb">Transaction amount</th>
                        <th scope="col"class="th tr trb">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM `transactions_details`";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>
                        <th scope="row" class="tr">'. $row['tid']. '</th>
                        <td class="tr trb">'. $row['sender_name'] . '</td>
                        <td class="tr trb">'. $row['sender_accno'] . '</td>
                        <td class="tr trb">'. $row['receiver_name'] . '</td>
                        <td class="tr trb">'. $row['receiver_accno'] . '</td>
                        <td class="tr trb">'. $row['amount'] . '</td>
                        <td class="tr trb">'. $row['timestamp'] . '</td>

                        </tr>';
                    }  
                ?>
                </tbody>
            </table>
            <div class="container2">
            <form method="POST" action="index.php">
                    <input type="submit" value="Return To Homepage" id="button">
            </form>
            </div>
            </div>
        </div>
        
    </body>

    </html>