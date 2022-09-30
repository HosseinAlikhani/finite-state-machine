<?php
namespace Finite\Transitions;

use Closure;
use Finite\Transitions\contracts\TransitionInterface;

final class Transition implements TransitionInterface
{
    /**
     * store transition callback
     * @var array
     */
    private array $callback;

    public function __construct(array $transition)
    {
        $entry = $do = $exit = null;

        if ( $transition instanceof Closure ) {
            $entry = $transition;
        } else {
            list($entry, $do, $exit ) = $transition;
        }

        $this->callback = [
            'entry' =>  $entry,
            'do'    =>  $do,
            'exit'  =>  $exit
        ];
    }
}