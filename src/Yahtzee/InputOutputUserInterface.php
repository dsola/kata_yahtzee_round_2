<?php


namespace Yahtzee;


class InputOutputUserInterface implements UserInterface
{
    /** @var InputUserInterface */
    public $input;

    /** @var OutputUserInterface */
    public $output;

    /**
     * @param InputUserInterface $input
     * @param OutputUserInterface $output
     */
    public function __construct(InputUserInterface $input, OutputUserInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * @param Category $category
     */
    public function printCategory($category)
    {
        $this->output->printLine(sprintf("Category: %s", $category));
    }

    /**
     * @param $categories
     */
    public function printAvailableCategories($categories)
    {
       $this->printAvailableCategoriesLine();
        foreach($categories as $category)
        {
            $this->printCategoryAvailable($category);
        }
    }

    /**
     * @param array $dice
     */
    public function printDiceLine($dice)
    {
        $this->output->printLine(sprintf(
            "Dice: D1:%s D2:%s D3:%s D4:%s D5:%s", $dice[0], $dice[1], $dice[2], $dice[3], $dice[4]));
    }

    /**
     * @param Category $category
     * @param int $categoryScore
     */
    public function printCategoryScore($category, $categoryScore)
    {
        $this->output->printLine(sprintf("Category %s score: %s", $category, $categoryScore));
    }

    /**
     * @param int $reRunAttempt
     * @return array
     */
    public function requestDiceToReRun($reRunAttempt)
    {
        $this->printReRunAttempt($reRunAttempt);
        $diceToReRun = $this->readDiceToRerun();
        return $diceToReRun;
    }

    /**
     * @return array
     */
    private function readDiceToRerun()
    {
        return $this->input->readDiceToRerun();
    }

    /**
     * @param int $reRunAttempt
     */
    private function printReRunAttempt($reRunAttempt)
    {
        $this->output->printLine(sprintf("[%s] Dice to re-run:", $reRunAttempt));
    }

    private function printAvailableCategoriesLine()
    {
        $this->output->printLine(sprintf("Available categories:"));
    }

    private function printCategoryAvailable(Category $category)
    {
        $this->output->printLine(sprintf("[%s] %s", $category->getValue(), $category));
    }

}
