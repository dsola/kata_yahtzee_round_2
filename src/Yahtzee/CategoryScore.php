<?php

namespace Yahtzee;

class CategoryScore
{
    private $categoryScores = [
        1 => 0,
        2 => 0,
        3 => 0
    ];

    /**
     * @var OutputUserInterface
     */
    private $outputUserInterface;

    public function __construct(OutputUserInterface $outputUserInterface)
    {
        $this->outputUserInterface = $outputUserInterface;
    }

    /**
     * @param $category
     * @param $dice
     */
    public function saveCategoryScore($dice, $category)
    {
        $score = $this->calculateScore($dice, $category);
        $this->categoryScores[$category] = $score;
    }

    public function getFinalScore()
    {
        return array_sum($this->categoryScores);
    }


    /**
     * @param Category $category
     */
    public function getCategoryScore(Category $category)
    {
        return $this->categoryScores[$category->getValue()];
    }

    /**
     * @param array $dice
     * @param $category
     * @return int
     */
    private function calculateScore($dice, $category)
    {
        return count(array_filter($dice, function ($die) use ($category) {
            return $die == $category;
        }));
    }
}