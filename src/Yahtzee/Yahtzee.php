<?php


namespace Yahtzee;


class Yahtzee
{
    const RERUN_ATTEMPTS = 2;

    /** @var GameRunner */
    private $categories;

    /** @var OutputUserInterface */
    private $outputUserInterface;

    /**
     * @param GameRunner $gameRunner
     * @param OutputUserInterface $outputUserInterface
     */
    public function __construct(GameRunner $gameRunner, OutputUserInterface $outputUserInterface)
    {
        $this->categories = $gameRunner;
        $this->outputUserInterface = $outputUserInterface;
    }
    
    public function play() {

        $this->categories->play(self::RERUN_ATTEMPTS);
    }
}
