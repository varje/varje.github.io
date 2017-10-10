/**
 * Created by Elitebook 1020 on 08-Sep-17.
 */

/* flip function */
$('.flip').hover(function(){
    $(this).find('.card').toggleClass('flipped');
});

// description text as pop-up
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});