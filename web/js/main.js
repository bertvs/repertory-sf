$(document).ready(function() {

    $('.sidebar')
        .sidebar('attach events', '.menu .toggle')
        .sidebar('setting', 'transition', 'push')
    ;

    $('form .ui.form').children().addClass('field');

    var tableheight = $(window).outerHeight()
     - $("#title").outerHeight()
     - $("#links").outerHeight()
     - 210
     ;

    $('table.index').DataTable( {
        scrollY:        tableheight,
        scrollX:        true,
        scroller:       true,
        scrollCollapse: true,
        dom:            'Bftir',
        buttons: [
            'print'
        ],

    });
});