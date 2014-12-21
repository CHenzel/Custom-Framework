Custom-Framework
================

A home-made framework based on components symfony 2, created on the occasion of the [nuit de l'info 2014](http://www.nuitdelinfo.com/). 
It has allowed the team Respectless to win undid it [Better development using the technologies of Web / mobile](http://www.nuitdelinfo.com/n2i/defis/41).
This mini-framework is simple and allows to create quickly a web site. It includes the elements which one find classically in a system MVC (Router, Controller, View), It also includes notions of safety(security) of identification and a mode developer / production (Still in development).
As well as a datagrid using the sources of [spyrit/propel-datagrid-bundle](https://packagist.org/packages/spyrit/propel-datagrid-bundle).

## Installation

### Composer

The project is stored on packagist [packagist](https://packagist.org/packages/chenzel/custom-framework)

#### Solution 1
```
composer create-project chenzel/custom-framework myproject
```

#### Solution 2
Add to your composer.json the following line :
##### Master
	"require": {
    	...
    	"chenzel/custom-framework": "dev-master"
    	...
	},
##### v0.x
    "require": {
        ...
        "chenzel/custom-framework": "0.x"
        ...
    },

Then
```
composer install
```

For both solutions, go to your folder "myproject" and make
```
composer dump-autoload
```

### Propel

Place you in the root of your project

Create the symbolic link for propel.

```
ln -s vendor/bin/propel propel
```

To have the console propel
```
./propel or php ./propel
```

Create the configuration file of propel
```
cp config/propel.dist.yml config/propel.yml
```

In the propel.yml configuration file replace the chain "custom_framework" by the name of your database created for your project, As well as in the file config/schema.xml

To generate the configuration file of propel 

```
./propel config:convert
```

##### Generate the model propel (To make every time you will change your file config/schema.xml)
```
./propel sql:build
./propel model:build
./propel migration:diff
./propel migration:migrate
```

Can be necessary
```
composer dump-autoload
```

### Try the demo

##### Composer
```
    "require": {
        ...
        "chenzel/custom-framework": "dev-demo"
        ...
    },
```

Make the same process of installation and propel.
Make the dump sql inconfig/dump/custom_framework_2014-12-14.sql

#### Go with your web browser preferred to the following address :

##### home 
127.0.0.1 ou name-of-local-domain.*

##### Admin 
127.0.0.1/admin ou name-of-local-domain.*/admin

login : test@test.com
mot de passe : test

### Documentation 

#### Routing

TO DO

#### Controller

TO DO

#### view

TO DO

#### Dossier web

TO DO

#### Securité

TO DO

#### Datagrid

TO DO

I thank

- Maxime Corson for his [spyrit/propel-datagrid-bundle](https://packagist.org/packages/spyrit/propel-datagrid-bundle).
- Sensiolab et Symfony 2 for these [composants](http://symfony.com/).