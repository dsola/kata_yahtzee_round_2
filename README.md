Yahtzee Kata Round II
============

#Requirement change

The player should roll the dice (up to three rolls) but only choose the most suitable category to add the points to
after finishing each turn.

	> Dice: D1:2 D2:4 D3:1 D4:6 D5:1
	> [1] Dice to re-run:
    $ D1 D2 D4
	> Dice: D1:1 D2:5 D3:1 D4:2 D5:1
	> [2] Dice to re-run:
    $ D2 D4
	> Dice: D1:1 D2:1 D3:1 D4:5 D5:1

	> Available categories:
	> [1] Ones
	> [2] Twos
	> [3] Threes
	> Category to add points to: 1
	> ....

	> Dice: D1:2 D2:4 D3:2 D4:1 D5:3
	> [1] Dice to re-run:
    $ D1 D2 D4
	> Dice: D1:1 D2:5 D3:2 D4:2 D5:3
	> [2] Dice to re-run:
    $ D1 D2 D5
	> Dice: D1:2 D2:4 D3:2 D4:2 D5:5

	> Available categories:
	> [2] Twos
	> [3] Threes
	> Category to add points to: 2
	> ....

	> Yahtzee score
	> Ones: 4
	> Twos: 6
	> Threes: [Total for Threes]
	> Final score: [sum of the points in each category]
	>

Categories can be selected in any order. Categories can only be selected once.