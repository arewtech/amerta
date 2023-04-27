    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend') }}/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('backend') }}/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('backend') }}/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('backend') }}/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend') }}/assets/js/demo/chart-area-demo.js"></script>
    <script src="{{ asset('backend') }}/assets/js/demo/chart-pie-demo.js"></script>
    <script src="{{ asset('frontend/assets/js/jquery.mask.min.js') }}"></script>
    <script>
        $('.rupiah').mask("#.##0", {
            reverse: true
        });
    </script>
    @stack('modal-js')
