<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" ng-app="chotot">
<head>
    <meta charset="utf-8">
    <title>Test Chợ tốt</title>
    <!-- Latest compiled and minified CSS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style type="text/css">

        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }
        p.footer {
            text-align: right;
            font-size: 11px;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }
        .repeater span{
            background-color: white;
        }

        html{
            min-height: 100%;
        }
        body{
            padding: 20px 50px;
            min-height: 100%;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        h1{
            margin-bottom: 50px;
        }
        .sortable-container{
            overflow: auto;
            padding: 10px 50px;
        }
        .well{
            padding:0;
        }
        .multi-sortable{
            height: 400px;
        }
        .grid{
            float: left;
        }
        .sortable-container.grid{
            width: 100%;
        }
    </style>
</head>
<body ng-controller="MainController as Main">
<div class="row">
    <div ng-init="getResult();opts={}" class="sortable-container grid" sv-root sv-part="listing_thumbnails">
        <div ng-repeat="item in listing_thumbnails track by $index" sv-element="opts" class="well grid"  ng-drag="true">
            <img sv-handle width="135px" height="135px" title="{{item}}" ng-src="{{item}}">
        </div>
    </div>
</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong>
    seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
</p>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.8/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dropdrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/init.js"></script>
</html>