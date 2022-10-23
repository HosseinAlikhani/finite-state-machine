<?php
namespace Finite;

use Finite\Contracts\StateMachineInterface;
use Finite\States\contracts\StateInterface;
use Finite\States\contracts\StatesInterface;
use Finite\States\States;

class StateMachine implements StateMachineInterface
{
    /**
     * state machines states
     * @var StatesInterface|null
     */
    private StatesInterface|null $states = null;

    /**
     * store initialize state to state machine
     * @var StateInterface|null
     */
    private StateInterface|null $initializeState = null;

    /**
     * add state to state machine
     * @param string $stateFrom
     * @param array $stateTo
     * @return StateMachineInterface
     */
    public function addState(string $stateFrom, array $stateTo): StateMachineInterface
    {
        if ( !$this->states ) {
            $this->states = new States();
        }
        $this->states->addState($stateFrom, $stateTo);
        return $this;
    }

    /**
     * set initialize state to state machine
     * @param string $state
     * @return StateMachineInterface
     */
    public function setInitializeState(string $state): StateMachineInterface
    {
        $this->initializeState = $this->states->getState($state);
        return $this;
    }

    /**
     * check state machine can can change state or not
     * @param string $state
     * @return bool
     */
    public function can(string $state): bool
    {
        return $this->initializeState->canChangeTo($state);
    }
}