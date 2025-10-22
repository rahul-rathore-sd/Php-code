<?php
function generatePassword($length = 12) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
    $password = '';
    $max_index = strlen($chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, $max_index)];
    }
    return $password;
}

$password = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $length = isset($_POST['length']) ? (int)$_POST['length'] : 12;
    $password = generatePassword($length);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        input[type="number"] {
            padding: 8px;
            width: 80px;
            margin-right: 10px;
        }
        button {
            padding: 8px 15px;
            background: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .password-box {
            margin-top: 20px;
            font-weight: bold;
            font-size: 1.2em;
            word-break: break-all;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Password Generator</h2>
        <form method="post">
            <label for="length">Length:</label>
            <input type="number" id="length" name="length" min="4" max="64" value="12" required>
            <button type="submit">Generate</button>
        </form>
        <?php if (!empty($password)): ?>
            <div class="password-box">
                Generated Password:<br>
                <code><?= htmlspecialchars($password) ?></code>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
