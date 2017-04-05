<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User </title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <link href="css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>

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
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>MENU</span></a>
                    </div>
                    <div class="clearfix"></div>



                    <br />

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


                </div>
            </div>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                        User
                    
                </h3>
                <small>
                        <a href="#">Create New</a>
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

                                                <th>User Id</th>
                                                <th>User Name</th>
                                                <th>Password</th>
                                                <th>Type</th>
                                                <th>Status </th>
                                                <th>Last Login</th>
                                                <th> </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           
                                      
                                            <tr>
 
                                                <td class=" ">121000038</td>
                                                <td class=" ">May 24, 2014 10:55:33 PM</td>
                                                <td class=" ">      </td>
                                                 <td class=" "></td>
                                                <td class=" "></td>
                                                <td class=" "></td>
                                                 <td class=" last"><a href="#">Edit</a>
                                                
                                            </tr>      
                                            <td class=" ">121000037</td>
                                                <td class=" ">May 24, 2014 10:52:44 PM</td>
                                                <td class=" ">121000204</td>
                                                 <td class=" "></td>
                                                <td class=" "></td>
                                                <td class=" "></td>
                                                <td class=" last"><a href="#">Edit</a>


                                            </tr>
                                                <td class=" ">121000040</td>
                                                <td class=" ">May 24, 2014 11:47:56 PM </td>
                                                <td class=" ">121000210</td>
                                                <td class=" "></td>
                                                <td class=" "></td>
                                                <td class=" "></td>
                                                <td class=" last"><a href="#">Edit</a>

                                                </td>
                                            
                                            </tr>
                                            
                                        </tbody>

                                    </table>
                                </div>
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

        <script src="js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>



</body>

</html>