<?php

declare(strict_types=1);

use PHPUnit\Framework\Assert;

// Tous les fichiers *Test.php du dossier tests/ utilisent la classe de base
// de PHPUnit. Pest s'occupe du reste.
pest()->extend(PHPUnit\Framework\TestCase::class)->in(__DIR__);

/**
 * Fabrique la creature a tester.
 *
 * Tant que src/Creature.php n'existe pas, les tests d'acceptation echouent
 * ici avec un message lisible plutot qu'avec une erreur d'autoload.
 */
function newCreature(string $name = 'Pixel'): object
{
    if (! class_exists(\Tamagotchi\Creature::class)) {
        Assert::fail(
            "La classe Tamagotchi\Creature n'existe pas encore. "
            ."Creez src/Creature.php avec le namespace Tamagotchi et un constructeur qui recoit un nom."
        );
    }

    return new \Tamagotchi\Creature($name);
}

/**
 * Verifie le contrat minimal de stats() : au moins trois jauges, entieres,
 * bornees entre 0 et 100.
 */
function expectValidStats(mixed $stats): array
{
    expect($stats)->toBeArray()
        ->and(count($stats))->toBeGreaterThanOrEqual(3);

    foreach ($stats as $key => $value) {
        expect($key)->toBeString();
        expect($value)->toBeInt();
        expect($value)->toBeGreaterThanOrEqual(0);
        expect($value)->toBeLessThanOrEqual(100);
    }

    return $stats;
}
