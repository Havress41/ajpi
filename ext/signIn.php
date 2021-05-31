		<div class="userFormBox">

			<h2>Connexion : </h2>

			<form action="index.php" method="post">
				
				<div class="grid-container-userForm">

					<div class="grid-item-label">
						<label for="username">Nom d'utilisateur : </label>
					</div>

					<div class="grid-item-input-text">
						<input type="text" id="username" name="username" required>
					</div>

					<div class="grid-item-label">
						<label for="password">Mot de passe : </label>
					</div>

					<div class="grid-item-input-text">
						<input type="password" id="password" name="password" required>
					</div>

					<div class="grid-item-label">
						<label for="password">Code secret : </label>
					</div>

					<div class="grid-item-input-text">
						<input type="password" id="otp" name="otp" maxlength="6" size="6" required>
					</div>

					<div class="grid-item-input-button">
						<input type="submit" name="signIn" value="Se connecter">
					</div>

					<?php include "ext/redirection.php"; ?>
					<?php include "ext/message.php"; ?>

				</div>

			</form>			

		</div>