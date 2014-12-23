Custom-Framework
================

This home-made framework based on Simfony 2 components has been created on the occasion of the [nuit de l'info 2014](http://www.nuitdelinfo.com/). 
It allowed the team Respectless to win the challenge [Better development using the technologies of Web / mobile](http://www.nuitdelinfo.com/n2i/defis/41).
This mini-framework is very simple and allows you to create quickly a web site. It includes the elements which we find classically in a system MVC (Router, Model, Controller, View), It also includes notions of safety(security), of identification and a developer mode / and production (Still in development).
As well as a datagrid using the sources of [spyrit/propel-datagrid-bundle](https://packagist.org/packages/spyrit/propel-datagrid-bundle).

## Installation

### Composer

The project is stored on packagist [Chenzel/custom-framework](https://packagist.org/packages/chenzel/custom-framework)

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

For those solutions, go to your folder "myproject" and make
```
composer dump-autoload
```

### Propel

Take position you in the root of your project

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
composer create-project chenzel/custom-framework myproject dev-demo
```

Make the same process of installation of propel.
Make the dump sql inconfig/dump/custom_framework_2014-12-14.sql

#### Go with your web browser prefered to the following address :

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

#### View

TO DO

#### Web Folder

TO DO

#### Security

TO DO

#### Datagrid

TO DO

I would like to thank

- Maxime Corson for his [spyrit/propel-datagrid-bundle](https://packagist.org/packages/spyrit/propel-datagrid-bundle).
- Sensiolab et Symfony 2 for its [components](http://symfony.com/).