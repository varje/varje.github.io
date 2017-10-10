<?php require_once("header.php"); ?>
    <div class="container-fluid">
        <br/><br/><br/>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Kontakteeru</strong>
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <br/>
                            <div class="col-md-10 col-md-offset-1">
                                <form id="mail" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                    <p><label for="name">Teie nimi: &nbsp;</label><input type="text" id="name" name="name"></p>
                                    <p><label for="email">Teie e-mail: &nbsp;</label><input type="text" id="email" name="email"></p>
                                    <p><label for="title">Kirja pealkiri: &nbsp;</label><input type="text" id="title" name="title"></p>
                                    <textarea id="content" class="text" cols="50" rows ="15" name="content">Kirja sisu..</textarea>
                                    <p><input type="checkbox" name="newsletter" value="Car" checked> Soovin liituda uudiskirjaga<br></p>
                                    <br/>
                                    <p><input type="submit" class="btn btn-default register" value="Saada"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $name=sanitizeString($_POST["name"]);
    $email=sanitizeString($_POST["email"]);
    $title=sanitizeString($_POST["title"]);
    $content=sanitizeString($_POST["content"]);
    if ($name!="" AND $email!="" AND $title !="" AND $content!=""){
        queryMysql("INSERT INTO messages(name, email, title, content) VALUES('$name','$email', '$title', '$content')");
        echo "<p>Kiri saadetud!</p>";
    }
}

require_once("footer.php"); ?>