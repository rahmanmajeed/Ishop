<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product  Details </title>

    <!-- Bootstrap core CSS -->

    <link href="{base_url}css/bootstrap.min.css" rel="stylesheet">

    <link href="{base_url}fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="{base_url}css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{base_url}css/custom.css" rel="stylesheet">
    <link href="{base_url}css/icheck/flat/green.css" rel="stylesheet">


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
                        <a href="http://localhost/ishop/index/home" class="site_title"><i class="fa fa-paw"></i> <span>MENU</span></a>
                    </div>
                    <div class="clearfix"></div>


              

                    <br />

                   <!-- sidebar menu -->
                 
                       <?php include("view_admin_menu.php");?>
                       <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                           
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-search"></i>Search by Category <span class="fa fa-chevron-down"></span></a>
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
								
								<li><a href="http://localhost/ishop/login/logout"><i class="glyphicon glyphicon-off"></i> Logout </a>
				<ul class="nav child_menu" style="display: none"></ul>
					
					
				
			</li>
          
                                
                        </div>

                    </div>

                  
                    <!-- /sidebar menu -->


                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo $this->session->userdata("name")?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    
                                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
  
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              
                                <div class="x_content">
                                
									
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <div class="product-image">
                                        
                                            <img src="{base_url}image/{image_location}" alt="..." />
                                            
                                        </div>
                                        
                                      
                                    </div>

                                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                                        <h3 class="prod_title">{product_name}</h3>

                                        <p>{description}</p>
                                        <br />

                                
                                        <br />
										<?php if($quantity == 0){ ?>
                                        <div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>OUT OF STOCK</strong> </div>
                                        <?php }?>
                                 
                                        <br />

                                        <div class="">
                                            <div class="product_price">
                                                <h1 class="price">{sell_price} BDT</h1>
                                               
                                                <br>
                                            </div>
                                        </div>
										<?php if($quantity != 0){ ?>
                                        <div class="">
                                            <a  class="btn btn-default btn-lg" href="http://localhost/ishop/index/addCart/{product_id}">Add to Cart</a>

                                        </div>
                                        <?php } ?>

                                      

                                    </div>


                                    
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">Gentelella Alela! a Bootstrap 3 template by <a>Kimlabs</a>. |
                            <span class="lead"> <i class="fa fa-paw"></i> Gentelella Alela!</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

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