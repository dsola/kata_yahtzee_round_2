<?php
namespace Yahtzee;

interface UserInterface
{
    /**
     * @param Category $category
     */
    function printCategory($category);

    function printAvaliableCategories();

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
}