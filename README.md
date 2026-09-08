# tamagotchi-26 — repo de depart du projet

Projet **formatif** du bloc POO de 5XCOS : vous elevez une creature en
terminal. Remis, commente, pas note. L'enonce complet est dans le chapitre 10
du cours ; ce dépôt est le point de depart.

Ici, presque tout est vide. C'est normal : ce projet est le moment ou le
guidage s'arrete. Vous recevez l'outillage (Composer, Pest, CI) et un contrat
minimal de trois tests. Le reste — les classes, leurs relations, leurs noms —
c'est votre modelisation.

## Demarrer

```bash
composer install
composer test    # 3 tests rouges : c'est le point de depart
composer play    # lance bin/play.php
```

`composer test` echoue tant que `src/Creature.php` n'existe pas, avec un
message qui vous dit quoi creer. Un test rouge n'est pas une punition, c'est
une liste de courses.

## Le contrat minimal

Les trois tests de `tests/Feature/AcceptanceTest.php` sont les seules choses
imposees. **Ne les modifiez pas.** Ils supposent :

| Ce qui est impose | Detail |
| --- | --- |
| Une classe `Tamagotchi\Creature` | dans `src/Creature.php`, construite avec un nom : `new Creature('Pixel')` |
| `stats(): array` | au moins 3 entrees, cle `string` => valeur `int` comprise entre 0 et 100 |
| `tick(): void` | fait passer le temps : apres un tick, au moins une jauge a change |
| `feed(): void` | nourrir : au moins une jauge change |

**Tout le reste est libre.** Le nom de vos jauges, le nombre de classes, la
presence d'un enum, d'une interface, d'un inventaire, la forme de votre
sauvegarde, l'aspect de votre affichage : vos choix, a defendre dans votre
UML. Si votre modelisation vous amene a `Creature::tick()` qui delegue a trois
autres objets, tant mieux — les tests ne le sauront pas.

## Etapes conseillees

Voir `src/README.md` : huit etapes, de la creature qui existe a la sauvegarde
JSON. Vous n'etes pas oblige de les suivre dans cet ordre, mais commencez par
faire passer les trois tests d'acceptation avant d'ajouter quoi que ce soit.

## Livrables

1. Ce repo, forke sur votre compte, avec **la CI verte** (onglet Actions).
2. `docs/model.puml` : votre diagramme de classes, a jour du code rendu.
3. Les 3 tests d'acceptation verts **+ au moins 3 tests a vous**.
4. Un jeu jouable : `composer play`, menu reprendre / nouvelle partie /
   quitter, sauvegarde JSON, bilan de fin.
5. Le carnet metacognitif IA (modele fourni avec l'enonce).

## Arborescence

```
bin/play.php                     point d'entree du jeu (squelette)
src/                             votre code, namespace Tamagotchi\
docs/model.puml                  votre diagramme de classes (a remplir)
tests/Feature/AcceptanceTest.php les 3 tests imposes (ne pas modifier)
tests/Pest.php                   helpers des tests
.github/workflows/tests.yml      la CI, deja configuree
```
