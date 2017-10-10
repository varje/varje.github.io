<?php require_once("header.php"); ?>
    <div class="container-fluid">
        <br/><br/><br/>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Logi sisse</strong>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <br/>
                            <div class="col-md-10 col-md-offset-1">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>
                                        <input class="form-control" placeholder="Kasutajanimi" name="username" id="username" type="text">
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock"></i>
                                    </span>
                                        <input class="form-control" placeholder="Salasõna" name="password" id="password" type="password">
                                    </div>
                                    <br/>
                                    <input type="submit" class="btn btn-default btn-block" value="Logi sisse">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
					<?php 
					if ($_SERVER["REQUEST_METHOD"]=="POST") {
						$username=sanitizeString($_POST["username"]);
						$pass=sanitizeString($_POST["password"]);
						$result=queryMysql("SELECT * FROM users where userName='$username'");
						if ($result->num_rows) {
							$row=$result->fetch_array(MYSQLI_ASSOC);
							if (password_verify($pass,$row['pass'])) {
                                session_start();
                                $_SESSION['username']=$username;
                                $_SESSION['logged-in'] = true;
                                if($row["isAdmin"]==1){
                                    $_SESSION["auth"]="admin";
									header("Location:admin.php");
                                }
								else{
                                    $_SESSION["auth"]="user";
									header("Location:index.php");
                                }
							}
							else{echo "Vale salasõna";}
						}
						else{echo "Pole sellist kasutajat!";}
				}
					require_once("footer.php"); ?>