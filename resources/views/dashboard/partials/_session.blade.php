@if (session('success'))

{{--    <script>
        new Noty({
            type: 'success',
            layout: 'topLeft',
            text: "{{ session('success') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>--}}
    <script>
        $(document).ready(function (e) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-right",
                "progressBar": true,
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            ///////////////////////////////
            // $('.bs-select').selectpicker({
            //     iconBase: 'fa',
            //     tickIcon: 'fa-check'
            // });
            ///////////////////////////
            // $('.datepicker').datepicker({
            //     format: 'yyyy-mm-dd',
            //     autoclose: true,
            //     forceParse: false,
            //     Default: true,
            //     clearBtn: true,
            //     todayHighlight: true,
            //     allowInputToggle: true
            // });
        });
    </script>


@endif
