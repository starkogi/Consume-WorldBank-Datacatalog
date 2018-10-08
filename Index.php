	<?php 
		$user = "";
		session_start();
		// Store Session Data
		$_SESSION['user']= $user;  // Initializing Session with value of PHP Variable
	?>

	<html>
	<head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<link rel="stylesheet" href="css/kogi.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link type="favicon" href="images/logo.png"/>
		<title>BackUp Manager</title>
	</head>
	<body class="jumbotron">
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					 http://api.worldbank.org/v2/datacatalog
				</div>
				<div class="panel-body">
					<form action="/action_page.php">
						<div class="form-group">
						<p>
							Use this page to consume World Bank Datacatalog (api v2)
						</p>		
						<p>
							<button id="btn_initDB" type="button" class="btn btn-primary btn-sm ">Clear Local Database</button>
							<button id="btn_batch" type="button" class="btn btn-primary btn-sm ">Get Catalog Data</button>

							<br>

							<ul class="list-group">

                            <li class="list-group-item">

									<div class="row">
										<div class="col-md-2">
												<button id="btn_download_data" type="button" class="btn btn-primary btn-xs ">Data Downloaded</button>
											</div>
											<div class="col-md-10">
											<div class="progress">
											  <div id="pg_downloaded_data" class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">	0%
											  </div>
											</div>
										</div>
									</div>								  	
								</li>
							</ul>
						</p>

                        </div>
					</form>


                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-8">
                                    Search Catalog
                                </div>
                                <div class="col-md-4 pull-right">
                                    <div id="custom-search-input">
                                        <div class="input-group col-md-12">
                                            <input id="search" type="text" class="form-control input-sm" placeholder="Search" />
                                            <span class="input-group-btn">
                                            <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="panel-body">

                            <style>
                                body {
                                    margin: 30px;
                                    background-color: #E9E9E9;
                                }

                                div.polaroid {
                                    width: 284px;
                                    padding: 5px 5px 5px 5px;
                                    border: 1px solid #BFBFBF;
                                    background-color: white;
                                    box-shadow: 3px 3px 3px #aaaaaa;
                                }

                                div.rotate_right {
                                    float: left;
                                    -ms-transform: rotate(3deg); /* IE 9 */
                                    -webkit-transform: rotate(3deg); /* Safari */
                                    transform: rotate(3deg);
                                }

                                div.rotate_left {
                                    float: left;
                                    -ms-transform: rotate(-3deg); /* IE 9 */
                                    -webkit-transform: rotate(-3deg); /* Safari */
                                    transform: rotate(-3deg);
                                }
                            </style>

