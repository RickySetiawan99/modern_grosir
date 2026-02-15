<!-- Import Js Files -->
<script src="{{ URL::asset('js/app-helpers.js') }}"></script>
<script src="{{ URL::asset('build/libs/jquery-steps/lib/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/js/theme/app.init.js') }}"></script>
<script src="{{ URL::asset('build/js/theme/theme.js') }}"></script>
<script src="{{ URL::asset('build/js/theme/app.min.js') }}"></script>

<script src="{{ URL::asset('build/js/theme/sidebarmenu.js') }}"></script>

<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

<!-- DataTables core -->
<script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('build/js/datatable/custom_datatable.js') }}"></script>
<script src="{{ URL::asset('build/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<script>
    // Global Datepicker Initialization
    $(document).ready(function() {
        if ($.fn.datepicker) {
            $('.datepicker-input').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                orientation: "bottom auto"
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        // --- Persistence Logic ---
        
        // Function to update localStorage and attributes
        function saveSetting(key, value, attr = null) {
            localStorage.setItem(key, value);
            if (attr) document.documentElement.setAttribute(attr, value);
        }

        // 1. Theme (Light/Dark)
        $(document).on('click', '.dark-layout', function() { saveSetting('theme', 'dark', 'data-bs-theme'); });
        $(document).on('click', '.light-layout', function() { saveSetting('theme', 'light', 'data-bs-theme'); });

        // 2. Color Theme
        window.handleColorTheme = (function(originalHandler) {
            return function(color) {
                saveSetting('color-theme', color, 'data-color-theme');
                if (typeof originalHandler === 'function') originalHandler(color);
            };
        })(window.handleColorTheme);

        // 3. Layout Type (Vertical/Horizontal)
        $(document).on('change', 'input[name="page-layout"]', function() {
            const val = $(this).attr('id') === 'horizontal-layout' ? 'horizontal' : 'vertical';
            saveSetting('layout', val, 'data-layout');
        });

        // 4. Direction (LTR/RTL)
        $(document).on('change', 'input[name="direction-l"]', function() {
            const val = $(this).attr('id') === 'rtl-layout' ? 'rtl' : 'ltr';
            saveSetting('direction', val, 'dir');
        });

        // 5. Container Option (Boxed/Full)
        $(document).on('change', 'input[name="layout"]', function() {
            const val = $(this).attr('id') === 'boxed-layout' ? 'true' : 'false';
            saveSetting('boxedLayout', val, 'data-boxed-layout');
        });

        // 6. Sidebar Type (Full/Mini)
        $(document).on('change', 'input[name="sidebar-type"]', function() {
            const val = $(this).attr('id') === 'mini-sidebar' ? 'mini-sidebar' : 'full';
            saveSetting('sidebarType', val, 'data-sidebar-type');
        });

        // 7. Card Border (Border/Shadow)
        $(document).on('change', 'input[name="card-layout"]', function() {
            const val = $(this).attr('id') === 'card-with-border' ? 'true' : 'false';
            saveSetting('cardBorder', val, 'data-card-border');
        });
    });
</script>