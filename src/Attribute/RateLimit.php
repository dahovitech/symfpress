<?php

namespace App\Attribute;

use Attribute;

/**
 * Attribut pour appliquer le rate limiting sur une méthode de contrôleur
 * Utilisation : #[RateLimit('login')] ou #[RateLimit('api', identifier: 'custom_key')]
 */
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
class RateLimit
{
    public function __construct(
        public readonly string $limiterType,
        public readonly ?string $identifier = null,
        public readonly bool $bypassForAdmin = false
    ) {}
}