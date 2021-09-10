// =================== wow script ===================

// ==================================================
$(document).ready(function() {
    new WOW().init();

    // ==========================================
    $('.dropdown-menu').click(function(e) {
        e.stopPropagation();
    });
    //=================== upload edit profile img ===================
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
    // ================== indexSlider ===============================
    $('#indexSlider').owlCarousel({
        loop: false,
        center: false,
        items: 1,
        margin: 20,
        nav: true,
        dots: false,
        rtl: true,
        autoplay: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        animateIn: 'fadeIn', // add this
        animateOut: 'fadeOut', // and this
    })

    // ======================== headerSlider==========================
    $('#headerSlider').owlCarousel({
        loop: true,
        center: false,
        margin: 20,
        nav: true,
        dots: false,
        rtl: true,
        autoplay: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        animateIn: 'fadeIn', // add this
        animateOut: 'fadeOut', // and this
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })
    $(".owl-prev").html('<i class="far fa-arrow-alt-circle-right"></i>');
    $(".owl-next").html('<i class="far fa-arrow-alt-circle-left"></i>');
    // ======================== rated ===============================
    $('#rated').owlCarousel({
        loop: false,
        center: false,
        margin: 20,
        nav: true,
        dots: false,
        rtl: true,
        autoplay: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        animateIn: 'fadeIn', // add this
        animateOut: 'fadeOut', // and this
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
    $("#rated .owl-prev").html('<i class="fas fa-arrow-right"></i>');
    $("#rated .owl-next").html('<i class="fas fa-arrow-left"></i>');
    // =================== fields =======================================
    $('#fields').owlCarousel({
        loop: false,
        center: false,
        margin: 20,
        nav: true,
        dots: false,
        rtl: true,
        autoplay: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        animateIn: 'fadeIn', // add this
        animateOut: 'fadeOut', // and this
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
    $("#fields .owl-prev").html('<i class="fas fa-arrow-right"></i>');
    $("#fields .owl-next").html('<i class="fas fa-arrow-left"></i>');
    // =================== services ===================================
    $('#services').owlCarousel({
        loop: false,
        center: false,
        margin: 20,
        items: 1,
        nav: true,
        dots: false,
        rtl: true,
        autoplay: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        animateIn: 'fadeIn', // add this
        animateOut: 'fadeOut', // and this

    })
    $("#services .owl-prev").html('<i class="fas fa-arrow-right"></i>');
    $("#services .owl-next").html('<i class="fas fa-arrow-left"></i>');
    // ======================= BusinessGallery =======================
    $('#BusinessGallery').owlCarousel({
        loop: false,
        center: false,
        margin: 20,
        items: 1,
        nav: true,
        dots: false,
        rtl: true,
        autoplay: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        animateIn: 'fadeIn', // add this
        animateOut: 'fadeOut', // and this

    })
    $("#BusinessGallery .owl-prev").html('<i class="fas fa-arrow-right"></i>');
    $("#BusinessGallery .owl-next").html('<i class="fas fa-arrow-left"></i>');
    // ===================== providerServices============================
    $('#providerServices').owlCarousel({
        loop: false,
        center: false,
        margin: 20,
        items: 1,
        nav: true,
        dots: false,
        rtl: true,
        autoplay: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        animateIn: 'fadeIn', // add this
        animateOut: 'fadeOut', // and this

    })
    $("#providerServices .owl-prev").html('<i class="fas fa-arrow-right"></i>');
    $("#providerServices .owl-next").html('<i class="fas fa-arrow-left"></i>');
    // =================== toggle password visibility ===================
    $(".togglePass").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    //========================= get the name of uploaded file=========================
    $('input[type="file"]').change(function() {
        var value = $("input[type='file']").val();
        $('.js-value').text(value);
    });
    // ================delet address ========================
    $("button.delete").click(function() {
        $(this).parent().parent().parent().parent().remove();
    });
    // ============== hide and show input ===========================
    $("#providerCode").hide();
    $("#join").click(function() {
        if ($(this).is(":checked")) {
            $("#providerCode").show();
        } else {
            $("#providerCode").hide();
        }
    });
    // ============== hide and show nationality ===========================
    $("#nationality").hide();
    $("input[name='nationality']").click(function() {
        if ($("#other").is(":checked")) {
            $("#nationality").show();
        } else {
            $("#nationality").hide();
        }
    });
});

// =================================== map =========================
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(51.508742, -0.120850),
        zoom: 5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
