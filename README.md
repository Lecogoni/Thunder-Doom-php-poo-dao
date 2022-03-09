## Branch Master

Premiere version du projet en POO sans DAO

## Branch DAO

Review du projet pour install un DAO
les class warrior, warlock, druid ne servet plus a rien

## Branch MVC

implentation d'une architecture MVC
passe par l'instll de Apche dans le container



## Beweb exo

# Le DOM du tonnere :

2 combatants rentrent , un seul sort - a chaque tour : un jet d'initiative qui defini l'ordre d'attaque. - un attaquant attaque un defenseur. - (il est possible de s'attaquer soit même) le combat est fini quand il reste un seul combatant dans le DOM.

Les methodes de calculs de dégats vous incombent vous pouvez intégrer les armes. vous affichez ce qu'il se passe a l'instant t ex : loic attaque pierre et se loupe en infligeant 2pt de dégats. Vous pouvez definir des races et des classes pour developper les personnages (pv, agi , init, def...) Le lapin crétin est une classe...

En extra : Votre produit doit être capable de prendre un nombre infini de combattant !

code de index.php : $dom = new DOM(); $dom->add([new Fighter(),new Fighter()]); $dom->start();
