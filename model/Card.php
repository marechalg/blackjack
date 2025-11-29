<?php

enum Type: string {
    case HEART = 'heart';
    case DIAMOND = 'diamond';
    case CLUB = 'club';
    case SPADE = 'spade';

    public function getSymbol(): string {
        return match($this) {
            self::HEART => '♥',
            self::DIAMOND => '♦',
            self::CLUB => '♣',
            self::SPADE => '♠',
        };
    }
}

enum Symbol: string {
    case ACE = 'A';
    case TWO = '2';
    case THREE = '3';
    case FOUR = '4';
    case FIVE = '5';
    case SIX = '6';
    case SEVEN = '7';
    case EIGHT = '8';
    case NINE = '9';
    case TEN = '10';
    case JACK = 'J';
    case QUEEN = 'Q';
    case KING = 'K';

    public function getValue(): int {
        return match($this) {
            self::ACE => 11,
            self::TWO => 2,
            self::THREE => 3,
            self::FOUR => 4,
            self::FIVE => 5,
            self::SIX => 6,
            self::SEVEN => 7,
            self::EIGHT => 8,
            self::NINE => 9,
            self::TEN, self::JACK, self::QUEEN, self::KING => 10,
        };
    }
}

class Card {
    private static int $autoId = 0;
    private readonly int $id;

    public readonly Type $type;
    public readonly Symbol $symbol;

    public function __construct(Type $type, Symbol $symbol) {
        $this->id = ++self::$autoId;
        $this->type = $type;
        $this->symbol = $symbol;
    }

    public function __toString(): string {
        return include './controller/__toString.php';
    }
}

?>