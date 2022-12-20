export default function galleryFilter () {

	$(".filter-button").click(function() {
        var value = $(this).attr('data-filter');

        if (value == "all") {
            $('.filter').fadeIn('1000');
        } else {
            $(".filter").not('.' + value).fadeOut('3000');
            $('.filter').filter('.' + value).fadeIn('3000');
        }
    });

    if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
    }
    $(this).addClass("active");
        
}