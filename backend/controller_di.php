<?php
/*
// ___________ MIDDLEWARE ___________________________________________________________________________________________
$container ['httpAuthentication'] = function ($c) {
	$auth = new HttpAuthentication ( $c ['utilisateurService'] );
	return $auth;
};

// ___________ CONTROLLER ___________________________________________________________________________________________
$container ['indicateurController'] = function ($c) {
	$temps = new IndicateurController ( $c ['indicateurCalculator'], $c ['indicateurService'] );
	$temps->register ();
	return $temps;
};

$container ['articleController'] = function ($c) {
	$temps = new ArticleController ( $c ['articleService'], $c ['referenceDataService'], $c ['commandeService'] );
	$temps->register ();
	return $temps;
};

$container ['referenceDataController'] = function ($c) {
	$ctrl = new ReferenceDataController ( $c ['selectListServiceFactory'], $c ['referenceDataService'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['commandeController'] = function ($c) {
	$ctrl = new CommandeController ( $c ['commandeService'], $c ['bonPreparationService'], $c ['preparationService'], $c ['syntheseService'], $c ['crmService'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['bonPreparationController'] = function ($c) {
	$ctrl = new BonPreparationController ( $c ['bonPreparationService'], $c ['commandeService'], $c ['typeColisageService'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['facturationController'] = function ($c) {
	$ctrl = new FacturationController ( $c ['facturationService'], $c ['selectListServiceFactory'], $c ['grilleTarifaireService'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['exportController'] = function ($c) {
	$ctrl = new ExportController ( $c ['exportService'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['toolsController'] = function ($c) {
	$ctrl = new ToolsController ( $c ['dataAnalysisRepository'], $c['syntheseService'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['dbunitController'] = function ($c) {
	$ctrl = new DBUnitController ();
	$ctrl->register ();
	return $ctrl;
};

$container ['syntheseController'] = function ($c) {
	$ctrl = new SyntheseController ( $c ['syntheseService'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['retourController'] = function ($c) {
	$ctrl = new RetourController ( $c ['retourService'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['crmController'] = function ($c) {
	$ctrl = new CrmController ( $c ['crmService'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['tailleExceptionnelleController'] = function ($c) {
	$ctrl = new TailleExceptionnelleController ( $c ['tailleExceptionnelleService'], $c ['preneurMesureService'], $c ['referenceDataService'], $c ['commandeService'], $c ['data2EssayageConverter'], $c ['data2RendezVousConverter'], $c ['data2AlterationsValeurs'], $c ['algorithmAnalyseAutomatique'] );
	$ctrl->register ();
	return $ctrl;
};
$container ['utilisateurCtlr'] = function ($c) {
	$ctrl = new UtilisateurController ( $c ['utilisateurService'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['preneurMesureCtlr'] = function ($c) {
	$ctrl = new PreneurMesureController ( $c ['preneurMesureService'], $c ['utilisateurService'], $c ['commandeService'], $c ['tailleExceptionnelleService'], $c ['algorithmAnalyseAutomatique'] );
	$ctrl->register ();
	return $ctrl;
};

$container ['data2EssayageConverter'] = function ($c) {
	$obj = new Data2EssayageConverter ( $c ['commandeService'], $c ['preneurMesureService'] );
	return $obj;
};

$container ['data2RendezVousConverter'] = function ($c) {
	$obj = new Data2RendezVousConverter ( $c ['commandeService'], $c ['preneurMesureService'] );
	return $obj;
};

$container ['data2AlterationsValeurs'] = function ($c) {
	$obj = new Data2AlterationsValeurs ( $c ['commandeService'], $c ['tailleExceptionnelleService'] );
	return $obj;
};

$container ['indicateurController'];
$container ['articleController'];
$container ['referenceDataController'];
$container ['commandeController'];
$container ['bonPreparationController'];
$container ['facturationController'];
$container ['exportController'];
$container ['toolsController'];
$container ['dbunitController'];
$container ['syntheseController'];
$container ['retourController'];
$container ['crmController'];
$container ['tailleExceptionnelleController'];
$container ['utilisateurCtlr'];
$container ['preneurMesureCtlr'];*/
