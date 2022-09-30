<?php
namespace Finite\Exceptions;

use Exception;
use Finite\Exceptions\contracts\StateExceptionInterface;

final class StateException extends Exception implements StateExceptionInterface
{

}