<?php
namespace Finite\States;

use Finite\States\contracts\StateInterface;
use Finite\States\contracts\StatesInterface;

final class State implements StateInterface
{
    /**
     * store state type
     * @var string
     */
    private string $type;

    /**
     * store state name
     * @var string
     */
    private string $name;

    /**
     * store allowed states that can be changed
     * @var StatesInterface
     */
    private StatesInterface $allowedStates;

    public function __construct(string $stateType, string|null $stateName = null, array $allowedStates)
    {
        $this->type = strtoupper($stateType);
        $this->name = $stateName ?? strtolower($this->getType());
        $this->allowedStates = $this->setAllowedStates($allowedStates);
    }

    /**
     * set allowed states
     * @param array $allowedStates
     * @return StatesInterface
     */
    private function setAllowedStates(array $allowedStates): StatesInterface
    {
        $states = new States();

        if ( count($allowedStates) ) {
            foreach( $allowedStates as $state ) {
                $states->addState($state);
            }
        }
        
        return $states;
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
     * @return array
     */
    public function getAllowedState(): array
    {
        return $this->allowedStates;
    }

    /**
     * check state can be changed To
     * @param string $state
     * @return bool
     */
    public function canChangeTo(string $state): bool
    {
        return $this->allowedStates->isStateExists($state);
    }
}