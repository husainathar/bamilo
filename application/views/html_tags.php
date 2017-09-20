<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
<head>


    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- Important stuff for SEO, don't neglect. (And don't dupicate values across your site!) -->
    <title>Shop | Bamilo</title>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- concatenate and minify for production -->
    <link rel="stylesheet" href="<?=base_url();?>css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?=base_url();?>css/bootstrap.css" type="text/css" media="all" />

    <link rel="stylesheet" href="<?=base_url();?>css/magnific-popup.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?=base_url();?>css/icon-fonts.css" type="text/css" media="all" />


    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <style type="text/css">
        .nav a, .nav label {
            display: block;
            padding: .85rem;
            color: #fff;
            background-color: #151515;
            box-shadow: inset 0 -1px #1d1d1d;
            -webkit-transition: all .25s ease-in;
            transition: all .25s ease-in;
        }

        .nav a:focus, .nav a:hover, .nav label:focus, .nav label:hover {
            color: rgba(255, 255, 255, 0.5);
            background: #030303;
        }

        .nav label { cursor: pointer; }

        /**
         * Styling first level lists items
         */

        .group-list a, .group-list label {
            padding-left: 2rem;
            background: #252525;
            box-shadow: inset 0 -1px #373737;
        }

        .group-list a:focus, .group-list a:hover, .group-list label:focus, .group-list label:hover { background: #131313; }

        /**
         * Styling second level list items
         */

        .sub-group-list a, .sub-group-list label {
            padding-left: 4rem;
            background: #353535;
            box-shadow: inset 0 -1px #474747;
        }

        .sub-group-list a:focus, .sub-group-list a:hover, .sub-group-list label:focus, .sub-group-list label:hover { background: #232323; }

        /**
         * Styling third level list items
         */

        .sub-sub-group-list a, .sub-sub-group-list label {
            padding-left: 6rem;
            background: #454545;
            box-shadow: inset 0 -1px #575757;
        }

        .sub-sub-group-list a:focus, .sub-sub-group-list a:hover, .sub-sub-group-list label:focus, .sub-sub-group-list label:hover { background: #333333; }

        /**
         * Hide nested lists
         */

        .group-list, .sub-group-list, .sub-sub-group-list {
            height: 100%;
            max-height: 0;
            overflow: hidden;
            -webkit-transition: max-height .5s ease-in-out;
            transition: max-height .5s ease-in-out;
        }

        .nav__list input[type=checkbox]:checked + label + ul { /* reset the height when checkbox is checked */
            max-height: 1000px; }

        /**
         * Rotating chevron icon
         */

        label > span {
            float: right;
            -webkit-transition: -webkit-transform .65s ease;
            transition: transform .65s ease;
        }

        .nav__list input[type=checkbox]:checked + label > span {
            -webkit-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            transform: rotate(90deg);
        }
    </style>
    <script>
        var appUrl = "<?=base_url();?>";
    </script>
</head>