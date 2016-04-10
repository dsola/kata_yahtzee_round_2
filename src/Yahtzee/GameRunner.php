<?php


namespace Yahtzee;


class GameRunner
{
    /** @var UserInterface */
    private $userInterface;

    /** @var DiceRoller */
    private $diceRoller;

    /** @var ReRuns */
    private $reRuns;

    /**
     * @var CategorySelector
     */
    private $categorySelector;
    /**
     * @var CategoryScore
     */
    private $categoryScore;

    /**
     * @param UserInterface $userInterface
     * @param DiceRoller $diceRoller
     * @param ReRuns $reRuns
     * @param CategorySelector $categorySelector
     * @param CategoryScore $categoryScore
     */
    public function __construct(UserInterface $userInterface, DiceRoller $diceRoller, ReRuns $reRuns, CategorySelector $categorySelector, CategoryScore $categoryScore)
    {
        $this->userInterface = $userInterface;
        $this->diceRoller = $diceRoller;
        $this->reRuns = $reRuns;
        $this->categorySelector = $categorySelector;
        $this->categoryScore = $categoryScore;
    }

    /**
     * @param int $numReRuns
     */
    public function play($numReRuns)
    {
        $categories = Category::all();
        $attempts = count($categories);

        for($i = 0; $i < $attempts; $i++)
        {
            $this->diceRoller->rollAll();
            $this->userInterface->printDiceLine($this->diceRoller->lastRollResult());
            $this->reRuns->doReRuns($numReRuns);
            $this->userInterface->printAvailableCategories($categories);
            $category = $this->categorySelector->chooseCategory($categories);
            $this->categoryScore->saveCategoryScore($this->diceRoller->lastRollResult(), $category);
        }

        $this->userInterface->printYahtzeeScoreLine();
        foreach(Category::all() as $category)
        {
            $this->userInterface->printCategoryScore($category, $this->categoryScore->getCategoryScore($category));
        }
        $this->userInterface->printFinalScore($this->categoryScore->getFinalScore());
    }
}
