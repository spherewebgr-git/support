$t = jQuery.noConflict();

$t(document).ready(function(){
    $t('.main-content--body').scroll(function () {
        if ($t(this).scrollTop() < 200) {
            $t(".main-content--header").removeClass("add-shadow", 1000);
        }
        else
            $t(".main-content--header").addClass("add-shadow", 1000);
    });
});

