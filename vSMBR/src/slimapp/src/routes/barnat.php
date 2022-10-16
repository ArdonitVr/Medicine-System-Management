<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//require '../vendor/autoload.php';
//require 'db.php';

$app = new \Slim\App();

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});
// GET All barnat
$app->get('/api/barnat', function (Request $request, Response $response) {
    $sql = 'SELECT * FROM barnat_smbr';
	try{
		//Get db Object
		$db = new db();
		//COnnect 
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$barnat = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($barnat);
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});

// GET Single barna
$app->get('/api/barna/{ID_SMBR}', function (Request $request, Response $response) {
	//To get the barna ID_SMBR create variable
	$ID_SMBR = $request->getAttribute('ID_SMBR');
	
    $sql = "SELECT * FROM barnat_smbr WHERE ID_SMBR = '$ID_SMBR'";
	try{
		//Get db Object
		$db = new db();
		//COnnect 
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$barna = $stmt->fetch(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($barna);
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});


// Add cutomer
$app->post('/api/barna/add', function (Request $request, Response $response) {
	
	$Emri_Barnes_SMBR = $request->getParam('Emri_Barnes_SMBR');
	$ProdhuesiBarnes_SMBR = $request->getParam('ProdhuesiBarnes_SMBR');
	$DataProdhimitBarnes_SMBR = $request->getParam('DataProdhimitBarnes_SMBR');
	$DataSkadimitBarnes_SMBR = $request->getParam('DataSkadimitBarnes_SMBR');
	$CmimiBarnes_SMBR = $request->getParam('CmimiBarnes_SMBR');
	$PershkrimiBarnes_SMBR = $request->getParam('PershkrimiBarnes_SMBR');
	$LlojiBarnes_SMBR = $request->getParam('LlojiBarnes_SMBR');
	
    $sql = "INSERT INTO barnat_smbr (Emri_Barnes_SMBR, ProdhuesiBarnes_SMBR, DataProdhimitBarnes_SMBR, DataSkadimitBarnes_SMBR, CmimiBarnes_SMBR, PershkrimiBarnes_SMBR, LlojiBarnes_SMBR) 
	VALUES(:Emri_Barnes_SMBR, :ProdhuesiBarnes_SMBR, :DataProdhimitBarnes_SMBR, :DataSkadimitBarnes_SMBR, :CmimiBarnes_SMBR, :PershkrimiBarnes_SMBR, :LlojiBarnes_SMBR)";
	try{
		//Get db Object
		$db = new db();
		//COnnect 
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':Emri_Barnes_SMBR',$Emri_Barnes_SMBR);
		$stmt->bindParam(':ProdhuesiBarnes_SMBR',$ProdhuesiBarnes_SMBR);
		$stmt->bindParam(':DataProdhimitBarnes_SMBR',$DataProdhimitBarnes_SMBR);
		$stmt->bindParam(':DataSkadimitBarnes_SMBR',$DataSkadimitBarnes_SMBR);
		$stmt->bindParam(':CmimiBarnes_SMBR',$CmimiBarnes_SMBR);
		$stmt->bindParam(':PershkrimiBarnes_SMBR',$PershkrimiBarnes_SMBR);
		$stmt->bindParam(':LlojiBarnes_SMBR',$LlojiBarnes_SMBR);
		
		$stmt->execute();
		echo'{"notice":{"text":"barna Added"}';
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});




// Update barna
$app->put('/api/barna/update/{ID_SMBR}', function (Request $request, Response $response) {
	//To get the barna ID_SMBR create variable
	$ID_SMBR = $request->getAttribute('ID_SMBR');
	$Emri_Barnes_SMBR = $request->getParam('Emri_Barnes_SMBR');
	$ProdhuesiBarnes_SMBR = $request->getParam('ProdhuesiBarnes_SMBR');
	$DataProdhimitBarnes_SMBR = $request->getParam('DataProdhimitBarnes_SMBR');
	$DataSkadimitBarnes_SMBR = $request->getParam('DataSkadimitBarnes_SMBR');
	$CmimiBarnes_SMBR = $request->getParam('CmimiBarnes_SMBR');
	$PershkrimiBarnes_SMBR = $request->getParam('PershkrimiBarnes_SMBR');
	$LlojiBarnes_SMBR = $request->getParam('LlojiBarnes_SMBR');
    $sql = "UPDATE barnat_smbr SET
	Emri_Barnes_SMBR = :Emri_Barnes_SMBR,
	ProdhuesiBarnes_SMBR = :ProdhuesiBarnes_SMBR,
	DataProdhimitBarnes_SMBR = :DataProdhimitBarnes_SMBR,
	DataSkadimitBarnes_SMBR = :DataSkadimitBarnes_SMBR,
	CmimiBarnes_SMBR = :CmimiBarnes_SMBR,
	PershkrimiBarnes_SMBR = :PershkrimiBarnes_SMBR,
	LlojiBarnes_SMBR = :LlojiBarnes_SMBR
	WHERE ID_SMBR = '$ID_SMBR'";
	try{
		//Get db Object
		$db = new db();
		//COnnect 
		$db=$db->connect();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':Emri_Barnes_SMBR',$Emri_Barnes_SMBR);
		$stmt->bindParam(':ProdhuesiBarnes_SMBR',$ProdhuesiBarnes_SMBR);
		$stmt->bindParam(':DataProdhimitBarnes_SMBR',$DataProdhimitBarnes_SMBR);
		$stmt->bindParam(':DataSkadimitBarnes_SMBR',$DataSkadimitBarnes_SMBR);
		$stmt->bindParam(':CmimiBarnes_SMBR',$CmimiBarnes_SMBR);
		$stmt->bindParam(':PershkrimiBarnes_SMBR',$PershkrimiBarnes_SMBR);
		$stmt->bindParam(':LlojiBarnes_SMBR',$LlojiBarnes_SMBR);
		$stmt->execute();
		echo'{"notice":{"text":"barna Updated"}';
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});


// Delete barna
$app->delete('/api/barna/delete/{ID_SMBR}', function (Request $request, Response $response) {
	//To get the barna ID_SMBR create variable
	$ID_SMBR = $request->getAttribute('ID_SMBR');
	
    $sql = "DELETE FROM barnat_smbr WHERE ID_SMBR = '$ID_SMBR'";
	try{
		//Get db Object
		$db = new db();
		//COnnect 
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->execute();
		echo'{"notice":{"text":"barna Deleted"}';
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});




