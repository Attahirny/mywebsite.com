<?php
include('Projects/connectdb.php');

/*$sql = "INSERT INTO `entries` (`Name`, `Email`, `Password`) VALUES ('Ahmadu', 'a@b.com', 'AHMAD123')";
$data = mysqli_query($conn, $sql);
if(!$data) {
    echo htmlspecialchars("Transmission failed!");
}*/

echo 'Connected successfully' . '<br />';
$sql = "SELECT * FROM entries";
$result = mysqli_query($conn, $sql);
$myarray = mysqli_fetch_all($result, MYSQLI_ASSOC);
$conn->close();


?>
<?php
// Function to install Ngrok
function installNgrok()
{
    // Change the path to your desired installation directory
    $installDir = '/';

    // Download Ngrok binary
    $ngrokUrl = 'https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip';
    file_put_contents('ngrok.zip', file_get_contents($ngrokUrl));

    // Extract the downloaded zip file
    $zip = new ZipArchive;
    $zip->open('ngrok.zip');
    $zip->extractTo($installDir);
    $zip->close();

    // Remove the downloaded zip file
    unlink('ngrok.zip');

    echo "Ngrok installed successfully at {$installDir}" . PHP_EOL;
}

// Function to run Ngrok on a specific port
function runNgrok($port)
{
    $ngrokPath = '/ngrok';

    // Run Ngrok command to expose the specified port
    $command = "{$ngrokPath} http {$port}";
    $output = shell_exec($command);

    // Parse the Ngrok output to get the HTTPS URL
    $matches = [];
    preg_match('/https:\/\/(.*?)\//', $output, $matches);

    if (isset($matches[1])) {
        $httpsUrl = $matches[0];
        echo "Ngrok is running at {$httpsUrl}" . PHP_EOL;
    } else {
        echo "Failed to get Ngrok URL." . PHP_EOL;
    }
}

// Install Ngrok (if not already installed)
if (!file_exists('/ngrok')) {
    installNgrok();
}

// Run Ngrok on port 8000 (change as needed)
runNgrok(8000);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorials</title>
    <style contenteditable="" style="display:block;">
        .btn-md {
            background-color: grey;width: 100%;
        }
        body {
            display: flex;
            flex-direction:column;
            background:skyblue;
            color: rgb(150,100,20);
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            color: rgb(150,10,20);
            
        }
        table {
            border-collapse: collapse;

        }
        div {
            margin: auto;
        }
       
        
    </style>
</head>
<body><div>

   <?php

    ?>


    <h1>User Profile Data</h1>

    <table>
        <tbody>            
            <tr>
                <?php foreach(array_keys($myarray[0]) as $k):?>
                <th><?php echo htmlspecialchars($k);?></th>
                <?php endforeach;?>
            </tr>
            <?php foreach($myarray as $array){?>
            <tr>    
                <?php foreach($array as $i):?>                
                <td><?php echo $i;?></td>            
                <?php endforeach;?>
            </tr> 
            <?php    }; ?>
        </tbody>
    </table>
</div>
</body>
<script>

</script>
</html>
