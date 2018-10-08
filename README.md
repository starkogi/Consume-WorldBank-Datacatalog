# Consume-WorldBank-Datacatalog
Consume WorldBank Datacatalog


NOTE: the application was tested on apache server php v7...

Instructions:
1) Run the MSSQL SQL Scripts located in the main directory ( PowerGen.sql ) 
Using SSMS run the SQL Scripts to setup the the Database (File found in the main directory PowerGen.sql) 4) 

2) Install PHP Divers for MSSQL 

	To use Php with MS SQL you will need to install Microsoft Drivers for PHP for SQL Server; This will depend on your php version;
    Use this link to download the Drivers 'https://www.microsoft.com/en-us/download/details.aspx?id=20098'
    Use this link for More Details 'https://www.youtube.com/watch?v=hxfdbnpOqSI'
	
3)  Now navigate to "http://localhost:8080/PowerGen/ " Remember to change the port
4)Use the "Get Catalog Data" Button to consume the api and persist in the MSSQL Database
5) Now you can serch and get a GUI to the data on search catalog Modal