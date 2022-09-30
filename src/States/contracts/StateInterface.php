<?php
namespace Finite\States\contracts;

use Finite\Transitions\contracts\TransitionInterface;

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
     * @return StatesInterface
     */
    public function getAllowedState(): StatesInterface;

    /**
     * get transition
     * @return TransitionInterface
     */
    public function getTransition(): TransitionInterface;

    /**
     * check state can be changed To
     * @param string $state
     * @return bool
     */
    public function canChangeTo(string $state): bool;
}