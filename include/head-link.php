    <!-- Mirrored from themesbrand.com/minible/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:14:34 GMT -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $pageTitle ?> | Gestion Des Taches</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon1.ico">


        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/datatables.min.css">

        <link href="./assets/css/style.css" rel="stylesheet" />

        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/css/jquery-ui.css">

        <style>
            .checkactive input[type=checkbox] {
                /* Opera */
                padding-left: 30px;
                padding-right: 30px;
                height: 5vh;
            }

            .checkactive input[type=checkbox]:checked {
                background-color: #02e04c;
                border-color: #02e04c;
            }

            .paging-nav {
                text-align: right;
                padding-top: 2px;
            }

            .paging-nav a {
                margin: auto 1px;
                text-decoration: none;
                display: inline-block;
                padding: 1px 7px;
                background: #91b9e6;
                color: white;
                border-radius: 3px;
            }

            .paging-nav .selected-page {
                background: #187ed5;
                font-weight: bold;
            }

            .paging-nav,
            #tableData {
                width: 400px;
                margin: 0 auto;
                font-family: Arial, sans-serif;
            }
            /* for live search */

            .header {
                display: flex;
            }

            .header p {
                flex: 1;
                font-weight: bold;
            }

            .results {
                display: flex;
            }

            .results p {
                flex: 1;
            }
            /* -------------------------------------multi nsert invoice design-------------------------------*/
            .table-wrapper {
		width: 100%;
		margin:auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
    float: right;
		height: 30px;
		font-weight: bold;
		font-size: 12px;
		text-shadow: none;
		min-width: 100px;
		border-radius: 50px;
		line-height: 13px;
    }
	.table-title .add-new i {
		margin-right: 4px;
	}
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td     {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
	table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table td a.add i {
        font-size: 24px;
    	margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
	table.table .form-control.error {
		border-color: #f50000;
	}
	table.table td .add {
		display: none;
	}
        </style>


    </head>