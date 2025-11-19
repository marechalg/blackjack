<?php

class User {
    private static int $autoId = 0;
    private readonly int $id;

    public string $username;
    private string $password;

    public function __construct(string $username) {
        $this->username = $username;
    }
}

?>