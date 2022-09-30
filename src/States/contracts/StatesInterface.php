<?php
namespace Finite\States\contracts;

interface StatesInterface
{
    /**
     * add state to states property
     * @param StateInterface|string
     * @param array $allowedStates
     * @param array $transitions
     * @return StatesInterface
     */
    public function addState(
        string|StateInterface $state, 
        array $allowedStates = [],
        array $transitions = [],
    ): StatesInterface;

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