<!--                           <div class="container">-->
<!--                               <div class="col-md-7">-->
<!--                                   <div class="row">-->
<!--                                       <div class="polaroid rotate_right">-->
<!--                                           <p class="text-primary"><b>Topics</b></p>-->
<!---->
<!--                                           <p  style="font-size: 15px" class="caption">-->
<!--                                               "Agriculture & Rural Development, Aid Effectiveness, Climate Change, Economy & Growth, Education, Energy & Mining, Environment, External Debt, Financial Sector, Gender, Health, Infrastructure, Labor & Social Protection, Poverty, Private Sector, Public Sector, Science & Technology, Social Development, Trade, Urban Development"-->
<!--                                           </p>-->
<!--                                       </div>-->
<!---->
<!--                                       <div class="polaroid rotate_left" style="overflow: hidden">-->
<!--                                           <p class="text-primary"><b> Meta </b></p>-->
<!---->
<!--                                           <p  style="font-size: 15px">-->
<!--                                               coverage : 1960 - 2016 <br>-->
<!--                                               popularity : 43587 <br>-->
<!--                                               bulkdownload : WDI (Excel)-ZIP (59 MB)=http://databank.worldbank.org/data/download/WDI_excel.zip=excel;WDI (CSV)-ZIP (57 MB)=http://databank.worldbank.org/data/download/WDI_csv.zip=csv;Information about WDI revisions (Excel) (912 KB)=http://databank.worldbank.org/data/download/WDIrevisions.xls=excel <br>-->
<!---->
<!--                                           </p>-->
<!--                                       </div>-->
<!--                                   </div>-->
<!---->
<!--                                   <div class="row">-->
<!---->
<!---->
<!--                                       <div class="polaroid rotate_left">-->
<!--                                           <p class="text-primary"><b> Detailed Page </b></p>-->
<!---->
<!--                                           <p  style="font-size: 15px">-->
<!--                                               <a href="http://data.worldbank.org/data-catalog/world-development-indicators" class="btn btn-sm btn-primary">To Detailed Page</a>-->
<!--                                           </p>-->
<!--                                       </div>-->
<!---->
<!--                                       <div class="polaroid rotate_right">-->
<!--                                           <p class="text-primary"><b>Key</b></p>-->
<!---->
<!--                                           <p  style="font-size: 15px" class="caption">The pulpit rock in Lysefjorden, Norway-->
<!--                                               Monterosso al Mare. One of the five villages in Cinque Terre, Italy-->
<!--                                               Monterosso al Mare. One of the five villages in Cinque Terre, Italy-->
<!--                                               Monterosso al Mare. One of the five villages in Cinque Terre, Italy.</p>-->
<!--                                       </div>-->
<!--                                   </div>-->
<!---->
<!--                               </div>-->
<!---->
<!--                               <div class="col-md-5">-->
<!--                                   <div class="container container-fluid ">-->
<!--                                       <h3>Catalog ID : 1</h3>-->
<!--                                       <h4 class="text-primary">Meta Data</h4>-->
<!--                                       <p style="font-size: 15px">-->
<!--                                           <strong>World Development Indicators ( WDI )</strong>-->
<!--                                       </p>-->
<!--                                       <p style="font-size: 15px">-->
<!--                                           The primary World Bank collection of development indicators, compiled from officially-recognized international sources. It presents the most current and accurate global development data available, and includes national, regional and global estimates.-->
<!--                                       </p>-->
<!--                                       <p style="font-size: 15px; color: blue;">Contacts : data@worldbank.org</p>-->
<!--                                       <a href="http://databank.worldbank.org/data/views/variableSelection/selectvariables.aspx?source=world-development-indicators" class="btn btn-primary">more >></a>-->
<!--                                   </div>-->
<!--                               </div>-->
<!---->
<!--                               <div class="col-md-12" style="background: blue; height: 2px ; margin-top: 30px">-->
<!--                               </div>-->
<!---->
<!--                           </div>-->
                            <div id="tbody">

                            </div>
                        </div>
                    </div>

				</div>
			</div>
		</div>

		 <div id="loadingElement" class="loader collapse">
	        <img src="images/loader.gif" />
	        <p class="loaderText" style="color: white">Please wait...</p>
	    </div>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>

        <script src="js/jquery-1.12.4.js"></script>
        <script src="js/jquery-ui.js"></script>

	</body>
	</html>

	<script type="text/javascript">



        $("#search").autocomplete({

            source: function (request, response) {
                $.ajax({
                    url: "Utils/api/catalogs.php?",
                    dataType: "json",
                    data: { search: $("#search").val()},
                    success: function (data) {
                        $('#tbody').html("");

                        $.each( data, function( key, value ) {
                            console.log(value);

                            var data = "                           <div class=\"container\">\n" +
                                "                               <div class=\"col-md-7\">\n" +
                                "                                   <div class=\"row\">\n" +
                                "                                       <div class=\"polaroid rotate_right\">\n" +
                                "                                           <p class=\"text-primary\"><b>Topics</b></p>\n" +
                                "\n" +
                                "                                           <p  style=\"font-size: 15px\" class=\"caption\">\n" +
                                value.find(x => x.key === 'topics')['value'] +
                                "                                           </p>\n" +
                                "                                       </div>\n" +
                                "\n" +
                                "                                       <div class=\"polaroid rotate_left\" style=\"overflow: hidden\">\n" +
                                "                                           <p class=\"text-primary\"><b> Meta </b></p>\n" +
                                "\n" +
                                "                                           <p  style=\"font-size: 15px\">\n" +
                                "                                               coverage : " + value.find(x => x.key === 'coverage')['value'] + " <br>\n" +
                                "                                               popularity : " +value.find(x => x.key === 'popularity')['value']+ " <br>\n" +
                                "                                               bulkdownload : " + value.find(x => x.key === 'bulkdownload')['value'] + " <br>\n" +
                                "\n" +
                                "                                           </p>\n" +
                                "                                       </div>\n" +
                                "                                   </div>\n" +
                                "\n" +
                                "                                   <div class=\"row\">\n" +
                                "\n" +
                                "\n" +
                                "                                       <div class=\"polaroid rotate_left\">\n" +
                                "                                           <p class=\"text-primary\"><b> Detailed Page </b></p>\n" +
                                "\n" +
                                "                                           <p  style=\"font-size: 15px\">\n" +
                                "                                               <a href=\""+value.find(x => x.key === 'url')['value']+"\" class=\"btn btn-sm btn-primary\">To Detailed Page</a>\n" +
                                "                                           </p>\n" +
                                "                                       </div>\n" +
                                "\n" +
                                "                                       <div style=\"overflow:auto\" class=\"polaroid rotate_right\">\n" +
                                "                                           <p class=\"text-primary\"><b>Key</b></p>\n" +
                                "\n" +
                                "                                           <p  style=\"font-size: 15px\" class=\"caption\">" +value.find(x => x.key === 'bulkdownload')['value']+ "" +
                                "                                       </div>\n" +
                                "                                   </div>\n" +
                                "\n" +
                                "                               </div>\n" +
                                "\n" +
                                "                               <div class=\"col-md-5\">\n" +
                                "                                   <div class=\"container container-fluid \">\n" +
                                "                                       <h3>Catalog ID : " + value[0].DataCatalogId + "</h3>\n" +
                                "                                       <h4 class=\"text-primary\">Meta Data</h4>\n" +
                                "                                       <p style=\"font-size: 15px\">\n" +
                                "                                           <strong>" + value.find(x => x.key === 'name')['value'] + "</strong>\n" +
                                "                                       </p>\n" +
                                "                                       <p style=\"font-size: 15px\">\n" +
                                "                                           "  +  value.find(x => x.key === 'description')['value'] +  "" +
                                "                                       </p>\n" +
                                "                                       <p style=\"font-size: 15px; color: blue;\">Contacts : " + value.find(x => x.key === 'contactdetails')['value'] +"</p>\n" +
                                "                                       <a href=\"http://databank.worldbank.org/data/views/variableSelection/selectvariables.aspx?source=world-development-indicators\" class=\"btn btn-primary\">more >></a>\n" +
                                "                                   </div>\n" +
                                "                               </div>\n" +
                                "\n" +
                                "                               <div class=\"col-md-12\" style=\"background: blue; height: 2px ; margin-top: 30px\">\n" +
                                "                               </div>\n" +
                                "\n" +
                                "                           </div>\n";
                            $('#tbody').append(data);
                        });
                    }
                });
            },
            error: function (xmlhttprequest, textstatus, errorthrown) {
                alert("An Error Occured, try again later");
            },
            minLength: 1,
            select: function (event, ui) {
                var CatalogId = ui.item.value;
            }
        });


        $("#btn_initDB").click(function(){
            initDB();
        });

        $("#btn_batch").click(function(){
            startDownload(1, 0);
        });

        function initDB(){

            $('.loader').fadeIn();
            $('.loaderText').text('Initializing Database');
            $('.progress-bar').addClass('progress-bar-animated');

            $.get("Utils/initialize_db.php",
                {
                },
                function(data, status){
                    data = JSON.parse(data);
                    $('.loader').fadeOut();

                    if(data.Status == 1){

                        alert("Successfully Recreated");
                        $('.progress-bar').removeClass('progress-bar-animated');
                        $('.progress-bar').text("0%");
                        $('.progress-bar').css('width', 0+'%').attr('aria-valuenow', 0);

                    }else{
                        alert('An Error Occured');
                    }
            });
		}

		//Declare initial page

		function startDownload($page, $totalpages){
            console.log($page);

			$('.loader').fadeIn();

			if($totalpages == 0){
				$('.loaderText').text('Downloading Page ' + $page);
			}else{
				$('.loaderText').text('Downloading Page ' + $page + " of " + $totalpages);
			}

			$('#pg_downloaded_data').addClass('progress-bar-animated');

			$.get("Utils/api_consumer.php/",
		    {
                page: $page,
		    },
		    function(data, status){
				console.log(data);
				$('.loader').fadeOut();

				if(status == 'success'){
                    data = JSON.parse(data);
                    $('#pg_downloaded_data').removeClass('progress-bar-animated');
                    $('#pg_downloaded_data').css('width', data.Progress+'%').attr('aria-valuenow', data.Progress);
                    $('#pg_downloaded_data').text(data.Progress+'%');

                    if(data.totalpages > data.page){
                        startDownload(data.page + 1, data.totalpages);
                    }
				}else {
                    alert("An Error Occured");
                }


		    });
		}

	</script>