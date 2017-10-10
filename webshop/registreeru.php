<?php require_once("header.php"); ?>
    <div class="container-fluid">
        <br/><br/><br/>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Registreeru</strong>
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <br/>
                            <div class="col-md-10 col-md-offset-1">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-6"><label for="username">Kasutajanimi:</label></div>
                                        <div class="col-md-6"><input type="text" id="username" name="username" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label for="password">Parool:</label></div>
                                        <div class="col-md-6"><input type="password" name="password" id="password" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label for="passwordConfirm">Parool uuesti:</label></div>
                                        <div class="col-md-6"><input type="password" name="passwordConfirm" id="passwordConfirm" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label for="email">E-mail:</label></div>
                                        <div class="col-md-6"><input type="text" name="email" id="email" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label for="name">Nimi:</label></div>
                                        <div class="col-md-6"><input type="text" name="name" id="name" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label for="phone">Aadress:</label></div>
                                        <div class="col-md-6"><input type="text" name="address" id="address" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><label for="phone">Telefon:</label></div>
                                        <div class="col-md-6"><input type="number" name="phone" id="phone" required></div>
                                    </div>
                                    <br/>
                                    <input type="submit" class="btn btn-default register" value="Registreeru">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
					<?php 
		if ($_SERVER["REQUEST_METHOD"]=="POST") {
		    $username = sanitizeString($_POST["username"]);
            $name=sanitizeString($_POST["name"]);
            $email=sanitizeString($_POST["email"]);
            $password=sanitizeString($_POST["password"]);
            $passwordConfirm=sanitizeString($_POST["passwordConfirm"]);
            $address=sanitizeString($_POST["address"]);
            $phone=sanitizeString($_POST["phone"]);
            $nameCheck=queryMysql("SELECT userName FROM users WHERE userName='$name'");
            $mailCheck=queryMysql("SELECT email FROM users WHERE email='$email'");
		if ($nameCheck->num_rows){echo "Kasutajanimi on kasutusel";}
		elseif($mailCheck->num_rows){echo "E-mail on kasutusel";}
		elseif($password!=$passwordConfirm){echo "Salasõnad on erinevad";}
		else{
			$password=password_hash($password,PASSWORD_DEFAULT);
			queryMysql("INSERT INTO users(userName, name, addressDelivery, phone, email, pass) VALUES('$username', '$name', '$address','$phone', '$email','$password')");
			echo "<p>Kasutaja registreeritud</p>";
		}
		}
					require_once("footer.php"); ?>