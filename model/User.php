<?php

class User {
    private static int $autoId = 0;
    private readonly int $id;

    public string $username;

    public function __construct(string $username) {
        $this->id = ++self::$autoId;
        $this->username = $username;
    }

    public function toString(): string {
        return "User[id=$this->id, username=$this->username]";
    }
}

?>