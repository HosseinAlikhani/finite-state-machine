<?php
namespace Finite\Transitions;

use Closure;
use Finite\Transitions\contracts\TransitionInterface;

final class Transition implements TransitionInterface
{
    private ?Closure $entry;
    private ?Closure $do;
    private ?Closure $exit;

    public function __construct(array $transition)
    {
        if ( $transition instanceof Closure ) {
            $this->entry = $transition;
        } else {
            list($this->entry, $this->do, $this->exit ) = $transition;
        }
    }

    /**
     * run tranisiton callback
     * @return mixed
     */
    public function runCallback(): mixed
    {
        return ( $this->entry ? call_user_func($this->entry) : true ) && 
            ( $this->do ? call_user_func($this->do) : true ) && 
            ( $this->exit ? call_user_func($this->exit) : true ) ;
    }
}