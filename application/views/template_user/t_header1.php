<!DOCTYPE html>
<html>
<head>
	<title><?php echo $JudulWeb;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/rfm.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables-1.10.16/media/css/jquery.dataTables.css"/>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables-1.10.16/media/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables-1.10.16/media/js/jquery.dataTables.js"></script>
	<style>
		@font-face {font-family: "Raleway";font-style: normal;font-weight: 400;src: url('<?php echo base_url(); ?>assets/font/Raleway-Regular.ttf') format('truetype')}
		body, h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
		body, html {
		    height: 100%;
		    color: #777;
		    line-height: 1.8;
		}
		div.dataTables_length, div.dataTables_filter {
	        padding-bottom: 0.55em;
	    }
	    div.dataTables_paginate {
	        margin-top: 0.55em;
	    }
	    table.dataTable thead th,
	    table.dataTable.no-footer {
		  border-bottom: 1px solid #ccc;
		}
		/* Create a Parallax Effect */
		.bgimg-1, .bgimg-2{
		    background-attachment: fixed;
		    background-position: center;
		    background-repeat: no-repeat;
		    background-size: cover;
		}
		/* First image (Logo. Full height) */
		.bgimg-1 {
		    background-image: url('<?php echo base_url(); ?>assets/image/slide1.jpg');
		    min-height: 100%;
		}
		.bgimg-2 {
		    background-image: url('<?php echo base_url(); ?>assets/image/slide2.jpg');
		    min-height: 100%;
		}
		.rfm-wide {letter-spacing: 10px;}
		.rfm-hover-opacity {cursor: pointer;}

		/* Turn off parallax scrolling for tablets and phones */
		@media only screen and (max-device-width: 1024px) {
		    .bgimg-1, .bgimg-2{
		        background-attachment: scroll;
		    }
		}
		.mySlides {display: none}
	</style>
	
</head>

<body class="rfm-light-grey">