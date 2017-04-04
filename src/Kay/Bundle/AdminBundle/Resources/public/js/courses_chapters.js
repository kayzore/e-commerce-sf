$(document).ready(function() {
    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $container = $('div#kay_bundle_platformbundle_courses_chapters'),
        initTiny;

    initTiny = function () {
        tinymce.init({
            language:'fr_FR',
            themes: "modern",
            selector: '.tinymce'
        });
    };

    // On ajoute un lien pour ajouter un nouveau chapitre
    var $addLink = $('#add_chapter');

    //$container.append($addLink);

    // On ajoute un nouveau champ à chaque click sur le lien d'ajout.
    $addLink.click(function(e) {
        addCategory($container);
        initTiny();
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index_chapter = $container.find(':input').length;

    // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'un nouveau cours par exemple).
    if (index_chapter === 0) {
        addCategory($container);
    } else {
        // Pour chaque chapitre déjà existant, on ajoute un lien de suppression
        $container.children('div').each(function() {
            addDeleteLink($(this));
        });
    }
    initTiny();
    var pos_init_btn_add_chapter = $addLink.offset().top;

    $(window).on('scroll', document, function () {
        if (($addLink.offset().top - $(window).scrollTop()) <= 60) {
            if ($addLink.hasClass('btn-not-fixed')) {
                $addLink
                    .addClass('btn-fixed')
                    .removeClass('btn-not-fixed')
                ;
            } else if ($(window).scrollTop() < pos_init_btn_add_chapter) {
                if ($addLink.hasClass('btn-fixed')) {
                    $addLink
                        .removeClass('btn-fixed')
                        .addClass('btn-not-fixed')
                    ;
                }
            }
        }
    });

    // La fonction qui ajoute un formulaire de chapitre
    function addCategory($container) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var $prototype = $($container.attr('data-prototype').replace(/__name__label__/g, 'Chapitre n°' + (index_chapter+1))
            .replace(/__name__/g, index_chapter));

        // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
        addDeleteLink($prototype);

        // On ajoute le prototype modifié à la fin de la balise <div>
        $container.append($prototype);

        // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
        index_chapter++;
    }

    // La fonction qui ajoute un lien de suppression d'une catégorie
    function addDeleteLink($prototype) {
        // Création du lien
        var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer le chapitre</a>');

        // Ajout du lien
        $prototype.append($deleteLink);

        // Ajout du listener sur le clic du lien
        $deleteLink.click(function(e) {
            index_chapter--;
            $prototype.remove();
            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
    }
});
