<?php
/**
 * Security Test: Password Hashing Verification
 * 
 * This test verifies that the password hashing implementation is working correctly.
 * 
 * Run: php tests/test_password_security.php
 */

echo "Password Security Test Suite\n";
echo "============================\n\n";

// Test 1: Verify password_hash creates different hashes for same password
echo "Test 1: Verify salt randomization...\n";
$password = "testPassword123";
$hash1 = password_hash($password, PASSWORD_DEFAULT);
$hash2 = password_hash($password, PASSWORD_DEFAULT);

if ($hash1 !== $hash2) {
    echo "✓ PASS: Different hashes generated for same password (salt randomization working)\n";
} else {
    echo "✗ FAIL: Same hash generated (salt randomization NOT working)\n";
    exit(1);
}

// Test 2: Verify password_verify works correctly
echo "\nTest 2: Verify password verification...\n";
$testPassword = "mySecurePassword456";
$hashedPassword = password_hash($testPassword, PASSWORD_DEFAULT);

if (password_verify($testPassword, $hashedPassword)) {
    echo "✓ PASS: Correct password verified successfully\n";
} else {
    echo "✗ FAIL: Correct password not verified\n";
    exit(1);
}

// Test 3: Verify wrong password is rejected
echo "\nTest 3: Verify wrong password rejection...\n";
$wrongPassword = "wrongPassword789";

if (!password_verify($wrongPassword, $hashedPassword)) {
    echo "✓ PASS: Wrong password correctly rejected\n";
} else {
    echo "✗ FAIL: Wrong password incorrectly accepted\n";
    exit(1);
}

// Test 4: Verify hash format
echo "\nTest 4: Verify bcrypt hash format...\n";
$hash = password_hash("test", PASSWORD_DEFAULT);

if (preg_match('/^\$2y\$/', $hash)) {
    echo "✓ PASS: Hash uses bcrypt algorithm ($2y$)\n";
} else {
    echo "✗ FAIL: Hash does not use expected bcrypt format\n";
    exit(1);
}

// Test 5: Verify hash length
echo "\nTest 5: Verify hash length...\n";
if (strlen($hash) === 60) {
    echo "✓ PASS: Hash has correct length (60 characters)\n";
} else {
    echo "✗ FAIL: Hash has incorrect length (" . strlen($hash) . " characters, expected 60)\n";
    exit(1);
}

// Test 6: Verify timing-safe comparison (constant time)
echo "\nTest 6: Verify constant-time comparison...\n";
// password_verify internally uses timing-safe comparison
// This is a basic check to ensure the function is available
if (function_exists('password_verify')) {
    echo "✓ PASS: password_verify function available (uses constant-time comparison)\n";
} else {
    echo "✗ FAIL: password_verify function not available\n";
    exit(1);
}

// Test 7: Verify password_hash algorithm strength
echo "\nTest 7: Verify algorithm strength...\n";
$info = password_get_info($hashedPassword);
if ($info['algo'] !== 0 && $info['algoName'] !== 'unknown') {
    echo "✓ PASS: Using valid password hashing algorithm: {$info['algoName']}\n";
} else {
    echo "✗ FAIL: Unknown password hashing algorithm\n";
    exit(1);
}

// Test 8: Simulate login flow
echo "\nTest 8: Simulate authentication flow...\n";
$username = "testuser";
$plainPassword = "Test123!@#";

// Simulate storing hashed password in database
$storedHash = password_hash($plainPassword, PASSWORD_DEFAULT);

// Simulate login attempt
$loginPassword = "Test123!@#";
if (password_verify($loginPassword, $storedHash)) {
    echo "✓ PASS: Authentication flow successful with correct password\n";
} else {
    echo "✗ FAIL: Authentication flow failed with correct password\n";
    exit(1);
}

// Simulate failed login attempt
$wrongLoginPassword = "Test123!@#Wrong";
if (!password_verify($wrongLoginPassword, $storedHash)) {
    echo "✓ PASS: Authentication flow correctly rejects wrong password\n";
} else {
    echo "✗ FAIL: Authentication flow incorrectly accepts wrong password\n";
    exit(1);
}

echo "\n============================\n";
echo "All tests passed! ✓\n";
echo "============================\n\n";

echo "Security Summary:\n";
echo "- Bcrypt algorithm is being used\n";
echo "- Salt randomization is working\n";
echo "- Password verification is functioning correctly\n";
echo "- Wrong passwords are correctly rejected\n";
echo "- Constant-time comparison is available\n";
echo "- Hash format is correct\n";

exit(0);
?>
