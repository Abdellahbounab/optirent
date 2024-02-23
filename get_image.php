<?php
    extract($_POST);
    #get file name by *['name'] through $FILES
    $nom = $_FILES['photo']['name'];
    #we get type by *['type']
    $type = $_FILES['photo']['type'];
    if ($type == "image/jpeg" || $type == "image/png" $type == "image/jpg")
    {
        if ($taille <= 500)
        {
            #get a temporary file from the upload
            $name_tmp = $_FILES['photo']['tmp_name'];
            #lead the uploaded file and move it to your file
            $dossier = "./images/";
            $uploading = false;
            #we have to encode file name to upload it correctly without special chars
            #using utf8_decode
            if (move_uploaded_file($name_tmp, $dossier.utf8_decode($nom)))
            {
                $uploading = true;
                echo "<img src = \"".$name_tmp."\">";
            }
            else
                echo "<br>File not uploaded...";

        }
        else
            echo "<br>ERROR #002 : size is bigger than 500ko";
    }
    else
        echo "ERROR #001 : FILE IS NOT IMAGE";

    
