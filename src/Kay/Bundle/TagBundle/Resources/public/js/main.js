$(document).ready(function () {
    var tags = new Bloodhound({
        prefetch: '/Symfony/e-commerce-sf/web/app_dev.php/tags.json',
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $('.tag-input').tagsinput({
        typeaheadjs: [{
            hightlights: true

        }, {
            name: 'tags',
            display: 'name',
            value: 'name',
            source: tags
        }]
    });
});