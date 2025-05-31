<?php
$con = mysqli_connect("localhost", "root", "", "aqi");
$selectedCities = $_POST['city'] ?? [];

if (count($selectedCities) > 10) {
    echo "<script>alert('You can select a maximum of 10 cities.'); window.location.href='request.php';</script>";
    exit();
}

$cityList = [];
if (!empty($selectedCities)) {
    foreach ($selectedCities as $city) {
        $cityList[] = "'" . mysqli_real_escape_string($con, $city) . "'";
    }
    $cityStr = implode(",", $cityList);
    $sql = "SELECT `City`, `Country`, `AQI` FROM `info` WHERE City IN ($cityStr)";
    $result = mysqli_query($con, $sql);
} else {
    $result = false;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Show AQI Data</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(120deg, #e6e6fa 0%, #f8f6ff 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #f6f3ff;
            border-radius: 22px;
            box-shadow: 0 8px 32px rgba(120, 100, 180, 0.13);
            padding: 36px 40px 28px 40px;
            border: 2px solid #e0d7fa;
            display: flex;
            flex-direction: column;
            min-height: 80vh;
        }
        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 32px;
            color: #6d28d9;
            letter-spacing: 1.5px;
            font-size: 2rem;
            font-weight: 700;
        }
        table {
            border-collapse: separate;
            border-spacing: 0;
            margin: 0 auto 24px auto;
            background: #ede9fe;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(120, 100, 180, 0.06);
            width: 100%;
            overflow: hidden;
        }
        th, td {
            border-bottom: 1px solid #e0d7fa;
            padding: 14px 20px;
            text-align: center;
        }
        th {
            background: #b4aee8;
            color: #4b2067;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 1px;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:nth-child(even) {
            background: #f3f0fa;
        }
        tr:hover {
            background: #e9d8fd;
        }
        .no-data {
            text-align: center;
            color: #e63946;
            font-size: 18px;
            margin-top: 30px;
        }
        .button-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-top: 22px;
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
        @media (max-width: 900px) {
            .container { padding: 18px 6px; }
            table { font-size: 13px; }
            .button-row { flex-direction: column; gap: 12px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>AQI Data for Selected Cities</h2>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>City</th>
                <th>Country</th>
                <th>AQI</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['City']) ?></td>
                <td><?= htmlspecialchars($row['Country']) ?></td>
                <td><?= htmlspecialchars($row['AQI']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
            <div class="no-data">No data found for the selected cities.</div>
        <?php endif; ?>
        <div class="button-row">
            <button type="button" onclick="window.location.href='request.php'" class="btn secondary">Back</button>
            <button type="button" onclick="window.location.href='index.html'" class="btn danger">Logout</button>
        </div>
    </div>
</body>
</html>