<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['fullName'])) {
        $_SESSION['fullName'] = htmlspecialchars($_POST['fullName'] ?? '');
        $_SESSION['email'] = htmlspecialchars($_POST['email'] ?? '');
        $_SESSION['password1'] = htmlspecialchars($_POST['password1'] ?? '');
        $_SESSION['password2'] = htmlspecialchars($_POST['password2'] ?? '');
        $_SESSION['dob'] = htmlspecialchars($_POST['dob'] ?? '');
        $_SESSION['location'] = htmlspecialchars($_POST['location'] ?? '');
        $_SESSION['zipCode'] = htmlspecialchars($_POST['zipCode'] ?? '');
        $_SESSION['city'] = htmlspecialchars($_POST['city'] ?? '');
        $_SESSION['color'] = htmlspecialchars($_POST['color'] ?? '');
    }

    $fullName = htmlspecialchars($_POST['fullName'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password1 = htmlspecialchars($_POST['password1'] ?? '');
    $password2 = htmlspecialchars($_POST['password2'] ?? '');
    $dob = htmlspecialchars($_POST['dob'] ?? '');
    $location = htmlspecialchars($_POST['location'] ?? '');
    $zipCode = htmlspecialchars($_POST['zipCode'] ?? '');
    $city = htmlspecialchars($_POST['city'] ?? '');
    $color = htmlspecialchars($_POST['color'] ?? '');
    $agreement = isset($_POST['agreement']) ? "Yes" : "No";

    $emailExistsMsg = "";

    if (isset($_POST["confirm"])) {
        // getting data from session
        $fullName = $_SESSION['fullName'];
        $Email = $_SESSION['email'];
        $Password1 = $_SESSION['password1'];
        $dob = $_SESSION['dob'];
        $location = $_SESSION['location'];
        $zipCode = $_SESSION['zipCode'];
        $city = $_SESSION['city'];
        $Color = $_SESSION['color'];

        // Check if email already exists
        $con = mysqli_connect("localhost", "root", "", "aqi");
        $checkSql = "SELECT * FROM `user` WHERE `Email` = ?";
        $checkStmt = mysqli_prepare($con, $checkSql);
        mysqli_stmt_bind_param($checkStmt, "s", $Email);
        mysqli_stmt_execute($checkStmt);
        $checkResult = mysqli_stmt_get_result($checkStmt);

        if (mysqli_num_rows($checkResult) > 0) {
            $emailExistsMsg = "This email is already registered. Please use another email.";
        } else {
            // inserting into database
            $sql = "INSERT INTO `user`(`Full Name`, `Email`, `Password`, `DOB`, `Location`, `Zip Code`, `City`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss", $fullName, $Email, $Password1, $dob, $location, $zipCode, $city);
            if (mysqli_stmt_execute($stmt)) {
                echo "<div style='color:green;text-align:center;font-weight:bold;'>Inserted....</div>";
            }
            //Cookie color fix
            setcookie('bgcolor', $Color, time() + 10);
        }
        mysqli_close($con);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Submission</title>
        <style>
            body {
                font-family: 'Segoe UI', Arial, sans-serif;
                background: <?php echo isset($_SESSION['color']) && $_SESSION['color'] ? htmlspecialchars($_SESSION['color']) : "#e6e6fa"; ?>;
                margin: 0;
                padding: 0;
                min-height: 100vh;
                transition: background 0.5s;
            }
            .container {
                max-width: 600px;
                margin: 40px auto;
                background: #f6f3ff;
                border-radius: 22px;
                box-shadow: 0 8px 32px rgba(120, 100, 180, 0.13);
                padding: 36px 40px 28px 40px;
                border: 2px solid #e0d7fa;
            }
            h1 {
                text-align: center;
                color: #6d28d9;
                margin-bottom: 28px;
                letter-spacing: 1.5px;
            }
            .info-list {
                margin: 0 auto 24px auto;
                padding: 0;
                list-style: none;
                font-size: 1.1rem;
            }
            .info-list li {
                margin-bottom: 10px;
                background: #ede9fe;
                border-radius: 10px;
                padding: 10px 18px;
                color: #4b2067;
                box-shadow: 0 2px 8px rgba(120, 100, 180, 0.06);
            }
            .error-message {
                color: #e63946;
                font-weight: bold;
                text-align: center;
                margin-bottom: 18px;
            }
            .button-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 28px;
                gap: 18px;
            }
            .btn, input[type="submit"] {
                background: #a78bfa;
                color: #fff;
                border: none;
                padding: 12px 36px;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
                font-weight: 600;
                box-shadow: 0 2px 8px rgba(120, 100, 180, 0.08);
                transition: background 0.2s, box-shadow 0.2s;
                text-decoration: none;
            }
            .btn.secondary {
                background: #bdb4d8;
                color: #4b2067;
            }
            .btn.danger {
                background: #e57399;
            }
            .btn:hover, input[type="submit"]:hover {
                background: #7c3aed;
                box-shadow: 0 4px 16px rgba(120, 100, 180, 0.18);
            }
            @media (max-width: 700px) {
                .container { padding: 18px 6px; }
                .button-row { flex-direction: column; gap: 12px; }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Form Submission Received</h1>
            <?php if (!empty($emailExistsMsg)): ?>
                <div class="error-message"><?= $emailExistsMsg ?></div>
            <?php endif; ?>
            <ul class="info-list">
                <li><strong>Full Name:</strong> <?= $fullName ?></li>
                <li><strong>Email:</strong> <?= $email ?></li>
                <li><strong>Date of Birth:</strong> <?= $dob ?></li>
                <li><strong>Location:</strong> <?= $location ?></li>
                <li><strong>City:</strong> <?= $city ?></li>
                <li><strong>Zip Code:</strong> <?= $zipCode ?></li>
                <li><strong>Favorite Color:</strong> <?= $color ?></li>
                <li><strong>Agreed to Terms:</strong> <?= $agreement ?></li>
            </ul>
            <div class="button-row">
                <?php if (empty($emailExistsMsg)): ?>
                <form action="process.php" method="post" style="margin:0;">
                    <input type="submit" name="confirm" value="Confirm">
                </form>
                <?php endif; ?>
                <a href="index.html" class="btn danger">Cancel</a>
            </div>
        </div>
    </body>
    </html>

    <?php
} else {
    echo "No form data submitted.";
}
?>