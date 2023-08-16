<?php

namespace App\Commands;

use Exception;

class CommandException extends Exception
{
    public static function notImplemented(string $commandName): self
    {
        return new self(sprintf('Command "%s" not implemented yet.', $commandName));
    }
}