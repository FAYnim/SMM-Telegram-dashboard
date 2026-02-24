# Database Class Documentation

The Database class provides a simple way to connect to a MySQL database and perform basic CRUD (Create, Read, Update, Delete) operations using PHP Data Objects (PDO).

## Overview

This class handles database connections and includes helper methods for common database operations. It uses prepared statements to protect against SQL injection attacks.

## Connection Settings

The database is configured with these default settings:

| Setting | Value |
|---------|-------|
| Host | localhost |
| Username | root |
| Password | (empty) |
| Database Name | fayd7716_hosted |
| Charset | utf8mb4 |

## Methods

### getConnection()

Creates and returns a PDO database connection.

```php
$db = new Database();
$conn = $db->getConnection();
```

**Returns:** PDO connection object on success, or `null` on failure.

**Note:** This method also prints "Connection Success" or "Connection Failed" messages.

---

### insert($table, $data)

Inserts a new row into a database table.

```php
$db = new Database();
$db->getConnection();

$data = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'status' => 'active'
];

$lastId = $db->insert('users', $data);
```

**Parameters:**
- `$table` (string) - Name of the table to insert into
- `$data` (array) - Associative array of column => value pairs

**Returns:** Last insert ID on success, or `false` on failure.

---

### select($table, $columns = '*', $where = [], $orderBy = '', $limit = '')

Selects data from a database table.

```php
// Select all users
$users = $db->select('users');

// Select specific columns
$users = $db->select('users', ['name', 'email']);

// Select with conditions
$users = $db->select('users', '*', ['status' => 'active']);

// Select with ordering and limit
$users = $db->select('users', '*', [], 'created_at DESC', '10');
```

**Parameters:**
- `$table` (string) - Name of the table to select from
- `$columns` (array|string) - Columns to select (default: '*')
- `$where` (array) - WHERE conditions as associative array
- `$orderBy` (string) - ORDER BY clause (e.g., 'id DESC')
- `$limit` (string|int) - LIMIT clause

**Returns:** Array of results on success, or `false` on failure.

---

### update($table, $data, $where = [])

Updates existing rows in a database table.

```php
$db = new Database();
$db->getConnection();

$data = [
    'status' => 'inactive',
    'updated_at' => date('Y-m-d H:i:s')
];

$affected = $db->update('users', $data, ['id' => 1]);
```

**Parameters:**
- `$table` (string) - Name of the table to update
- `$data` (array) - Associative array of column => value to update
- `$where` (array) - WHERE conditions as associative array

**Returns:** Number of affected rows on success, or `false` on failure.

---

### delete($table, $where = [])

Deletes rows from a database table.

```php
$db = new Database();
$db->getConnection();

$deleted = $db->delete('users', ['id' => 5]);
```

**Parameters:**
- `$table` (string) - Name of the table to delete from
- `$where` (array) - WHERE conditions as associative array

**Returns:** Number of affected rows on success, or `false` on failure.

---

### count($table, $where = [])

Counts records in a database table.

```php
$db = new Database();
$db->getConnection();

// Count all users
$totalUsers = $db->count('users');

// Count with conditions
$activeUsers = $db->count('users', ['status' => 'active']);
```

**Parameters:**
- `$table` (string) - Name of the table to count from
- `$where` (array) - WHERE conditions as associative array

**Returns:** Number of records on success, or `false` on failure.

---

### query($sql, $params = [])

Executes a raw SQL query with optional prepared statement parameters using `?` placeholders.

```php
$db = new Database();
$db->getConnection();

// Simple query without parameters
$users = $db->query("SELECT * FROM users WHERE status = 'active'");

// Query with ? placeholders
$users = $db->query("SELECT * FROM users WHERE status = ?", ['active']);

// Query with multiple parameters
$orders = $db->query("SELECT * FROM orders WHERE user_id = ? AND status = ?", [1, 'completed']);

// INSERT query
$db->query("INSERT INTO logs (message, created_at) VALUES (?, NOW())", ['User login']);

// UPDATE query
$affected = $db->query("UPDATE users SET points = points + ? WHERE id = ?", [10, 5]);

// DELETE query
$db->query("DELETE FROM sessions WHERE expires_at < ?", [time()]);
```

**Parameters:**
- `$sql` (string) - Raw SQL query with `?` placeholders
- `$params` (array) - Array of values to bind to the placeholders (optional)

**Returns:** 
- Array of results for SELECT queries on success
- Number of affected rows for INSERT/UPDATE/DELETE on success
- `false` on failure

**Note:** This method is useful for complex queries that cannot be handled by the query builder methods. Always use `?` placeholders instead of directly embedding values to prevent SQL injection.

---

## Basic Usage Example

```php
<?php
require_once 'src/include/db.php';

$db = new Database();
$conn = $db->getConnection();

// Insert data
$userId = $db->insert('users', [
    'username' => 'john_doe',
    'email' => 'john@example.com'
]);

// Select data
$users = $db->select('users', '*', ['status' => 'active']);

// Update data
$db->update('users', ['status' => 'inactive'], ['id' => $userId]);

// Delete data
$db->delete('users', ['id' => $userId]);

// Count data
$totalUsers = $db->count('users');
$activeUsers = $db->count('users', ['status' => 'active']);

// Raw SQL query
$results = $db->query("SELECT * FROM users WHERE id > ?", [100]);
?>
```

## Security Notes

- All methods use prepared statements to prevent SQL injection
- The database connection uses `utf8mb4` charset for proper character encoding
- PDO error mode is set to Exception mode for better error handling

## Error Handling

If an error occurs, the methods return `false` and log the error message using PHP's `error_log()` function.

---

## How to Include in Other PHP Files

To use the Database class in other PHP files, include the db.php file using `require_once` or `include_once`.

```php
<?php
// Include the database file
require_once 'src/include/db.php';

// Create a new Database instance
$db = new Database();

// Get the connection
$conn = $db->getConnection();

// Now you can use the CRUD methods
$users = $db->select('users');
?>
```

**Alternative paths** - Adjust the path based on where your PHP file is located:

| Your file location | Include path |
|-------------------|--------------|
| Root directory (`/`) | `require_once 'src/include/db.php';` |
| Inside `src/` folder | `require_once 'include/db.php';` |
| Inside a subfolder | Adjust the relative path accordingly |
