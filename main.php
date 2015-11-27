<?php

require_once('Table.php');
require_once('Header.php');
require_once('Row.php');
require_once('Cell.php');

/**
* Tableau simplement rempli à la main
*/
function simpleTab() {
	$table = new Table('Mon super tableau !');
	$table->addHeadersStr(array(
		'Nom',
		'Prenom',
		'Date de naissance',
		'Chauve ?'
	));

	//Exemple pour ajouter une ligne rapidement
	$table->addRowStr(array(
		'Jean',
		'Jacque',
		'00/00/0000',
		'Yup !'
	));

	//Exemple d'ajout d'une ligne personnalisée
	$row = new Row();

	//Exemple de création d'une cellule personnalisée
	$cellSpec = new Cell('Jean Pierre');
	$cellSpec->setColspan(2);
	$cellSpec->addCssClass('specialCls');
	$row->addCell($cellSpec);

	$row->addCell(new Cell('11/11/1111'));
	$row->addCell(new Cell('Nop !'));

	$table->addRow($row);

	//Rendu du tableau
	$table->render();
}

/**
* Tableau rempli par une matrice
*/
function matrixTab() {
	$table = new Table('Tableau rempli avec matrice');

	$table->addHeadersStr(array(
		'Animal',
		'Spécimen',
		'Couleur',
		'Population'
	));

	$table->addMatrix(array(
		array('Berger allemand', 'Chien', 'Vert', '12'),
		array('Sauvage', 'Chat', 'Bleu', '48'),
		array('Perroquet', 'Poisson', 'Magenta', '0')
	));

	$table->render();
}

/**
* Tableau rempli à partir de la base bibliothèque
**/
function fromDbTab() {
	//Récupère les données de la BD
	try {
		$conn = new PDO('mysql:dbname=bibliotheque;host=127.0.0.1;charset=utf8', 'root', '');
	} catch (PDOException $e) {
		echo 'Connexion impossible : ' . $e->getMessage();
		return;
	}

	if ( ! $stmt = $conn->query('SELECT * FROM auteur')) {
		die(var_export($conn->errorinfo(), TRUE));
	}

	//Lance la création du tableau
	$table = new Table('Liste des auteurs');

	$table->addHeadersStr(array(
		'Id',
		'Nom',
		'Prénom',
		'Année de naissance'
	));

	foreach ($stmt as $data) {
		$table->addRowStr(array(
			$data['id_auteur'],
			$data['nom'],
			$data['prenom'],
			$data['date_naissance']
		));
	}

	$table->render();

}

function main() {
	simpleTab();
	matrixTab();
	fromDbTab();
}

main();