<?php

namespace Yahtzee;

class YahtzeeTest extends \PHPUnit_Framework_TestCase
{
    
    public function testGame()
    {
        $inputUserInterface = new FakeInputUserInterface([
            [1, 2, 4],
            [2, 4],
            1,
            [1, 2, 4],
            [1, 2, 5],
            2,
            [1, 2, 3, 4, 5],
            [1, 2, 4],
            3
        ]);
        $outputUserInterface = new FakeOutputUserInterface();
        $userInterface = new InputOutputUserInterface(
            $inputUserInterface,
            $outputUserInterface
        );
        $dieRoller = new FakeDieRoller([2, 4, 1, 6, 1,
                                        1, 5 ,2,
                                        1,5,
                                        2, 4, 2, 1, 3,
                                        1, 5, 2,
                                        2, 4, 5,
                                        2, 4, 1, 6, 1,
                                        5, 1, 3, 2, 3,
                                        6, 2, 4]);
        $diceRoller = new DiceRoller($dieRoller);
        $reRuns = new ReRuns($userInterface, $diceRoller);
        $categorySelector = new CategorySelector($inputUserInterface, $outputUserInterface);
        $gameRunner = new GameRunner($userInterface, $diceRoller, $reRuns, $categorySelector);
        $yahtzee = new Yahtzee($gameRunner, $outputUserInterface);

        $yahtzee->play();
        $outputLines = [
            "Dice: D1:2 D2:4 D3:1 D4:6 D5:1",
            "[1] Dice to re-run:",
            "Dice: D1:1 D2:5 D3:1 D4:2 D5:1",
            "[2] Dice to re-run:",
            "Dice: D1:1 D2:1 D3:1 D4:5 D5:1",
            "Available categories:",
            "[1] Ones",
            "[2] Twos",
            "[3] Threes",
            "Category to add points to: 1",

            "Dice: D1:2 D2:4 D3:2 D4:1 D5:3",
            "[1] Dice to re-run:",
            "Dice: D1:1 D2:5 D3:2 D4:2 D5:3",
            "[2] Dice to re-run:",
            "Dice: D1:2 D2:4 D3:2 D4:2 D5:5",
            "Available categories:",
            "[2] Twos",
            "[3] Threes",
            "Category to add points to: 2",

            "Dice: D1:2 D2:4 D3:1 D4:6 D5:1",
            "[1] Dice to re-run:",
            "Dice: D1:5 D2:1 D3:3 D4:2 D5:3",
            "[2] Dice to re-run:",
            "Dice: D1:6 D2:2 D3:3 D4:4 D5:3",
            "Available categories:",
            "[3] Threes",
            "Category to add points to: 3",
        ];

        $this->assertEquals($outputLines, $outputUserInterface->output);
    }
}
