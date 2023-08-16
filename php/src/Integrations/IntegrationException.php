<?php

namespace App\Integrations;

use Exception;

class IntegrationException extends Exception
{
    public static function notImplemented(string $providerName): self
    {
        return new self(
            sprintf('The weather provider %s is not implemented yet.', $providerName)
        );
    }

    public static function differentObject(string $classPath): self
    {
        return new self(sprintf('Parsed weather object "%s" is different from expected.', $classPath));
    }
}