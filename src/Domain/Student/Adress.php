<?php

namespace Alura\Calisthenics\Domain\Student;

class Adress
{
    public string $province;
    public string $city;
    public string $street;
    public string $state;
    public string $country;
    private string $number;

    public function __construct(string $province, string $city, string $street,string $number, string $state, string $country)
    {
        $this->province = $province;
        $this->city = $city;
        $this->street = $street;
        $this->number = $number;
        $this->state = $state;
        $this->country = $country;
    }

    public function __toString() : string
    {
        return "{$this->country}, {$this->state},{$this->province}, {$this->city}, {$this->street}, {$this->number}";
    }
}