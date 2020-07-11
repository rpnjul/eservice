<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Panel Mekanik - EService </title>


        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/css/text.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/css/style.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/css/jquery-ui-1.8.2.custom.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/css/datePicker.css"/>

        <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/javascripts/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/javascripts/jquery-ui-1.8.2.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/javascripts/admin.js"></script>
        <!-- jquery.datePicker.js -->
        <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/javascripts/jquery.datePicker.js"></script>
        <!-- required plugins -->
        <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/javascripts/date.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
               
                $('.date-pick').datePicker({startDate:'1900-01-01'});
                
                $('#start-date').bind(
                'dpClosed',
                function(e, selectedDates)
                {
                    var d = selectedDates[0];
                    if (d) {
                        d = new Date(d);
                        $('#end-date').dpSetStartDate(d.addDays(0).asString());
                    }
                }
            );
                $('#end-date').bind(
                'dpClosed',
                function(e, selectedDates)
                {
                    var d = selectedDates[0];
                    if (d) {
                        d = new Date(d);
                        $('#start-date').dpSetEndDate(d.addDays(0).asString());
                    }
                }
            );
                    
            })
        </script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('#menu_list1').hide();
                $('#menu_list2').hide();
                $('#menu_list3').hide();
                $('#menu_list4').hide();
                $('#menu_list5').hide();
                $('#menu_list6').hide();
                $('#menu_list7').hide();
                $('#menu_list8').hide();
                $('#menu_list9').hide();
                $('#menu_list10').hide();
                $('#menu_list11').hide();
                $('#menu_list12').hide();
                $('#menu_list13').hide();
                $('#menu_list14').hide();
                $('#menu_list15').hide();
                // toggles1
                $('a#menu-toggle1').click(function() {
                    $('#menu_list1').toggle("blind", 400);
                    return false;

                });

                // toggles2
                $('a#menu-toggle2').click(function() {
                    $('#menu_list2').toggle("blind", 400);
                    return false;

                });

                // toggles3
                $('a#menu-toggle3').click(function() {
                    $('#menu_list3').toggle("blind", 400);
                    return false;

                });

                // toggles3
                $('a#menu-toggle4').click(function() {
                    $('#menu_list4').toggle("blind", 400);
                    return false;

                });
                $('a#menu-toggle5').click(function() {
                    $('#menu_list5').toggle("blind", 400);
                    return false;

                });
                $('a#menu-toggle6').click(function() {
                    $('#menu_list6').toggle("blind", 400);
                    return false;

                });
                $('a#menu-toggle7').click(function() {
                    $('#menu_list7').toggle("blind", 400);
                    return false;

                });
                $('a#menu-toggle8').click(function() {
                    $('#menu_list8').toggle("blind", 400);
                    return false;

                });
                $('a#menu-toggle9').click(function() {
                    $('#menu_list9').toggle("blind", 400);
                    return false;

                });
                $('a#menu-toggle10').click(function() {
                    $('#menu_list10').toggle("blind", 400);
                    return false;

                });
                $('a#menu-toggle11').click(function() {
                    $('#menu_list11').toggle("blind", 400);
                    return false;

                });
                $('a#menu-toggle12').click(function() {
                    $('#menu_list12').toggle("blind", 400);
                    return false;

                });
                
                $('a#menu-toggle13').click(function() {
                    $('#menu_list13').toggle("blind", 400);
                    return false;

                });
                
                $('a#menu-toggle14').click(function() {
                    $('#menu_list14').toggle("blind", 400);
                    return false;

                });
                
                $('a#menu-toggle15').click(function() {
                    $('#menu_list15').toggle("blind", 400);
                    return false;

                });

                $('a#menu-toggle1, a#menu-toggle2, a#menu-toggle3,a#menu-toggle4,a#menu-toggle5,a#menu-toggle6,a#menu-toggle7,a#menu-toggle8,a#menu-toggle9,a#menu-toggle10,a#menu-toggle11,a#menu-toggle12,a#menu-toggle13,a#menu-toggle14,a#menu-toggle15').toggle(
                function () {
                    $(this).addClass("selected");
                },
                function () {
                    $(this).removeClass("selected");
                }
            );
            });
        </script>
		
		

        <!--[if IE ]>
                 <link rel="stylesheet" type="text/css" href="css/iehack.css" />
        <![endif]-->

    </head>

    <body>
        <?php $this->load->view('player/header') ?>

        <div id="main_container" class="clearfix">
            <div id="main_content">
                <div class="content_inner">
                    <div class="stage">

                        <?php if (!empty($content)): ?>
                            <?php $this->load->view($content); ?>
                        <?php else: ?>
                            <?php echo 'Halaman tidak ada'; ?>
                        <?php endif; ?>
                    </div>

                    <!--end #article-->

                </div>
                <!--end .content_inner-->
            </div>
            <!--end #main_content-->

            <?php $this->load->view('player/sidebar'); ?>
            <!--end #side_menu-->

        </div>
        <!--end #main_container-->
        <?php $this->load->view('player/footer'); ?>
        <!--end #footer-->

    </body>

</html>
