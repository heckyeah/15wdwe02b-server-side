<?php

date_default_timezone_set("Pacific/Auckland");

// Start the session
session_start();

require '../config.php';

// Determine what page the user wants
$_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 'home';

// Require some classes
require 'classes/views/Page.php';
require 'classes/models/Model.php';

// Switch based on requested page
switch( $_GET['page'] ) {

	// Home
	case 'home':
		require 'classes/models/HomeModel.php';
		require 'classes/views/HomePage.php';

		$model = new HomeModel();
		$page = new HomePage( $model );
	break;

	// About
	case 'about':
		require 'classes/models/AboutModel.php';
		require 'classes/views/AboutPage.php';

		$model = new AboutModel();
		$page = new AboutPage( $model );
	break;

	case 'contact':
		require 'classes/models/ContactModel.php';
		require 'classes/views/ContactPage.php';

		$model = new ContactModel();
		$page = new ContactPage( $model );
	break;

	case 'register':
		require 'classes/models/RegistrationModel.php';
		require 'classes/views/RegistrationPage.php';

		$model = new RegistrationModel();
		$page = new RegistrationPage( $model );
	break;

	case 'account':
		require 'classes/models/AccountModel.php';
		require 'classes/views/AccountPage.php';

		$model = new AccountModel();
		$page = new AccountPage( $model );
	break;

	case 'logout':
		require 'classes/models/LogoutModel.php';
		require 'classes/views/LogoutPage.php';

		$model = new LogoutModel();
		$page = new LogoutPage( $model );
	break;

	case 'login':
		require 'classes/models/LoginModel.php';
		require 'classes/views/LoginPage.php';

		$model = new LoginModel();
		$page = new LoginPage( $model );
	break;

	case 'deal':
		require 'classes/models/DealModel.php';
		require 'classes/views/DealPage.php';

		$model = new DealModel();
		$page = new DealPage( $model );
	break;

	case 'search':

		require 'classes/models/SearchModel.php';
		require 'classes/views/SearchPage.php';

		$model = new SearchModel();
		$page = new SearchPage( $model );

	break;

	case 'all-deals':

		require 'classes/models/AllDealsModel.php';
		require 'classes/views/AllDealsPage.php';

		$model = new AllDealsModel();
		$page = new AllDealsPage( $model );

	break;

	// 404
	default:
		require 'classes/models/Error404Model.php';
		require 'classes/views/Error404Page.php';
		$model = new Error404Model();
		$page = new Error404Page( $model );
	break;
}

// Load the content
$page->buildHTML();
