
<?php 
	
	$monstersDb = new PDO("sqlite:beasts.db");

	$indexNumLimits = $_GET['indexNum'] ?? '';
	$indexNumParam = addcslashes($indexNumLimits, '_%'). '%';
	
	$monsterNameLimits = $_GET['name'] ?? '';
	$monsterNameParam = addcslashes($monsterNameLimits, '_%'). '%';
	
	$monsterTypeLimits = $_GET['type'] ?? '';
	$monsterTypeParam = addcslashes($monsterTypeLimits, '_%'). '%';
	
	$monsterSizeLimits = $_GET['size'] ?? '';
	$monsterSizeParam = addcslashes($monsterSizeLimits, '_%'). '%';
	
	$monsterBiomeLimits = $_GET['biome'] ?? '';
	$monsterBiomeParam = addcslashes($monsterBiomeLimits, '_%'). '%';

	$query = $monstersDb -> prepare('
			 SELECT indexNum, name, type, size, biome 
			 FROM monsters
			 WHERE 
				indexNum LIKE :indexNum AND
				name LIKE :name AND
				type LIKE :type AND
				size LIKE :size AND
				biome LIKE :biome
			');
	$query -> execute([
		':indexNum' => $indexNumParam,
		':name' => $monsterNameParam,
		':type' => $monsterTypeParam,
		':size' => $monsterSizeParam,
		':biome' => $monsterBiomeParam
	]);
	$monsters = $query->fetchALL(PDO::FETCH_ASSOC);

	$data = json_encode($monsters);
	$dataFile = fopen("data.txt", 'a');

	header('Content-Type: application/json');
	echo $data;

	fwrite($dataFile, $data);
	fclose($dataFile);
?>
