<?php

namespace Alura\Calisthenics\Domain\Student;

class Name
{
    private string $fName;
    private string $lName;

    public function __construct(string $fName, string $lName)
    {
        $this->fName = $fName;
        $this->lName = $lName;
    }

    public function __toString(): string
    {
        return "{$this->fName} {$this->lName}";
    }
}