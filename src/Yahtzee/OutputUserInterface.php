<?php
namespace Yahtzee;

interface OutputUserInterface
{
    /**
     * @param string $line
     */
    public function printLine($line);

    /**
     * @param $line
     * @param $new
     * @return mixed
     */
    public function printInline($line, $new);
}