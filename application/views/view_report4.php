<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ishopdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
/* -------------------------------------------- */

$sql = "SELECT (SELECT (select brand_name from brands WHERE brand_id = products.brand_id) FROM `products` WHERE `product_id` = product_services.product_id) AS name,COUNT(product_id) AS quantity FROM product_services GROUP BY (product_id) DESC LIMIT 5";
$result = $conn->query($sql);
$data = array();

while($row = $result->fetch_assoc()){
	
		$data=array_push_assoc($data, $row["name"], $row["quantity"]);
}
$count = sizeof($data);
//echo $count;
$data2= array_keys($data);
$data3= array_values($data);
$data4 = array();
$i=0;
$j=0;
//print_r(array_keys($data));
while ($i !=$count)
{
	array_push($data4,"{label:'".$data2[$i]."',y:".$data3[$i]."}");
	$i++;
}
//print_r($data4);
function array_push_assoc($array, $key, $value){
$array[$key] = $value;
return $array;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reports</title>

    <!-- Bootstrap core CSS -->

    <link href="{base_url}css/bootstrap.min.css" rel="stylesheet">

    <link href="{base_url}fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="{base_url}css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{base_url}css/custom.css" rel="stylesheet">
    <link href="{base_url}css/icheck/flat/green.css" rel="stylesheet">
    <link href="{base_url}css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

    <script src="{base_url}js/jquery.min.js"></script>

 <script type="text/javascript">
 
var t = setTimeout(function(){
			window.location.reload();
		}, 5000);

window.onload = function () {
	
	var kk = [];
	var aa = <?php echo $count;?>;

	kk.push.apply (kk,[<?php  while ($j<$count){echo $data4[$j].",";$j++;} ?>]);

	var chart = new CanvasJS.Chart("chartContainer",
	{
		animationEnabled: true,
		title:{
			text: "Top Services Brands"
		},
		data: [
		
		{
			type: "column", //change type to bar, line, area, pie, etc
		
		dataPoints: 		kk
				
			
		}
		]
		});

	chart.render();
}
</script>
<script type="text/javascript" src="{base_url}js/canvasjs.min.js"></script>


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
								Reports
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
									<div  id="chartContainer" style="height: 300px; width: 100%;"></div>
                    
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