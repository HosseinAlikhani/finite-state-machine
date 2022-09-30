<?php
namespace Finite\States;

use Finite\Exceptions\StateException;
use Finite\States\contracts\StateInterface;
use Finite\States\contracts\StatesInterface;

final class States implements StatesInterface
{
    /**
     * store states
     * @var array
     */
    private array $states = [];

    /**
     * add state to states property
     * @param StateInterface|string
     * @param array $allowedStates
     * @return StatesInterface
     */
    public function addState(string|StateInterface $state, array $allowedStates = []): StatesInterface
    {
        $state = $state instanceof StateInterface ? $state : new State($state, null, $allowedStates);
        $this->states[$state->getName()] = $state;
        return $this;
    }

    /**
     * check state is exists in states property
     * @var string $stateType
     * @return bool
     */
    public function isStateExists(string $stateType): bool
    {
        return key_exists($stateType, $this->states) ? true : false;
    }

    /**
     * get specific state from states property
     * @var string
     * @return StateInterface
     */
    public function getState(string $state): StateInterface
    {
        if ( !$this->isStateExists($state) ) {
            throw new StateException(
                printf("state %s does not exists", $state),
                422
            );
        }
        return $this->states[$state];
    }
}