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

    public function __construct(string $stateType, string|null $stateName = null)
    {
        $this->type = strtoupper($stateType);
        $this->name = $stateName ?? strtolower($this->getType());
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
}