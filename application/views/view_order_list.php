<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cart List </title>

    <!-- Bootstrap core CSS -->

    <link href="{base_url}css/bootstrap.min.css" rel="stylesheet">

    <link href="{base_url}fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="{base_url}css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{base_url}css/custom.css" rel="stylesheet">
    <link href="{base_url}css/icheck/flat/green.css" rel="stylesheet">
    <link href="{base_url}css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

    <script src="{base_url}js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="http://localhost/ishop/index/home" class="site_title"><i class="fa fa-paw"></i> <span>Home</span></a>
                    </div>
                    <div class="clearfix"></div>



                    <br />
               <!-- sidebar menu -->
					<?php include("view_user_menu.php"); ?>
					 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                           
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-search"></i> Search by Category <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
									{categorie}
                                        <li><a href="http://localhost/ishop/index/searchByCategory/{cat_id}">{cat_name}</a>
                                        </li>
									{/categorie}
									

	
                                    </ul>
                                </li>
       
                                <li><a><i class="fa fa-search"></i>Search by Brand <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
									{brand}
                                        <li><a href="http://localhost/ishop/index/searchByBrand/{brand_id}">{brand_name}</a>
                                        </li>
									{/brand}

	
                                    </ul>
                                </li> 
                        </div>

                    </div>
					
                    <!-- /sidebar menu -->
   


                </div>
            </div>


            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
								Cart List
                </h3>
                <small>
        
                    </small>
                        </div>


                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
     
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
									
                                        <thead>
                                            <tr class="headings">

                                                <th>Order Id</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                
                                                <th> </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           
											{orders}
                                            <tr>
 
                                                <td class=" ">{order_id}</td>
                                                <td class=" ">{name}</td>
                                                <td class=" ">{order_price}</td>
                                                 <td class=" last"><a href="{base_url}index/removeOrder/{order_id}">Remove</a>
                                                
                                            </tr>      
                                            
                                            {/orders}
                                        </tbody>

                                    </table>
                                </div>
                                <h2>Grand Total: {totalSum} BDT</h2>
                                    <a  class="btn btn-primary pull-right" href="{base_url}index/confirmOrder/{orderer_id}">Confirm</a>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                    </div>
                </div>
                  
                    
                </div>
                <!-- /page content -->
            </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="{base_url}js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="{base_url}js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="{base_url}js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="{base_url}js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="{base_url}js/icheck/icheck.min.js"></script>

        <script src="{base_url}js/custom.js"></script>



</body>

</html>