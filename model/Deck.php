<?php

require_once 'Card.php';

class Deck {
    private static int $autoId = 0;
    private readonly int $id;

    public readonly int $nDecks;
    public readonly int $nCards;
    public readonly int $cutCard;

    public array $cards = [];
    public int $currentCard = 0;

    public static final bool $AUTO_SHUFFLE = true;
    
    public function __construct(int $nDecks = 1) {
        $this->id = ++self::$autoId;
        $this->nDecks = $nDecks;
        $this->nCards = 52 * $this->nDecks;
        $this->cutCard = (int)($this->nCards * 0.75);

        $this->init();
    }

    public function init(): void {
        $this->cards = [];

        for ($i = 0; $i < $this->nDecks; $i++) {
            foreach (Type::cases() as $type) {
                foreach (Symbol::cases() as $symbol) {
                    $this->cards[] = new Card($type, $symbol);
                }
            }
        }

        $this->shuffle();
    }

    public function shuffle(): void {
        shuffle($this->cards);
        $this->currentCard = 0;
    }

    public function draw(): Card {
        $card = $this->cards[$this->currentCard];
        $this->currentCard++;

        return $card;
    }

    public function __toString(): string {
        return include './controller/__toString.php';
    }
}

?>