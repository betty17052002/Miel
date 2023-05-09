<?php
class Miel {
   
    private $id_miel, $nom_miel, $apiculteur, $prix, $image, $admin;

    // Les methodes

    public function __construct($miel) {
        $this->id_miel = $miel['id_miel'];
        $this->nom_miel = $miel['nom_miel'];
        $this->apiculteur = $miel['apiculteur'];
        $this->prix = $miel['prix'];
        $this->image = $miel['image'];
        $this->admin = $miel['admin'];
    }

    public function drawImage() {
        $image = "<img class=\"card-img-top\" src=\"$this->image\" alt=\"$this->nom_miel\">";

        return $image;
    }

    public function drawBody() {
        $body = "<div class=\"card-body\">";
        $body .= "<h5 class=\"card-title\">$this->nom_miel</h5>";
        $body .= "<h6 class=\"card-subtitle\">$this->apiculteur</h6>";
        $body .= "<p class=\"card-text\">$this->prix</p>";

        if ($this->admin) {
            $body .= "<a href=\"edit.php?id=$this->id_miel\" class=\"card-link\">Editer</a>";
        }

        $body .= "</div>";

        return $body;
    }

    public function displayProduct() {
        $product = "<div class=\"product card\">";
        $product .= $this->drawImage();
        $product .= $this->drawBody();        
        $product .= "</div>";

        return $product;
    }
}
?>