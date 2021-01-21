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
        <link rel="stylesheet" href="CSS/transferMoney.css">
    </head>

    <body>
        <h2 class="h2">Customer Details</h2>
        <br>
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
                    $sql = "SELECT * FROM `customer_details`";
                    $result = mysqli_query($conn,$sql);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>
                        <th scope="row" class="tr">'. $sno . '</th>&nbsp
                        <td class="tr trb">'. $row['accno'] . '</td>&nbsp
                        <td class="tr trb">'. $row['name'] . '</td>&nbsp
                        <td class="tr trb">'. $row['email'] . '</td>
                        <td class="tr trb">
                            <a style="text-decoration: none; background-color: #133f3d; color: #ffffff; padding: 3px 10px; border-radius: 3px; text-align: center; display: inline-block;" href="details.php?accno='.$row['accno'].'">View Details</a>
                        </td>
                        </tr>';
                         $sno = $sno + 1;
                          /*<form method="get" action="details.php?accno='.$row['accno'].'">
                                <input type="submit" value="View Details" id="button">
                            </form>*/
                    }
                            
                ?>
                </tbody>
        
            </table>
        </div>
        
    </body>

    </html>