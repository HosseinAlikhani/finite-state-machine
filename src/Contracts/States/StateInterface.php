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
 
    /**
     * get allowed states
     * @return array
     */
    public function getAllowedState(): array;

    /**
     * set allowed states
     * @param array $allowedStates
     * @param bool $sync
     * @return StateInterface
     */
    public function setAllowedState(array $allowedStates, bool $sync = false): StateInterface;
}