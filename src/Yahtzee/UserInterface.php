<?php
namespace Yahtzee;

interface UserInterface
{
    /**
     * @param Category $category
     */
    function printCategory($category);

    function printAvailableCategories($categories);

    /**
     * @param array $dice
     */
    function printDiceLine($dice);

    /**
     * @param Category $category
     * @param int $categoryScore
     */
    function printCategoryScore($category, $categoryScore);

    /**
     * @param int $reRunAttempt
     * @return array
     */
    function requestDiceToReRun($reRunAttempt);

    function printYahtzeeScoreLine();

    function printFinalScore($score);
}