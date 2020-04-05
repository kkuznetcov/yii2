var input;
var submit_form = false;
var filter_selector = '#grid-id-filters input';

$("body").on('beforeFilter', "#grid-id" , function(event) {
    return submit_form;
});

$("body").on('afterFilter', "#grid-id" , function(event) {
    submit_form = false;
});

$(document)
.off('keydown.yiiGridView change.yiiGridView', filter_selector)
.on('keyup', filter_selector, function() {
    input = $(this).attr('name');

    if(submit_form === false) {
        submit_form = true;
        $("#grid-id").yiiGridView("applyFilter");
    }
})
.on('pjax:success', function() {
    var i = $("[name='"+input+"']");
    var val = i.val();
    i.focus().val('').val(val);
});