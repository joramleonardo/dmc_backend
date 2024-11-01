<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DOST Multimedia Collection</title>

        
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

        <!-- CSS files -->

        <!-- <link href="tabler/libs/plyr/dist/plyr.css?1692870487" rel="stylesheet"/> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/plyr@3.6.8/dist/plyr.css">
        <!-- <link href="tabler/css/tabler.min.css?1692870487" rel="stylesheet"/> -->
        <link href="tabler/css/tabler.css" rel="stylesheet"/>
        <link href="tabler/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
        <link href="tabler/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
        <link href="tabler/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/fslightbox/index.js"></script>

        <style>
            @import url('https://rsms.me/inter/inter.css');
            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }
            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }
        </style>

    </head>
    <body> 
        <div id="app"></div>
        <script src="{{ asset('js/app.js') }}"> </script>
        
        <!-- Libs JS -->    
        <!-- <script src="tabler/libs/plyr/dist/plyr.min.js?1692870487" defer></script> -->
        <script src="https://cdn.jsdelivr.net/npm/plyr@3.6.8/dist/plyr.polyfilled.js"></script>
        <script src="https://www.youtube.com/iframe_api"></script>
        <script src="tabler/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
        <script src="tabler/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487" defer></script>
        <script src="tabler/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
        <script src="tabler/libs/jsvectormap/dist/maps/world-merc.js?1692870487" defer></script>
        <!-- Tabler Core -->
        <script src="tabler/js/tabler.min.js?1692870487" defer></script>
        <script src="tabler/js/demo.min.js?1692870487" defer></script>

        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <script>
            // @formatter:off
            document.addEventListener("DOMContentLoaded", function () {
                window.Plyr && (new Plyr('#player-youtube'));
            });
            // @formatter:on
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const player = new Plyr('#player', {
                    youtube: {
                        rel: 0,
                        showinfo: 0,
                        modestbranding: 1
                    }
                });
            });
        </script>
    </body>
</html>
