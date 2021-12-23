<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;

class AddCommand extends Command
{
    /**
     * @var string
     */
    protected $signature;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    public $commandFirst;

    /*
            mencoba membuat operasi matematika dalam satu file 
            namun gagal di command yang berbeda hanya bisa di satu command
     */

    // public function __construct($commandFirst = "")
    // {
    //     for ($i = 0; $i < count($this->getCommandVerb()); $i++) {
    //         $this->signature = sprintf(
    //             '%s {numbers* : The numbers to be %s}',
    //             $this->getCommandVerb()[$i],
    //             $this->getCommandPassiveVerb()
    //         );
    //     }


    //     // $this->description = sprintf('%s all given Numbers', ucfirst($commandVerb));
    //     parent::__construct();
    // }

    // protected function getCommandVerb(): array
    // {
    //     return ["add", "add"];
    // }

    // protected function getCommandPassiveVerb(): string
    // {
    //     return 'added';
    // }

    // public function handle(): void
    // {
    //     if ($this->getInput()["command"] == "add") {
    //         $this->operator = sprintf(' %s ', "+");
    //         $this->commandFirst = "add";
    //     } else if ($this->getInput()["command"] == "subtract") {
    //         $this->operator = sprintf(' %s ', "-");
    //         $this->commandFirst = "subtract";
    //     }

    //     $numbers = $this->getInput()["numbers"];

    //     $description = $this->generateCalculationDescription($numbers);
    //     $result = $this->calculateAll($numbers);

    //     $this->comment(sprintf('%s = %s', $description, $result));
    // }

    // protected function getInput(): array
    // {
    //     return $this->argument();
    // }

    // protected function generateCalculationDescription(array $numbers): string
    // {
    //     $operator = $this->getOperator();
    //     $glue = sprintf(' %s ', $operator);

    //     return implode($glue, $numbers);
    // }

    // protected function getOperator(): string
    // {
    //     return $this->operator;
    // }

    // /**
    //  * @param array $numbers
    //  *
    //  * @return float|int
    //  */
    // protected function calculateAll(array $numbers)
    // {
    //     $number = array_pop($numbers);


    //     if (count($numbers) <= 0) {
    //         return $number;
    //     }

    //     return $this->calculate($this->calculateAll($numbers), $number);
    // }

    // /**
    //  * @param int|float $number1
    //  * @param int|float $number2
    //  *
    //  * @return int|float
    //  */
    // protected function calculate($number1, $number2)
    // {
    //     if ($this->commandFirst == 'add') {
    //         return $number1 + $number2;
    //     } else if ($this->commandFirst == 'subtract') {
    //         return $number1 - $number2;
    //     }
    // }


    public function __construct()
    {
        $commandVerb = $this->getCommandVerb();

        $this->signature = sprintf(
            '%s {numbers* : The numbers to be %s}',
            $commandVerb,
            $this->getCommandPassiveVerb()
        );

        $this->description = sprintf('%s all given Numbers', ucfirst($commandVerb));
        parent::__construct();
    }

    protected function getCommandVerb(): string
    {
        return 'add';
    }

    protected function getCommandPassiveVerb(): string
    {
        return 'added';
    }

    public function handle(): void
    {
        $numbers = $this->getInput();
        $description = $this->generateCalculationDescription($numbers);
        $result = $this->calculateAll($numbers);

        $this->comment(sprintf('%s = %s', $description, $result));
    }

    protected function getInput(): array
    {
        return $this->argument('numbers');
    }

    protected function generateCalculationDescription(array $numbers): string
    {
        $operator = $this->getOperator();
        $glue = sprintf(' %s ', $operator);

        return implode($glue, $numbers);
    }

    protected function getOperator(): string
    {
        return '+';
    }

    /**
     * @param array $numbers
     *
     * @return float|int
     */
    protected function calculateAll(array $numbers)
    {
        $number = array_pop($numbers);

        if (count($numbers) <= 0) {
            return $number;
        }

        return $this->calculate($this->calculateAll($numbers), $number);
    }

    /**
     * @param int|float $number1
     * @param int|float $number2
     *
     * @return int|float
     */
    protected function calculate($number1, $number2)
    {
        return $number1 + $number2;
    }
}
