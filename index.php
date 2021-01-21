<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RM Banking System</title>
    <link rel="stylesheet" href="CSS/homepage.css">
</head>

<body>
    <h1 class="h1">RM Banking Portal</h1>
    <div class="main">
        <div class="container1">
            <div class="container2">
                <h3>Welcome to this banking portal </h3>
                <p>To see the customer list and your balance press the button below.</p>
                    <form method="POST" action="customerDetails.php">
                    <input id="button" type="submit" value="Customer List">
                    <a href="TransactionDetails.php" style="text-decoration: none; background-color:  #0b2c1e; color:#ffffff; font-size: 16px; padding: 10px 32px; border-radius: 3px; text-align: center; display: inline-block;" class="button">Transactions Records</a>
                    </form>

            </div>
        </div>
    </div>

</body>

</html>