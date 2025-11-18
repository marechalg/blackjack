<?php

enum GameStatus: string {
    case RUNNING = 'running';
    case ENDED = 'ended';
}

class Game {
    public static int $autoId = 0;
    public int $id;
    public DateTime $debut;
    public GameStatus $status;

    public function __construct() {
        $this->id = ++self::$autoId;
        $this->debut = new DateTime('now');
        $this->status = GameStatus::RUNNING;
    }
}

?>