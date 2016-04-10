<?php

namespace Yahtzee;

class YahtzeeTest extends \PHPUnit_Framework_TestCase
{
    
    public function testGame()
    {
        $inputUserInterface = new FakeInputUserInterface([
            [1, 2, 4],
            [2, 4],
            [2, 5],
            [3, 4, 5],
            [1, 2, 3, 4, 5],
            [1, 2, 4]
        ]);
        $outputUserInterface = new FakeOutputUserInterface();
        $userInterface = new InputOutputUserInterface(
            $inputUserInterface,
            $outputUserInterface
        );
        $dieRoller = new FakeDieRoller([2, 4, 1, 6, 1,
                                        1, 5 ,2,
                                        1,5,
                                        2, 4, 1, 6, 1,
                                        2, 3,
                                        6, 1, 2,
                                        2, 4, 1, 6, 1,
                                        5, 1, 3, 2, 3,
                                        6, 2, 4]);
        $diceRoller = new DiceRoller($dieRoller);
        $reRuns = new ReRuns($userInterface, $diceRoller);
        $categories = new Categories($userInterface, $diceRoller, $reRuns);
        $yahtzee = new Yahtzee($categories, $outputUserInterface);

        $yahtzee->play();
        $outputLines = [
            "Dice: D1:2 D2:4 D3:1 D4:6 D5:1",
            "[1] Dice to re-run:",
            "Dice: D1:1 D2:5 D3:1 D4:2 D5:1",
            "[2] Dice to re-run:",
            "Dice: D1:1 D2:1 D3:1 D4:5 D5:1",
            "Available categories:"
        ];
        $this->assertEquals($outputLines, $outputUserInterface->output);
    }
}
