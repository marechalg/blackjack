<?php

class Round {
    public Game $game;

    public Hand $dealerHand;
    public array $playersHand = [];
    
    public array $bets = [];
    public int $turn = 0;

    public function __construct(Game $game) {
        $this->game = $game;
        $this->dealerHand = new Hand();
        
        if ($this->game->deck->currentCard >= $this->game->deck->cutCard) {
            $this->game->deck->shuffle();
        }

        foreach ($game->players as $player) {
            $hand = new Hand();
            $hand->cards[] = $game->deck->draw();
            $hand->cards[] = $game->deck->draw();
            $this->playersHand[$player->id] = $hand;
        }

        $this->dealerHand->cards[] = $game->deck->draw();
        $this->dealerHand->cards[] = $game->deck->draw();
    }

    public function __toString(): string {
        return include './controller/__toString.php';
    }
}

?>