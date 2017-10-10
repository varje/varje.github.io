<?php
require_once("header.php");
if (checkSession()===false) {
    header("Location:index.php");
    exit();
    # code...
}
else{
    echo '<div class="container">
						<div class="row">						
							<section class="6u 12u(narrower)">';
    echo "<h3>welcome admin</h3>";
    echo"<a href='messages.php'>Messages</a>";
    echo '</section>
						</div>
					</div>';
}
require_once("footer.php");
?>