<?php

namespace ProjectSNM;

class TableInfo
{
    function print_table_header()
    {
        return "<table class = 'table leaderboard_table'> <thead class='thead-dark'> <tr> <th scope='col'> Name </th> <th scope='col'># of Guesses </th> </tr> <tbody>";
    }
    // Print closing tags of the table
    function print_table_closing_tags()
    {
        return "</tbody> </table>";
    }
}
