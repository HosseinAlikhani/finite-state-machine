<?php
namespace Finite\States\contracts;

interface StatesInterface
{
    /**
     * add state to states object
     * @param string|StateInterface $state
     * @param array $allowedStates
     * @return StatesInterface
     */
    public function addState(string|StateInterface $state, array $allowedStates): StatesInterface;

    /**
     * check state is exists in states property
     * @var string $stateType
     * @return bool
     */
    public function isStateExists(string $stateType): bool;

    /**
     * get specific state from states property
     * @var string
     * @return StateInterface
     */
    public function getState(string $stateType): StateInterface;
}