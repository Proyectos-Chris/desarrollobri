jQuery(document).ready(function($) {



    if ($("#js-rotating").length) {

        $("#js-rotating").Morphext({

            speed: 5000,

            animation: "zoomInUp",

            complete: function() {

                console.log("This is called after a phrase is animated in! Current phrase index: " + this.index);

            }

        });

    }



    //Onepage menu 

    $('#nav .nav-top.onemenu .first a').addClass('smoothanchor');

    if ($('#nav .nav-top').hasClass('onemenu')) {

        $('#main section').each(function(index, el) {

            if ($(this).attr('data-title') && $(this).attr('id')) {

                var id = $(this).attr('id');

                var title = $(this).attr('data-title');

                $('#nav .nav-top.onemenu').append('<li><a href="#' + id + '" class="smoothanchor">' + title + '</a></li>');

            }

        });

    }



    //Shop JS

    $('form.commerce-add-to-cart .form-item-quantity input').attr('type', 'number');

    $('form.commerce-add-to-cart .form-item-quantity input').attr('min', 1);

    $('form.commerce-add-to-cart .form-item-quantity input').attr('step', 1);



    if ($('#main').hasClass('christmasv3')) {

    	$(document).snowfall({ deviceorientation: true, round: true, minSize: 5, maxSize: 15, flakeCount: 250 });

    } else if ($('#main').hasClass('christmasv4')) {

    	$('#xmas').glauserChristmas({

		});

    }

    if($('#header .cart-box').html()) {
        Updatecart ();
    }

});

function Updatecart () {
    if($('.cart-drop .line-item-quantity-raw').text()) {
        var l = $('.cart-drop .line-item-quantity-raw').text();
    } else {
        var l = 0;
    }   
    $('.cart-box .cart-num').text(l);
    $('.cart-box span.txt span').text(l);
}