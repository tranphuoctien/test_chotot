<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" ng-app="chotot">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
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

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
        .chotot_thumbnail {
            float: right;
            margin-left: 14px;
            position: relative;
            -webkit-transition: 1s linear;
            /*to only change opacity*/
            /*-webkit-transition: opacity 1s linear*/
            -moz-transition: 1s linear;
            -o-transition: 1s linear;
            transition: 1s linear;
        }

        .animate-enter,
        .animate-leave
        {
            -webkit-transition: 400ms cubic-bezier(0.250, 0.250, 0.750, 0.750) all;
            -moz-transition: 400ms cubic-bezier(0.250, 0.250, 0.750, 0.750) all;
            -ms-transition: 400ms cubic-bezier(0.250, 0.250, 0.750, 0.750) all;
            -o-transition: 400ms cubic-bezier(0.250, 0.250, 0.750, 0.750) all;
            transition: 400ms cubic-bezier(0.250, 0.250, 0.750, 0.750) all;
            position: relative;
            display: block;
        }

        .animate-enter.animate-enter-active,
        .animate-leave {
            opacity: 1;
            bottom: 0;
            height: 30px;
        }
        body{
            height: 140%;
        }*/
        .container{
            width: 100%;
            height: 80%;
        }
        .left{
            float: left;
            height: 100%;
            width: 50%;
            padding: 30px;
            box-sizing: border-box;
            background-color: hsl(0, 20%, 50%);
        }
        .right{
            float: left;
            height: 100%;
            width: 50%;
            padding: 30px;
            box-sizing: border-box;
            background-color: hsl(120, 20%, 50%);
        }
        .repeater{
            background-color: cyan;
            height: 30px;
            margin-bottom: 20px;
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
    <button ng-click="eventRefresh()">Refesh</button>

    <!--<div ng-init="getResult();opts={}" class="sortable-container grid" sv-root sv-part="listing_thumbnails">
        <div ng-repeat="item in listing_thumbnails" sv-element="opts" class="well">
            <img class="grid"  ng-src="{{item}}">
            <span sv-handle>handle</span>
        </div>
    </div>-->

    <!--<ul ng-init="getResult();opts={}" style="list-style: none" sv-root sv-part="listing_thumbnails">
        <li class="thumb_chotot" ng-repeat="chotot_thumb in listing_thumbnails" sv-element">
            <a href="#" class="chotot_thumbnail" >
                <img sv-handle width="135px" height="135px" class="thumbnail" title="{{chotot_thumb}}" ng-src="{{chotot_thumb}}">
            </a>
        </li>
    </ul>-->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.8/angular-cookies.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.15/angular-ui-router.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.8/angular-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.14.3/ui-bootstrap-tpls.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dropdrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/init.js"></script>
</html>