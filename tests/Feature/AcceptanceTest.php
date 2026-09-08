<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Tests d'acceptation
|--------------------------------------------------------------------------
|
| Ces trois tests sont le contrat minimal de votre projet. Ils ne disent
| rien de votre architecture : ni combien de classes, ni comment vous
| rangez vos jauges, ni comment vous sauvegardez. Ils verifient seulement
| qu'un programme exterieur peut faire naitre une creature, faire passer
| le temps et la nourrir.
|
| Ce qu'ils supposent, et rien d'autre :
|   - une classe Tamagotchi\Creature construite avec un nom ;
|   - une methode stats(): array, clé (string) => valeur (int) entre 0 et 100,
|     au moins trois jauges ;
|   - une methode tick(): le temps passe, au moins une jauge bouge ;
|   - une methode feed(): nourrir modifie au moins une jauge.
|
| Ne les modifiez pas. Ajoutez les votres a cote (au moins trois).
|
*/

it('fait naitre une creature avec des jauges dans les bornes', function () {
    $creature = newCreature('Pixel');

    expectValidStats($creature->stats());
});

it('fait evoluer les jauges quand le temps passe', function () {
    $creature = newCreature('Pixel');

    $before = expectValidStats($creature->stats());
    $creature->tick();
    $after = expectValidStats($creature->stats());

    expect(array_keys($after))->toBe(array_keys($before));
    expect($after)->not->toBe($before); // au moins une jauge a bouge
});

it('modifie une jauge quand on nourrit la creature', function () {
    $creature = newCreature('Pixel');

    $before = expectValidStats($creature->stats());
    $creature->feed();
    $after = expectValidStats($creature->stats());

    expect($after)->not->toBe($before);
});
