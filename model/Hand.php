<?php

class Hand {
    public array $cards = [];

    public function __construct() {
    }

    public function getScore(): int {
        $score = 0;
        $aces = 0;

        foreach ($this->cards as $card) {
            $score += $card->symbol->getValue();
            if ($card->symbol == Symbol::ACE) $aces++;
        }

        while ($score > 21 && $aces > 0) {
            $score -= 10;
            $aces--;
        }

        
        return $score;
    }

    public function __toString(): string {
        return include './controller/__toString.php';
    }
}

?>