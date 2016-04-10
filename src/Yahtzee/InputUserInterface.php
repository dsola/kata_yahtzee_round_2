<?php
namespace Yahtzee;

interface InputUserInterface
{
    public function readDiceToRerun();

    public function readCategory();
}