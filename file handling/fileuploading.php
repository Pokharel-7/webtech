<html>
<head></head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Upload file: <input type="file" name="myfile"><br><br>
        <input type="submit" name="submit">
    </form>

    <?php 

            //print_r($_FILES['myfile']);

            $filename = $_FILES['myfile']['name'];
            $tempname = $_FILES['myfile']['tmp_name']; 
            $target = "webs/" . basename($filename);

            move_uploaded_file($tempname, $target)

                ?>
</body>
</html>
