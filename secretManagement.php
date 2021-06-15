<?php include "ext/common.php"; ?>

<!DOCTYPE html>
<html lang="fr">
	
	<?php include 'ext/header.php'; ?>

	<body>

		<?php include 'ext/menu.php';?>

		<?php include 'ext/search/fetchData.php';?>

		<div class="grid-container-userBoxGroup">	

			<div class="userBox">
				<?php include "ext/secretManagement/secretOwner.php"; ?>
			</div>
		
			<?php if($isAdmin) { ?>
				<div class="userBox">
					<?php include "ext/secretManagement/secretManager.php"; ?>
				</div>
			<?php } ?>
					
		</div>

		<div id='secretBox'>
			<?php include "ext/table/secret.php"; ?>
		</div>

	</body>

	<?php include "ext/footer.php" ?>

</html>
