<?php

namespace ProjectSNM\Test;

require_once('./app/php/TableInfo.php');

use ProjectSNM\TableInfo;
use PHPUnit\Framework\TestCase;

class TableInfoTest extends TestCase
{
    public function testPrintTableHeader()
    {
        $tableInfo = new TableInfo;
        $this->assertEquals($tableInfo->print_table_header(), "<table class = 'table leaderboard_table'> <thead class='thead-dark'> <tr> <th scope='col'> Name </th> <th scope='col'># of Guesses </th> </tr> <tbody>");
    }

    public function testTableClosingTags()
    {
        $tableInfo = new TableInfo;
        $this->assertEquals($tableInfo->print_table_closing_tags(), "</tbody> </table>");
    }
}
