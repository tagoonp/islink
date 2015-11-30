<?php

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>IS Link</title>
    <link rel="stylesheet" href="libraries/master/css/master.css" media="screen" charset="utf-8">
    <!-- <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Itim&subset=thai,latin' rel='stylesheet' type='text/css'> -->
    <link href="libraries/seven7/stylesheets/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="libraries/seven7/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/jquery/jquery-ui.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/map-index.js"></script>
    <!-- <link href="libraries/seven7/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/se7en-font.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/isotope.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/jquery.fancybox.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/wizard.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/select2.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/morris.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/datatables.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/datepicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/timepicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/colorpicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/bootstrap-editable.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/daterange-picker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/typeahead.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/summernote.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/ladda-themeless.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/social-buttons.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/pygments.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/color/green.css" media="all" rel="alternate stylesheet" title="green-theme" type="text/css" />
    <link href="libraries/seven7/stylesheets/color/orange.css" media="all" rel="alternate stylesheet" title="orange-theme" type="text/css" />
    <link href="libraries/seven7/stylesheets/color/magenta.css" media="all" rel="alternate stylesheet" title="magenta-theme" type="text/css" />
    <link href="libraries/seven7/stylesheets/color/gray.css" media="all" rel="alternate stylesheet" title="gray-theme" type="text/css" />
    <link href="libraries/seven7/stylesheets/jquery.fileupload-ui.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="libraries/seven7/stylesheets/dropzone.css" media="screen" rel="stylesheet" type="text/css" />

    <script src="libraries/seven7/javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/raphael.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/selectivizr-min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/fullcalendar.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/gcal.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/datatable-editable.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/excanvas.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/isotope_extras.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/select2.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/styleswitcher.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/wysiwyg.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/typeahead.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/summernote.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.validate.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/typeahead.js" type="text/javascript"></script>
    <!-- <script src="libraries/seven7/javascripts/spin.min.js" type="text/javascript"></script> -->
    <script src="libraries/seven7/javascripts/ladda.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/moment.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/mockjax.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/bootstrap-editable.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/xeditable-demo-mock.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/xeditable-demo.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/daterange-picker.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/date.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/fitvids.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/dropzone.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/main.js" type="text/javascript"></script>
    <script src="libraries/seven7/javascripts/respond.js" type="text/javascript"></script> -->
    <!-- <script type="text/javascript" src="core/map/mapscript_incase.js"></script> -->
    <script src="libraries/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="libraries/sweetalert/dist/sweetalert.css">
    <style media="screen">
      #map-canvas{
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        background: #000;
        z-index: 1;
      }

      #filter{
        position: absolute;
        width: 350px;
        /*height: 300px;*/
        top: 10px;
        left: 10px;
        /*bottom: 10px;*/
        background: #fff;
        z-index: 999;
        border: solid;
        border-radius: 3px;
        border-width: 1px;
        border-color: #ccc;
        display: none;
        z-index: 997;
        padding-bottom: 30px;
      }

      #filter-btn{
        position: absolute;
        width: 350px;
        top: 10px;
        left: 10px;
        background: #fff;
        z-index: 999;
        border: solid;
        border-radius: 3px;
        border-width: 1px;
        border-color: #ccc;
        z-index: 998;
      }

      #filter-menu{
        position: absolute;
        width: 29px;
        height: 26px;
        top: 55px;
        left: 19px;
        background: url(images/menu.png);
        z-index: 999;
        border: none;
        border-radius: 3px;
        z-index: 999;
        display:none;
      }

      #filter-filter{
        position: absolute;
        width: 47px;
        height: 26px;
        top: 55px;
        left: 39px;
        background: url(images/filters.png);
        z-index: 999;
        border: none;
        border-radius: 3px;
        z-index: 999;
        display:none;
      }
    </style>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>
  <body>
    <div class="shadow-1" id="filter-menu"></div>
    <div class="shadow-1" id="filter-filter"></div>
    <div class="shadow-1" id="filter">
      <?php include "dist/filter.php" ?>
    </div>
    <div class="shadow-1" id="filter-btn" style="padding:0px;">
      <?php include "dist/search-dialog.php" ?>
    </div>
    <div id="map-canvas"></div>
  </body>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAewI1LswH0coZUPDe8Pvy39j4sbxmgCZU&callback=initMap" async defer></script>
</html>
