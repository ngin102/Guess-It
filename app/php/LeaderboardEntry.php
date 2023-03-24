<?php

namespace ProjectSNM;

class LeaderboardEntry
{
    public $player_name;
    public $guesses;
    public $day_of_word;

    function set_player_name($player_name)
    {
        $player_name = $this->capitalize($player_name);
        $this->player_name = $player_name;
    }

    function get_player_name()
    {
        return $this->player_name;
    }

    function set_guesses($guesses)
    {
        $this->guesses = $guesses;
    }

    function get_guesses()
    {
        return $this->guesses;
    }

    function set_day_of_word($day_of_word)
    {
        $this->day_of_word = $day_of_word;
    }

    function get_day_of_word()
    {
        return $this->day_of_word;
    }

    // Capitalizes the first character of each word and makes every other character lowercase.
    function capitalize($str)
    {
        return ucwords(strtolower($str));
    }
}
