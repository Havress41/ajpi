<!-- FETCH DATA FROM DATABASE ----------->

<?php

switch($currentPage)
{
	case "dashboard.php" : 

		//Set variables
		$clause = "";
		$filters = [];
	
		//Verify and adapt if user is a client. Client can just see his own invoices
		if(!$isAdmin)
			$filters['clientCodeOwner'] = $user->getClientCode();

		//Verify if user has added invoiceCode filter
		if(isset($_POST['invoiceCode']) && trim($_POST['invoiceCode']) != "")
			$filters['invoiceCode'] = trim($_POST['invoiceCode']);

		//Verify if user has added client code filter
		if(isset($_POST['clientCode']) && trim($_POST['clientCode']) != "")
			$filters['clientCode'] = trim($_POST["clientCode"]);

		//Verify if user has added client name filter
		if(isset($_POST['name']) && trim($_POST['name']) != "")
			$filters['name'] = trim($_POST["name"]);

		//Verify if user has added start date filter
		if(isset($_POST['startPeriod']) && trim($_POST['startPeriod']) != "")
			$filters['startPeriod'] = $_POST['startPeriod'];

		//Verify if user has added end date filter
		if(isset($_POST['endPeriod']) && trim($_POST['endPeriod']) != "")
			$filters['endPeriod'] = $_POST['endPeriod'];

		$invoices = $invoiceDao->getInvoices($filters);

		break;

	case "client.php" :

		$redirection = "location:javascript://history.go(-1)";
	
		if(!isset($_GET['clientCode']))
			header($redirection);
		
		$clientCode = htmlspecialchars($_GET['clientCode']);

		$client = $clientDao->getClient($clientCode);

		if(is_null($client))
			header($redirection);

		$clientUser = $userDao->getClientUser($client->getCode(), "Client");

		break;

	case "invoice.php" :

		$redirection = "location:javascript://history.go(-1)";

		if(!isset($_GET['invoiceCode']))
			header($redirection);

		$invoiceCode = htmlspecialchars($_GET['invoiceCode']);

		$lines = $invoiceDao->getLines($invoiceCode);
		$invoice = $invoiceDao->getInvoice($invoiceCode);

		if(is_null($invoice))
			header($redirection);

		$client = $clientDao->getClient($invoice->getClientCode());

		if(is_null($client))
			header($redirection);

		break;

	case "userManagement.php" :

		$clients = $clientDao->getAllClient();
		$secrets = $secretDao->getAllSecret();
		$clientUsers = $userDao->getAllClientUser();
		$adminUsers = $userDao->getAllAdminUser();
		
		break;

	case "secretManagement.php" :

		$secrets = $secretDao->getAllSecret();
		
		break;

}

?>