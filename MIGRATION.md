# Security Migration Guide

## Password Hashing Migration

This application has been updated to use secure password hashing instead of plain text password storage.

### What Changed

Previously, passwords were stored in plain text in the database. Now, the application uses PHP's `password_hash()` function with bcrypt algorithm to securely hash passwords.

### Required Database Migration

**IMPORTANT:** Existing user passwords in the database must be rehashed before users can log in.

### Migration Options

#### Option 1: SQL Script for Existing Users (Recommended for Development)

If you know the plain text passwords, you can rehash them using PHP:

```php
<?php
// Example: Generate hashed password
$plainTextPassword = "user_password_here";
$hashedPassword = password_hash($plainTextPassword, PASSWORD_DEFAULT);
echo $hashedPassword;
?>
```

Then update the database:

```sql
UPDATE blackjack._user 
SET password = '$2y$10$...' -- Use the hashed password generated above
WHERE username = 'username_here';
```

#### Option 2: Password Reset (Recommended for Production)

1. Require all users to reset their passwords
2. Create a password reset mechanism that uses `password_hash()` to store new passwords
3. Clear all existing passwords from the database

```sql
UPDATE blackjack._user SET password = NULL;
```

### Creating New Users

When creating new users, always hash passwords before storing them:

```php
$hashedPassword = password_hash($plainTextPassword, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO blackjack._user (username, password) VALUES (:username, :password)");
$stmt->execute([
    'username' => $username,
    'password' => $hashedPassword
]);
```

### Security Best Practices

1. **Never log passwords** - Even hashed passwords should not appear in logs
2. **Use HTTPS** - Always transmit passwords over encrypted connections
3. **Implement rate limiting** - Prevent brute force attacks on login
4. **Add password complexity requirements** - Enforce strong passwords
5. **Consider two-factor authentication** - Add an extra layer of security

### Verification

To verify the migration was successful:

1. Try logging in with a test account
2. Check that `password_verify()` returns true for correct passwords
3. Confirm that passwords in the database are now hashed (start with `$2y$`)

### Password Hash Format

The application now uses bcrypt hashing (PASSWORD_DEFAULT in PHP), which produces hashes like:
```
$2y$10$abcdefghijklmnopqrstuvwxyz123456789ABCDEFGHIJKLMNOPQR
```

These hashes:
- Are 60 characters long
- Include the algorithm identifier ($2y$)
- Include the cost parameter (10)
- Include a random salt
- Are one-way (cannot be reversed)
