$t = jQuery.noConflict();

$t(document).ready(function(){
    $t(window).scroll(function () {
        console.log($t(this).scrollTop())
        if ($t(this).scrollTop() < 200) {
            $t(".main-content--header").removeClass("shadow", 1000);
        }
        else
            $t(".main-content--header").addClass("shadow", 1000);
    });
});

