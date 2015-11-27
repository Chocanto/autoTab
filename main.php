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

function main() {
	simpleTab();
	matrixTab();
}

main();