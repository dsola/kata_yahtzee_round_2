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

    public function readChosenCategory()
    {
        $this->outputUserInterface->printInline('Category to add points to: ', true);
        $category = $this->inputUserInterface->readCategory();
        $this->printChosenCategory($category);
    }

    private function printChosenCategory($category)
    {
        $this->outputUserInterface->printInline($category, false);
    }
}