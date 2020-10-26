@if (session('success'))

        <script>
            swal.fire({
                title: "{{ session('success') }}",
                type: "success",
                timer: 2500,
                showConfirmButton: false
            });
        </script>
    {{--    <script>
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
        </script>--}}

{{--
    <script type="text/javascript">
        $(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                type: 'success',
                title: "{{ session('success') }}"
            })
        });

    </script>
--}}
@endif
