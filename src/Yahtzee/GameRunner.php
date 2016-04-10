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
     * @param UserInterface $userInterface
     * @param DiceRoller $diceRoller
     * @param ReRuns $reRuns
     * @param CategorySelector $categorySelector
     */
    public function __construct(UserInterface $userInterface, DiceRoller $diceRoller, ReRuns $reRuns, CategorySelector $categorySelector)
    {
        $this->userInterface = $userInterface;
        $this->diceRoller = $diceRoller;
        $this->reRuns = $reRuns;
        $this->categorySelector = $categorySelector;
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
            $this->categorySelector->chooseCategory($categories);
        }

        /*
        foreach (Category::all() as $category) {
            $this->diceRoller->rollAll();
            $this->userInterface->printDiceLine($this->diceRoller->lastRollResult());
            $this->reRuns->doReRuns($numReRuns);
            $this->userInterface->printCategoryScore($category, $category->calculateScore($this->diceRoller->lastRollResult()));
        }
        */
    }
}
