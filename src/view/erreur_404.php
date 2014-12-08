<?php $view->extend('layout.php') ?>

<div class="well">
    <h1 class="grey lighter smaller">
            <span class="blue bigger-125">
                    <i class="ace-icon fa fa-sitemap"></i>
                    404
            </span>
            Page introuvable
    </h1>

    <hr>
    <h3 class="lighter smaller">Nous avons cherché partout , mais nous ne pouvions pas trouver!</h3>

    <div>
        <div class="space"></div>
        <h4 class="smaller">Pendant ce temps , essayez l'une des opérations suivantes :</h4>

        <ul class="list-unstyled spaced inline bigger-110 margin-15">
            <li>
                <i class="ace-icon fa fa-hand-o-right blue"></i>
                Re-vérifiez l'URL
            </li>

            <li>
                <i class="ace-icon fa fa-hand-o-right blue"></i>
                Contactez votre administrateur réseau.
            </li>
        </ul>
    </div>

    <hr>
    <div class="space"></div>

    <div class="center">
        <a href="javascript:history.back()" class="btn btn-grey">
            <i class="ace-icon fa fa-arrow-left"></i>
            Retour à la page précedente
        </a>

        <a href="#" class="btn btn-primary">
            <i class="ace-icon fa fa-tachometer"></i>
            Dashboard
        </a>
    </div>
</div>