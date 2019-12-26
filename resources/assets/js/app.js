var $ = window.jQuery = window.$ = require('jquery')
var M = require('materialize')

$(function() {
    M.AutoInit()

    $(".parallax").parallax()
    $("select").formSelect()
})
