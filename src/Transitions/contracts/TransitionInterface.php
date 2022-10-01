<?php
namespace Finite\Transitions\contracts;

interface TransitionInterface
{
    /**
     * run tranisiton callback
     * @return mixed
     */
    public function runCallback(): mixed;
}