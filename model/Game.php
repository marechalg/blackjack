<?php

enum GameStatus: string {
    case RUNNING = 'running';
    case ENDED = 'ended';
}

class Game {
    private static int $autoId = 0;
    private readonly int $id;
    
    public readonly DateTime $debut;
    public GameStatus $status;

    public Dealer $dealer;
    public Deck $deck;

    public array $players = [];
    public static final int $MAX_PLAYERS = 7;

    public array $rounds = [];
    public int $round = 0;

    public function __construct() {
        $this->id = ++self::$autoId;
        $this->debut = new DateTime('now');
        $this->status = GameStatus::RUNNING;
        $this->dealer = new Dealer();
        $this->deck = new Deck();

        $this->newRound();
    }
}

?>