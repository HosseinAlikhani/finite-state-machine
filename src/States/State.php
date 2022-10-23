<?php
namespace Finite\States;

use Finite\States\contracts\StateInterface;
use Finite\States\contracts\StatesInterface;
use Finite\Transitions\contracts\TransitionInterface;
use Finite\Transitions\Transition;

class State implements StateInterface
{
    /**
     * store state type
     * @var string
     */
    protected string $type;

    /**
     * store state name
     * @var string
     */
    protected string $name;

    /**
     * store allowed states that can be changed
     * @var StatesInterface
     */
    private StatesInterface $allowedStates;

    /**
     * store allowed state transition
     * @var TransitionInterface
     */
    private TransitionInterface $transition;

    public function __construct(
        string $stateType, 
        string|null $stateName = null, 
        array $allowedStates,
        array $transition,
    )
    {
        $this->type = strtoupper($stateType);
        $this->name = $stateName ?? strtolower($this->getType());
        $this->setAllowedStates($allowedStates);
        $this->setTransition($transition);
    }

    /**
     * set allowed states
     * @param array $allowedStates
     */
    private function setAllowedStates(array $allowedStates)
    {
        $this->allowedStates = new States();

        if ( count($allowedStates) ) {
            foreach( $allowedStates as $state => $transition ) {
                $this->allowedStates->addState($state, [], $transition);
            }
        }
        
        return $this;
    }

    /**
     * @param array $transition
     */
    private function setTransition(array $transition)
    {
        $this->transition = new Transition($transition);
        return $this;
    }

    /**
     * return state type
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * return state name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * get allowed states
     * @return StatesInterface
     */
    public function getAllowedState(): StatesInterface
    {
        return $this->allowedStates;
    }

    /**
     * get transition
     * @return TransitionInterface
     */
    public function getTransition(): TransitionInterface
    {
        return $this->transition;
    }

    /**
     * check state can be changed To
     * @param string $state
     * @return bool
     */
    public function canChangeTo(string $state): bool
    {
        $canChangeTo = $this->allowedStates->isStateExists($state);
        if ( ! $canChangeTo ) {
            return $canChangeTo;
        }

        $transition = $this->allowedStates->getState($state)->getTransition();
        return $transition->runCallback();
    }
}