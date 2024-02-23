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

function menu($where){

    $active_categorie = "text-white";
    $active_employe = "text-white";
    $active_affecter = "text-white";
    if ($where == "categorie")
        $active_categorie = "text-primary bg-white";
    else if ($where == "employe")
        $active_employe = "text-primary bg-white";
    else if ($where == "affecter")
        $active_affecter = "text-primary bg-white";
        	
    echo "<nav class=\"navbar navbar-expand-lg navbar-light bg-primary fixed-top\">
    <div class=\"container-fluid\">
        <img src=\"../images/logo_nbg.png\" width=\"60px\">
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
            <ul class=\"navbar-nav\">" ;
        
        echo "
                <li class=\"nav-item\">
                    <a class=\"nav-link   ".$active_categorie." \" href=\"../categorie/categorie-list.php\"><i class=\"fa-solid fa-city\"></i> Categories</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link   ".$active_employe."  \" href=\"../employe/employe-list.php\"><i class=\"fa-solid fa-city\"></i>Employe</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link   ".$active_affecter." \" href=\"../affecter/affecter-list.php\"><i class=\"fa-solid fa-city\"></i> Affecter</a>
                </li>
            </ul>";
        echo "<ul class=\"navbar-nav ms-auto\">
        <li class=\"nav-item\">
            <a class=\"nav-link text-white\" href=\"../deconnexion.php\" ><i class=\"fa-solid fa-lock\"></i> Déconnexion</a>
        </li>
    </ul>
</div>
</div>
</nav>";
            
}
?>