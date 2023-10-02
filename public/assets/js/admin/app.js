$(document).ready(function() {

    let is_active = true;

    // SIDEBAR DROPDOWN
    // SHOW DROPDOWN WHEN MENU LINK CLICKED
    // HIDE OTHER DROPDOWNS WHEN AN EXISTING DROPDOW ALREADY OPENED
    $(document).on('click', '#sidebar-menu-link', function() {
        const is_collapsed = $(this).next('.dropdown-content').find('ul.collapse').length;
        if(is_collapsed > 0) {
            if(is_active) {
                $('.dropdown-content ul').addClass('collapse');
                $(this).next('.dropdown-content').find('ul.collapse').removeClass('collapse');
            } else {
                let w = ($(window).width());
                if(w > 768) {
                    $('#sidebar').removeClass('active');   
                }
                $('.logo-sidebar').removeClass('active');
                $('.hamburger-wrapper').removeClass('active');
                $('#content').removeClass('active');
                $('.dropdown-content ul').addClass('collapse');
                $(this).next('.dropdown-content').find('ul.collapse').removeClass('collapse');
            }
        } else {
            $(this).next('.dropdown-content').find('ul').addClass('collapse');
        }
    });

    // ANIMATE HAMBURGER EVENTS
    // ADJUST WIDTHS OF SIDEBAR AND CONTENT DIV TO ITS CORRESPONDING VALUES IN CSS
    $('.hamburger-wrapper').on('click', function() {
        if(is_active) {
            $('#sidebar').addClass('active');
            $('#content').addClass('active');
            $('.logo-sidebar').addClass('active');
            $('.dropdown-content').find('ul').addClass('collapse');
            $(this).addClass('active');
            is_active = false;
        } else {
            $('#sidebar').removeClass('active');
            $('#content').removeClass('active');
            $('.logo-sidebar').removeClass('active');
            $(this).removeClass('active');
            is_active = true;
        }
    });

    $(window).on('scroll', () => {
        if($(this).scrollTop() > 0) {
            $('.hamburger-wrapper').addClass('anim');
        } else {
            $('.hamburger-wrapper').removeClass('anim');
        }
    });
    

    // ANIMATE NAVBAR SEARCG WHEN CLICKED
    $('#btn-search').on('click', function() {
        $('.hamburger-wrapper').toggleClass('d-none');
        $('.search-bar').toggleClass('d-none');
    });

    // DISABLE CONTEXT MENU

    // $(document).on('contextmenu', function(evt) {
    //     evt.preventDefault();
    // });

    // $(document).on('copy', function(evt) {
    //     evt.originalEvent.clipboardData.setData('text/plain', 'Copying is disabled');
    //     evt.preventDefault();
    // });



});