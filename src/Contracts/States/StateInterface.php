<?php
namespace Finite\Contracts\States;

interface StateInterface
{
    /**
     * get state type
     * @return string
     */
    public function getType(): string;

    /**
     * get state name
     * @return string
     */
    public function getName(): string;
}