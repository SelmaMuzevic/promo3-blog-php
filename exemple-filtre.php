<form method="POST">
    <input type="text" name="test">
    <button>go</button>
</form>


<?php


if(isset($_POST['test'])){

    echo $_POST['test'];
    echo '<br/>';
    echo htmlspecialchars($_POST['test']);

}