<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .hidden {
            display: none;
        }

        #cardForm {
            transition: background-color 0.3s ease;
        }

        .disabled-tab {
            pointer-events: none;
            cursor: not-allowed;
        }

        #tableExport {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
            /* Set default font size */
        }

        #tableExport th,
        #tableExport td {
            padding: 0.5px;
            border: 0.1px solid #e3e3e3;
        }

        /* Specific styling for smaller font size */
        #tableExport .small-font {
            font-size: 8px;
            /* Adjust font size as needed */
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: left !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            justify-content: flex-start !important;
        }
    </style>

    <?php
    if (isset($links)) {
        foreach ($links as $link) {
            echo $link;
        }
    }

    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">