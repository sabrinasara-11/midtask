<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Cities</title>
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
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
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
        <h2>Select City and Country</h2>
        <form action="show.php" method="post">
            <table>
                <tr>
                    <th>Country</th>
                    <th>City</th>
                    <th>Select</th>
                </tr>
                <tr><td>Bangladesh</td><td>Dhaka</td><td><input type="checkbox" name="city[]" value="Dhaka"></td></tr>
                <tr><td>Bangladesh</td><td>Mymensingh</td><td><input type="checkbox" name="city[]" value="Mymensingh"></td></tr>
                <tr><td>Bangladesh</td><td>Narsingdi</td><td><input type="checkbox" name="city[]" value="Narsingdi"></td></tr>
                <tr><td>Bangladesh</td><td>Barisal</td><td><input type="checkbox" name="city[]" value="Barisal"></td></tr>
                <tr><td>Bangladesh</td><td>Sylhet</td><td><input type="checkbox" name="city[]" value="Sylhet"></td></tr>
                <tr><td>Bangladesh</td><td>Rajshahi</td><td><input type="checkbox" name="city[]" value="Rajshahi"></td></tr>
                <tr><td>Singapore</td><td>South, Singapore</td><td><input type="checkbox" name="city[]" value="South, Singapore"></td></tr>
                <tr><td>Singapore</td><td>North, Singapore</td><td><input type="checkbox" name="city[]" value="North, Singapore"></td></tr>
                <tr><td>Nepal</td><td>Kathmandu</td><td><input type="checkbox" name="city[]" value="Kathmandu"></td></tr>
                <tr><td>Nepal</td><td>Pokhara</td><td><input type="checkbox" name="city[]" value="Pokhara"></td></tr>
                <tr><td>India</td><td>Thane</td><td><input type="checkbox" name="city[]" value="Thane"></td></tr>
                <tr><td>India</td><td>Hyderabad</td><td><input type="checkbox" name="city[]" value="Hyderabad"></td></tr>
                <tr><td>India</td><td>Lucknow</td><td><input type="checkbox" name="city[]" value="Lucknow"></td></tr>
                <tr><td>China</td><td>Xiangyang</td><td><input type="checkbox" name="city[]" value="Xiangyang"></td></tr>
                <tr><td>Malaysia</td><td>Kuantan</td><td><input type="checkbox" name="city[]" value="Kuantan"></td></tr>
                <tr><td>Hong Kong</td><td>Tai Po</td><td><input type="checkbox" name="city[]" value="Tai Po"></td></tr>
                <tr><td>Hong Kong</td><td>Sha Tin</td><td><input type="checkbox" name="city[]" value="Sha Tin"></td></tr>
                <tr><td>Turkey</td><td>Kestel</td><td><input type="checkbox" name="city[]" value="Kestel"></td></tr>
                <tr><td>Turkey</td><td>Torbali</td><td><input type="checkbox" name="city[]" value="Torbali"></td></tr>
            </table>
            <div class="button-row">
                <button type="button" onclick="window.location.href='index.html'" class="btn secondary">Back</button>
                <input type="submit" value="Show AQI Data">
                <button type="button" onclick="window.location.href='index.html'" class="btn danger">Logout</button>
            </div>
        </form>
    </div>
</body>
</html>