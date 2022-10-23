<?php
namespace Finite\Contracts;

interface StateMachineInterface
{
    /**
     * check state machine can can change state or not
     * @param string $state
     * @return bool
     */
    public function can(string $state): bool;

    /**
     * set initialize state to state machine
     * @param string $state
     * @return StateMachineInterface
     */
    public function setInitializeState(string $state): StateMachineInterface;

    /**
     * add state to state machine
     * @param string $stateFrom
     * @param array $stateTo
     * @return StateMachineInterface
     */
    public function addState(string $stateFrom, array $stateTo): StateMachineInterface;
}