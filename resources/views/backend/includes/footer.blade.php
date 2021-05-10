    </div>
    <script src="{{('public/backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{('public/backend/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{('public/backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{('public/backend/js/main.js')}}"></script>

    {{-- dashboard --}}
    <script src="{{('public/backend/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{('public/backend/js/dashboard.js')}}"></script>
    <script src="{{('public/backend/js/widgets.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
    <script src="{{('public/backend/js/toastr.min.js')}}"></script>
    <script src="{{('public/backend/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{('public/backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{('public/backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    

    {{-- member --}}
    <script src="{{('public/backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{('public/backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{('public/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{('public/backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{('public/backend/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{('public/backend/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{('public/backend/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{('public/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{('public/backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{('public/backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{('public/backend/js/init-scripts/data-table/datatables-init.js')}}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
    @yield('script')
</body>

</html>