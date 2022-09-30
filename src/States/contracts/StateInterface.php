<?php
namespace Finite\States\contracts;

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
     * check state can be changed To
     * @param string $state
     * @return bool
     */
    public function canChangeTo(string $state): bool;
}