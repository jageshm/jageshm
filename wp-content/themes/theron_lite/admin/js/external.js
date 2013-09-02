/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {


$("#sub_log, #sub_shrt, #sub_misc").hide();

$(".znctrl_wdgt").click(function () {
$(".znctrl_shrtcd, .znctrl_misc, .znctrl_sldr").removeClass('znctrl_curnt');
$(".znctrl_wdgt").addClass('znctrl_curnt');
$('#sub_log').show('medium');
$('#sub_comm, #sub_shrt, #sub_misc').hide('medium');
});

$(".znctrl_shrtcd").click(function () {
$(".znctrl_wdgt, .znctrl_misc, .znctrl_sldr").removeClass('znctrl_curnt');
$(".znctrl_shrtcd").addClass('znctrl_curnt');
$('#sub_shrt').show('medium');
$('#sub_comm, #sub_log, #sub_misc').hide('medium');
});

$(".znctrl_misc").click(function () {
$(".znctrl_shrtcd, .znctrl_wdgt, .znctrl_sldr").removeClass('znctrl_curnt');
$(".znctrl_misc").addClass('znctrl_curnt');
$('#sub_misc').show('medium');
$('#sub_comm, #sub_shrt, #sub_log').hide('medium');
});

$(".znctrl_sldr").click(function () {
$(".znctrl_shrtcd, .znctrl_misc, .znctrl_wdgt").removeClass('znctrl_curnt');
$(".znctrl_sldr").addClass('znctrl_curnt');
$('#sub_comm').show('medium');
$('#sub_log, #sub_shrt, #sub_misc').hide('medium');
});

});	