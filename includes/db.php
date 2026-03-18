<?php
/**
 * Database Class - Secure Database Connection
 * Uses prepared statements to prevent SQL injection
 */
class Database
{
    private static $connection = null;

    /**
     * Get database connection (singleton pattern)
     */
    public static function getConnection(): mysqli
    {
        if (self::$connection === null) {
            $host     = 'localhost';
            $user     = 'root';
            $password = 'Yasith@1.';
            $dbname   = 'myshop';
            $port     = 3306;

            self::$connection = new mysqli($host, $user, $password, $dbname, $port);

            if (self::$connection->connect_error) {
                error_log('DB Connection failed: ' . self::$connection->connect_error);
                http_response_code(500);
                die(json_encode(['error' => 'Database connection failed.']));
            }

            self::$connection->set_charset('utf8mb4');
        }
        return self::$connection;
    }

    /**
     * Execute INSERT / UPDATE / DELETE with a raw query string.
     * Kept for backward compatibility – prefer preparedIUD() for new code.
     */
    public static function iud(string $q): void
    {
        $conn = self::getConnection();
        $conn->query($q);
    }

    /**
     * Execute a SELECT query and return the result set.
     * Kept for backward compatibility.
     */
    public static function search(string $q): mysqli_result|bool
    {
        $conn = self::getConnection();
        return $conn->query($q);
    }

    /**
     * Prepared-statement helper – INSERT / UPDATE / DELETE
     *
     * @param string $sql    SQL with ? placeholders
     * @param string $types  bind_param types string, e.g. 'ssi'
     * @param array  $params Values to bind
     * @return bool          true on success
     */
    public static function preparedIUD(string $sql, string $types = '', array $params = []): bool
    {
        $conn = self::getConnection();
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            error_log('Prepare failed: ' . $conn->error);
            return false;
        }
        if (!empty($types)) {
            $stmt->bind_param($types, ...$params);
        }
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    /**
     * Prepared-statement helper – SELECT
     *
     * @param string $sql    SQL with ? placeholders
     * @param string $types  bind_param types string
     * @param array  $params Values to bind
     * @return array         Array of associative-array rows
     */
    public static function preparedSearch(string $sql, string $types = '', array $params = []): array
    {
        $conn = self::getConnection();
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            error_log('Prepare failed: ' . $conn->error);
            return [];
        }
        if (!empty($types)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $rows   = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $stmt->close();
        return $rows;
    }

    /**
     * Escape a string value for use in raw legacy queries.
     */
    public static function escape(string $value): string
    {
        return self::getConnection()->real_escape_string($value);
    }
}
?>
