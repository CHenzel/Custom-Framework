Custom-Framework
================

Un framework fait maison basé sur des composants symfony 2, créé à l'occasion de la [nuit de l'info 2014](http://www.nuitdelinfo.com/). 
Il a permit à l'équipe Respectless de gagner le défit [Meilleur développement utilisant les technologies du Web / mobile](http://www.nuitdelinfo.com/n2i/defis/41).
Ce mini-framework est simple et permet de déployer rapidement un site web. Il inclut les éléments que l'on trouve classiquement dans un système MVC (Routeur, Model, Controleur,Vue), il inclut également des notions de sécurité d'identification et un mode développeur/production (Encore en développement). 
Ainsi qu'un datagrid utilisant les sources du [spyrit/propel-datagrid-bundle](https://packagist.org/packages/spyrit/propel-datagrid-bundle).


## Installation

### Composer

Le projet est hébergé sur [packagist](https://packagist.org/packages/chenzel/custom-framework)

#### Master
```
composer create-project chenzel/custom-framework myproject dev-master
```
or
#### Demo
```
composer create-project chenzel/custom-framework myproject dev-demo
```
or
#### Tag
```
composer create-project chenzel/custom-framework myproject 0.*
```

Pour ces solutions, allez dans votre dossier "myproject" et faites
```
composer dump-autoload
```

### Propel
Placez vous à la racine de votre projet.

Créer le lien symbolique pour propel 

```
ln -s vendor/bin/propel propel
```

Pour avoir la console propel
```
./propel or php ./propel
```

Créer le fichier de configuration de propel
```
cp config/propel.dist.yml config/propel.yml
```

Dans le fichier de configuration propel.yml remplacer la chaine "custom_framework" par le nom de votre base de données crée pour votre projet, ainsi que dans le fichier config/schema.xml

Pour générer le fichier de configuration de propel 

```
./propel config:convert
```

##### Générer le model propel (A faire à chaque fois que vous changerez votre fichier config/schema.xml)
```
./propel sql:build
./propel model:build
./propel migration:diff
./propel migration:migrate
```

Peut être nécessaire
```
composer dump-autoload
```

### Tester la démo

##### Composer
```
composer create-project chenzel/custom-framework myproject dev-demo
```

Faites le même processus d'installation et propel.
Jouez le dump sql dans config/dump/custom_framework_2014-12-14.sql

#### Allez avec votre navigateur préféré à l'adresse suivante :

##### Accueil 
127.0.0.1 ou nom-de-domain-local.*

##### Admin 
127.0.0.1/admin ou nom-de-domain-local.*/admin

login : test@test.com
mot de passe : test

### Documentation 

#### Routing

A faire

#### Contrôleur

A faire

#### Vues

A faire

#### Dossier web

A faire

#### Securité

A faire

#### Datagrid

A faire

Je remercie

- Maxime Corson pour son [spyrit/propel-datagrid-bundle](https://packagist.org/packages/spyrit/propel-datagrid-bundle).
- Sensiolab et Symfony 2 pour ses [composants](http://symfony.com/).