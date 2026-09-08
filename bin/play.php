<?php

declare(strict_types=1);

/*
 * Point d'entree du jeu : c'est ce fichier que le prof lancera avec
 *   composer play
 * Il ne contient AUCUNE regle du jeu. Il lit le clavier, affiche du texte,
 * et appelle vos objets. Toute la logique vit dans src/.
 *
 * Ce squelette est une suggestion : renommez, decoupez, remplacez.
 */

require __DIR__.'/../vendor/autoload.php';

function ask(string $question): string
{
    echo $question;

    return trim((string) fgets(STDIN));
}

echo "=== Tamagotchi ===\n";
echo "1) Reprendre la partie\n";
echo "2) Nouvelle partie\n";
echo "3) Quitter\n";

$choice = ask('> ');

// TODO 1 : charger la sauvegarde JSON (option 1) ou creer une creature (option 2).
// TODO 2 : boucle de jeu : afficher l'etat, proposer les actions, lire le choix,
//          appliquer l'action, faire passer le temps (tick), recommencer.
// TODO 3 : sortir de la boucle quand la partie est finie, afficher le bilan.
// TODO 4 : sauvegarder avant de quitter.

echo "A vous de jouer : tout est a ecrire.\n";
