<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update Profile</title>

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
            </div>



            <!-- page content -->
         <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                   Update Profile
                </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              
                                <div class="x_content">

                                    <form class="form-horizontal form-label-left" novalidate method="post" >

                                     
                                        
                                       

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="name"  required="required" type="text" value="{name}" >
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" id="email" name="email" required class="form-control col-md-7 col-xs-12" value="{email}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm Email <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" id="email2" name="confirm_email" data-validate-linked="email" required class="form-control col-md-7 col-xs-12" value="{email}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Phone Number <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="number" name="phone" required  class="form-control col-md-7 col-xs-12" value="{phone}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea id="address" required name="address" class="form-control col-md-7 col-xs-12">{address}</textarea>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                
                                                <input id="send" name='buttonUpdate' type="submit" class="btn btn-success" value="Update">
                                            </div>
                                        </div>
                                    </form>
									{message}

                                </div>
                            </div>
                        </div>
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
    <!-- form validation -->
    <script src="{base_url}js/validator/validator.js"></script>
    <script>
        // initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
            .on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });

        /* FOR DEMO ONLY */
        $('#vfields').change(function () {
            $('form').toggleClass('mode2');
        }).prop('checked', false);

        $('#alerts').change(function () {
            validator.defaults.alerts = (this.checked) ? false : true;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>

</body>

</html>