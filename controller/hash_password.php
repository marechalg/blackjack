<?php
/**
 * Password Hashing Utility
 * 
 * This script helps administrators generate secure password hashes for the database.
 * 
 * Usage:
 * 1. Run from command line: php hash_password.php
 * 2. Or access via web browser (REMOVE AFTER USE for security)
 * 
 * SECURITY WARNING: Remove this file from production servers after migration!
 */

// Command line usage
if (php_sapi_name() === 'cli') {
    echo "Password Hashing Utility\n";
    echo "========================\n\n";
    
    echo "Enter password to hash: ";
    $password = trim(fgets(STDIN));
    
    if (empty($password)) {
        echo "Error: Password cannot be empty\n";
        exit(1);
    }
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    echo "\nHashed password:\n";
    echo $hashedPassword . "\n\n";
    
    echo "SQL Update statement:\n";
    echo "UPDATE blackjack._user SET password = '" . $hashedPassword . "' WHERE username = 'YOUR_USERNAME';\n";
    
    exit(0);
}

// Web interface (for convenience, but should be removed in production)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $result = [
        'success' => true,
        'hash' => $hashedPassword
    ];
    
    header('Content-Type: application/json');
    echo json_encode($result);
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Hash Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        .warning {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        input[type="password"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            word-break: break-all;
        }
    </style>
</head>
<body>
    <h1>Password Hash Generator</h1>
    
    <div class="warning">
        <strong>⚠️ Security Warning:</strong> This utility should be removed from production servers after completing the password migration.
    </div>
    
    <form id="hashForm">
        <label for="password">Enter password to hash:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Generate Hash</button>
    </form>
    
    <div id="result" style="display: none;">
        <h3>Hashed Password:</h3>
        <div class="result">
            <code id="hashOutput"></code>
        </div>
        
        <h3>SQL Update Statement:</h3>
        <div class="result">
            <code id="sqlOutput"></code>
        </div>
    </div>
    
    <script>
        document.getElementById('hashForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            const formData = new FormData();
            formData.append('password', password);
            
            const response = await fetch('', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                document.getElementById('hashOutput').textContent = data.hash;
                document.getElementById('sqlOutput').textContent = 
                    `UPDATE blackjack._user SET password = '${data.hash}' WHERE username = 'YOUR_USERNAME';`;
                document.getElementById('result').style.display = 'block';
            }
        });
    </script>
</body>
</html>
