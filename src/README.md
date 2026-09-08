# `src/` — votre code

Ce dossier est vide, et c'est voulu. Une seule regle technique : le namespace
`Tamagotchi\` correspond a ce dossier (PSR-4). `Tamagotchi\Creature` vit donc
dans `src/Creature.php`, `Tamagotchi\Action\Feed` dans `src/Action/Feed.php`.

## Etapes conseillees

Aucune n'est obligatoire, mais cet ordre evite de rester bloque.

1. **La creature qui existe.** `Creature` avec un nom (`readonly`) et trois
   jauges bornees 0-100. Une methode privee qui borne une valeur, utilisee
   partout : c'est le seul endroit ou 0 et 100 sont ecrits. `stats(): array`.
   Le premier test d'acceptation passe.
2. **Le temps.** `tick()` : au moins une jauge monte, au moins une descend.
   Deuxieme test vert.
3. **Une action.** `feed()`. Troisieme test vert. Puis `play()` et `sleep()`.
4. **L'humeur.** Un `enum` calcule a partir des jauges, avec un `label()` et,
   si vous voulez, un visage ASCII.
5. **La fin de partie.** Un etat final, une methode `isAlive()` ou equivalent,
   et un bilan.
6. **Les actions impossibles.** Une exception maison plutot qu'un `return false`.
7. **La sauvegarde.** `JsonSerializable` pour ecrire, une fabrique statique
   `fromArray()` pour relire.
8. **Le reste** : inventaire, magasin, difficulte croissante, ce que vous voulez.

Ecrivez vos propres tests au fur et a mesure dans `tests/Feature/` ou
`tests/Unit/` : au moins trois sont demandes, et ils comptent plus que leur
nombre s'ils testent une vraie regle (une jauge qui ne depasse jamais 100, une
action refusee quand la creature dort, une sauvegarde relue a l'identique).
