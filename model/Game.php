<?php

enum GameStatus: string {
    case RUNNING = 'running';
    case ENDED = 'ended';
}

class Game {
    private static int $autoId = 0;
    public readonly int $id;
    
    public readonly DateTime $debut;
    public GameStatus $status;

    public Deck $deck;

    public array $players = [];
    public static final int $MAX_PLAYERS = 7;

    public array $rounds = [];

    public function __construct(User $firstUser) {
        $this->id = ++self::$autoId;
        $this->debut = new DateTime('now');
        $this->status = GameStatus::RUNNING;
        $this->deck = new Deck();

        $this->players[] = $firstUser;

        $this->newRound();
    }

    public function newRound() {
        $this->rounds[] = new Round($this);
    }

    public function __toString(): string {
        return include './controller/__toString.php';
    }
}

?>