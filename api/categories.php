<?php
require __DIR__.'/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();

$host = $_ENV['DATABASE_HOST'];
$user = $_ENV['DATABASE_USER'];
$password = $_ENV['DATABASE_PASSWORD'];
$db = $_ENV['DATABASE_NAME'];

$connection = pg_connect("host=$host port=6543 dbname=$db user=$user password=$password");

$result = pg_query($connection, "select * from categories");
?>

<h1>Categories</h1>
<table border='1'>
    <thead>
        <tr>
            <th align='center'>id</th>
            <th align='center'>name</th>
            <th align='center'>description</th>
            <th align='center'>created</th>
            <th align='center'>modified</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row=pg_fetch_assoc($result)){
        ?>
                <tr>
                    <td align='center'><?=$row['id']?></td>
                    <td align='center'><?=$row['name']?></td>
                    <td align='center'><?=$row['description']?></td>
                    <td align='center'><?=$row['created']?></td>
                    <td align='center'><?=$row['modified']?></td>
                </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<a href="../">Beranda</a>