<?php

namespace ProjectSNM\Test;

require_once('./app/php/LeaderboardEntry.php');

use ProjectSNM\LeaderboardEntry;
use PHPUnit\Framework\TestCase;

class LeaderboardEntryTest extends TestCase
{
    public function testPlayerName()
    {
        $entry = new LeaderboardEntry;
        $entry->set_player_name("BOB jones");
        $this->assertEquals($entry->get_player_name(), "Bob Jones");
    }

    public function testGuesses()
    {
        $entry = new LeaderboardEntry;
        $entry->set_guesses("8");
        $this->assertEquals($entry->get_guesses(), "8");
    }

    public function testDayOfWord()
    {
        $entry = new LeaderboardEntry;
        $entry->set_day_of_word("2008-08-08");
        $this->assertEquals($entry->get_day_of_word(), "2008-08-08");
    }

    public function testCapitalize()
    {
        $entry = new LeaderboardEntry;
        $this->assertEquals($entry->capitalize("HELLO woRLd"), "Hello World");
    }
}
