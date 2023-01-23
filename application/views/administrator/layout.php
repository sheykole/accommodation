<?php $this->load->view('administrator/inc/header')?>
        <!--**********************************
            Header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php $this->load->view('administrator/inc/nav')?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <?php $this->load->view($subview)?>
        <!--**********************************
            Content body end
        ***********************************-->
        
        <?php $this->load->view('administrator/inc/footer')?>
       