<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:server4scaprj.database.windows.net,1433; Database = ProductsDB", "server4scaprj", "!Sca22Proj");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "server4scaprj", "pwd" => "!Sca22Proj", "Database" => "ProductsDB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:server4scaprj.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

//if connection is successfull, create table and insert records
if ($conn){
$myquery = "IF OBJECT_ID('dbo.ineccenters','U') IS NOT NULL
    	    DROP TABLE dbo.ineccenters
    	    GO
    	    CREATE TABLE dbo.ineccenters (
            id INT NOT NULL   PRIMARY KEY, 
            centername [NVARCHAR](50), 
            centerlocation [NVARCHAR](50),
            centeraddress [NVARCHAR](100),
            centertype [NVARCHAR](50)
            );";
$querythis = sqlsrv_query($conn,$myquery);
if($querythis === false){
    echo 'Error Executing queries - Could not create tables <br/>';
    die (print_r(sqlsrv_errors(),true))

}else{


    $myquery2= "
        INSERT INTO dbo.ineccenters  VALUES (1, 'Ikeja','Mainland','IKEJA INEC OFFICE, 2, OBAFEMI AWOLOWO WAY, IKEJA, LAGOS','Registration'); 
        INSERT INTO dbo.ineccenters  VALUES (2, 'Ogudu','Mainland','KOSOFE INEC OFFICE, 1, MOSHALASI CRESCENT, OGUDU, LAGOS','Registration'); 
        INSERT INTO dbo.ineccenters  VALUES (3, 'Ibeju-Lekki','Island','IBEJU-LEKKI INEC OFFICE, LEKKI FREE TRADE ZONE ROAD','Registration'); 
        INSERT INTO dbo.ineccenters  VALUES (4, 'IKOYI','Island','TAFAWA BALEWA SQUARE, LAGOS ISLAND','Registration'); 
        INSERT INTO dbo.ineccenters  VALUES (5, 'Ikorodu','Mainland','IKORODU INEC OFFICE, TOS BENSON ROAD GRA 1, IKORODU, LAGOS','Registration and Update'); 
        ";
    $querythis = sqlsrv_query($conn,$myquery);
    if($querythis === false){
            echo 'Error Executing queries - Could not Insert Data <br/>';
            die (print_r(sqlsrv_errors(),true))
        
    }



    }
}else{
    echo "No connection Established";
}
    ?>