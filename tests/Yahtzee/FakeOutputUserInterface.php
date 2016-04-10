<?php


namespace Yahtzee;


class FakeOutputUserInterface implements OutputUserInterface
{
    /** @var array */
    public $output = [];
    
    /**
     * @param string $line
     */
    public function printLine($line)
    {
        $this->output[] = $line;
    }

    /**
     * @param $line
     * @param int $new
     * @return mixed|void
     */
    public function printInline($line, $new = false)
    {
        if ($new) $this->output[] = $line;
        else $this->output[count($this->output) -1] .= $line;
    }
}