<?php

class Deck {
    private static int $autoId = 0;
    private readonly int $id;

    public readonly int $nDecks;
    public readonly int $nCards;

    public array $cards = [];

    public static final bool $AUTO_SHUFFLE = true;
    
    public function __construct(int $nDecks = 1) {
        $this->id = ++self::$autoId;
        $this->nDeck = $nDecks;
        $this->nCards = 52 * $this->nDecks;

        $this->init();
    }

    public function init(): void {
        for ($i = 0; $i < $this->nDecks; $i++) {

        }
    }
}

?>