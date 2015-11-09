var $ = window.jQuery = window.$ = require('jquery')
require('materialize')

$(function() {
    $(".parallax").parallax()
    $("select").material_select()
})
