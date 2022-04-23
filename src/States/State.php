<?php
namespace Finite\States;

use Finite\Contracts\States\StateInterface;

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
     * @var array
     */
    private array $allowedStates = [];

    public function __construct(string $stateType, string|null $stateName = null, array $allowedStates)
    {
        $this->type = strtoupper($stateType);
        $this->name = $stateName ?? strtolower($this->getType());
        $this->allowedStates = $allowedStates;
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
     * set allowed states
     * @param array $allowedStates
     * @param bool $sync
     * @return StateInterface
     */
    public function setAllowedState(array $allowedStates, bool $sync = false): StateInterface
    {
        if ( $sync ) {
            $this->allowedStates = $allowedStates;
        } else {
            array_push($this->allowedStates, $allowedStates);
        }
        return $this;
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
        return in_array($state, $this->allowedStates);
    }
}