
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Alyusro Bandung Indonesia.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">

                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->


    <!--datatable js-->
    <script src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="<?= base_url() ?>/assets/js/pages/sweetalerts.init.js"></script>

    <!-- cleave.js -->
    <script src="<?= base_url() ?>/assets/libs/cleave.js/cleave.min.js"></script>

    <!-- form masks init -->
    <script src="<?= base_url() ?>/assets/js/pages/form-masks.init.js"></script>

    <!-- Modern colorpicker bundle -->
    <script src="<?= base_url() ?>/assets/libs/@simonwep/pickr/pickr.min.js"></script>


    <!-- init js -->
    <script src="<?= base_url() ?>/assets/js/pages/form-pickers.init.js"></script>

    <script src="<?= base_url() ?>/assets/js/flatpickr.js"></script>

    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="<?= base_url() ?>/assets/js/pages/select2.init.js"></script>

    <!-- prismjs plugin -->
    <script src="<?= base_url() ?>/assets/libs/prismjs/prism.js"></script>

    <script src="<?= base_url() ?>/assets/js/pages/form-validation.init.js"></script>


    <script src="<?= base_url() ?>/assets/js/pages/datatables.init.js"></script>
    <!-- App js -->
    <script src="<?= base_url() ?>/assets/js/app.js"></script>

    <script type="text/javascript">
      $(document).ready(function(e){
        $(".flatpickr_form").flatpickr();

      });

      new Cleave('#cleave-numeral2', {
          numeral: true
      });

      new Cleave('#cleave-numeral3', {
          numeral: true
      });

      new Cleave('#cleave-numeral4', {
          numeral: true
      });

    </script>

    <?php if ($this->session->flashdata('error')): ?>
    <script>


      var t;
      Swal.fire(
      {
        title:"Oops!!",
        html:"<?=$this->session->flashdata('error')?>",
        icon:"error",
        timer:4000,
        timerProgressBar:!0,
        showCloseButton:!0,
        didOpen:function(){
          Swal.showLoading(),
          t=setInterval(function(){
            var t=Swal.getHtmlContainer();!t||(t=t.querySelector("b"))&&(t.textContent=Swal.getTimerLeft())
          },100)},
            onClose:function(){
              clearInterval(t)
            }
        }).then(function(t){
          t.dismiss===Swal.DismissReason.timer&&console.log("I was closed by the timer")
        })


    </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
    <script>

      var t;
      Swal.fire(
      {
        title:"Yeayy!!",
        html:"<?=$this->session->flashdata('success')?>",
        icon:"success",
        timer:4000,
        timerProgressBar:!0,
        showCloseButton:!0,
        didOpen:function(){
          Swal.showLoading(),
          t=setInterval(function(){
            var t=Swal.getHtmlContainer();!t||(t=t.querySelector("b"))&&(t.textContent=Swal.getTimerLeft())
          },100)},
            onClose:function(){
              clearInterval(t)
            }
        }).then(function(t){
          t.dismiss===Swal.DismissReason.timer&&console.log("I was closed by the timer")
        })


    </script>
    <?php endif; ?>
</body>

</html>
