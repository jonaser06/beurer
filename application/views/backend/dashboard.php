<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->load->view('backend/chunks/head', '', TRUE); ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php
            echo $this->load->view('backend/chunks/header', '', TRUE);

            echo $this->load->view('backend/chunks/sidebar', array('active' => ''), TRUE);
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        

                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-yellow">
                            <div class="inner">
                              <h3><?= $cantidad_blogs;?></h3>

                              <p>Artículos</p>
                            </div>
                            <div class="icon">
                              <i class="ion-document-text"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <h3><?= $cantidad_autores;?></h3>

                              <p>Autores</p>
                            </div>
                            <div class="icon">
                              <i class="ion-person-stalker"></i>
                            </div>
                          </div>
                        </div>

                      </div>
                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <?php
            echo $this->load->view('backend/chunks/footer', '', TRUE);

//            if ($user['manager']['sudo']) {
//                echo $this->load->view('backend/chunks/content-sidebar-sudo', '', TRUE);
//            }
            ?>
        </div>
        <!-- ./wrapper -->

        <?php echo $this->load->view('backend/chunks/scripts', '', TRUE); ?>

        <script>
            $(document).ready(function () {

            });
        </script>
    </body>
</html>