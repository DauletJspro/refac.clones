<?php


namespace App\Pattern\Bonus;


use App\Models\UserPacket;
use phpDocumentor\Reflection\Types\Boolean;

interface Bonus
{
    public function run(): Boolean;
}
