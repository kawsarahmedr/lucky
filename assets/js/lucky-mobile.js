(function ($) {
    var onClickMmenu = function () {
        var siteName = script_vars.site_name;
        var menu = new MmenuLight(
            document.querySelector('#menu'),
            'all'
        );
        var navigator = menu.navigation({
            // selectedClass: 'Selected',
            // slidingSubmenus: true,
            // theme: 'dark',
            title: siteName
        });
        var drawer = menu.offcanvas({
            // position: 'left'
        });
        $('.mobile-menu-icon').on("click", evnt => {
            evnt.preventDefault();
            drawer.open();
        });
    }
    // Dom Ready
    $(function () {
        onClickMmenu();
    });
})(jQuery);
/*
* The End ! Theme created by https://urldev.com
*/