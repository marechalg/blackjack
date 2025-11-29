<?php

class User {
    private static int $autoId = 0;
    public readonly int $id;

    public string $username;
    public int $balance = 200;

    public function __construct(string $username) {
        $this->id = ++self::$autoId;
        $this->username = $username;
    }

    public function __toString(): string {
        return include './controller/__toString.php';
    }
}

?>