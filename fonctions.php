<?php

function redirection($url)
{
	if (headers_sent())
		print('<meta http-equiv="refresh" content="0;URL='.$url.'">');
	else 
		header("Location: $url");
}

function fct_prenom($prenom)
{
	$prenom = strtoupper(substr($prenom, 0, 1)).strtolower(substr($prenom,1,strlen($prenom)-1));
	return($prenom);
}
function moncrypte($mdp)
{
	$mon_mdp = "";
	for ($i=0; $i<=strlen($mdp); $i++)
		$mon_mdp .=ord($mdp[$i]);
	
	$mon_mdp.=strlen($mdp);
	return $mon_mdp;
}

function get_image($photo)
{
	#get file name by *['name'] through $FILES
    $nom = $_FILES['photo']['name'];
    #we get type by *['type']
    $type = $_FILES['photo']['type'];
    if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg")
    {
            #get a temporary file from the upload
            $name_tmp = $_FILES['photo']['tmp_name'];
            #lead the uploaded file and move it to your file
            $dossier = "../images/employe-profile/";
            #we have to encode file name to upload it correctly without special chars
            #using utf8_decode
            if (move_uploaded_file($name_tmp, $dossier.utf8_decode($nom)))
                return $nom;
            else
            {
                echo "<br>File not uploaded...";
                return "error"; 
            }
    }
    else
        echo "ERROR #001 : FILE IS NOT IMAGE <br>";
        return "error";
}
?>