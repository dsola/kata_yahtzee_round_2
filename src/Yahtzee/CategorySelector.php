<?php

namespace Yahtzee;


class CategorySelector
{
    /**
     * @var InputUserInterface
     */
    private $inputUserInterface;
    /**
     * @var OutputUserInterface
     */
    private $outputUserInterface;

    public function __construct(InputUserInterface $inputUserInterface, OutputUserInterface $outputUserInterface)
    {
        $this->inputUserInterface = $inputUserInterface;
        $this->outputUserInterface = $outputUserInterface;
    }

    public function chooseCategory(&$categories)
    {
        $this->outputUserInterface->printInline('Category to add points to: ', true);
        $category = $this->inputUserInterface->readCategory();
        $this->printChosenCategory($category);
        $this->deleteFromCategories($categories, $category);
        return $category;
    }

    private function printChosenCategory($category)
    {
        $this->outputUserInterface->printInline($category, false);
    }

    private function deleteFromCategories(&$categories, $category)
    {
        unset($categories[$category - 1]);
    }
}
