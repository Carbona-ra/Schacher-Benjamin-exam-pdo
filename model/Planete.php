<?php 

// --------------------------------
// Classe des planetes
// --------------------------------

class Planete {

    private int $id;
    private string $nom;
    private string $imgUrl;    
    private string $categorie;
    private int $diametre;
    private float $gravite;
    private string $lienNasa;

    // fonction pour crée un obj
    public function hydrate(string $nom, string $imgUrl, string $categorie, int $diametre, float $gravite, string $lienNasa) : self {
        $this->setNom($nom);
        $this->setImgUrl($imgUrl);
        $this->setCategorie($categorie);
        $this->setDiametre($diametre);
        $this->setGravite($gravite);
        $this->setLienNasa($lienNasa);
        return $this;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getNom() : string {
        return $this->nom;
    }

    public function setNom(string $nom) : void {
        if ($this->validateNom($nom)) {
            $this->nom = $nom;
        } else {
            throw new Exception("Le nom n'est pas valide");
        }    
    }

    public function validateNom(string $nom) : bool {
        if (strlen($nom) < 8) {
            return true;
        } else {
            return false;
        }
    }

    public function getImgUrl() : string {
        return $this->imgUrl;
    }

    public function setImgUrl(string $imgUrl) : void {
        if ($this->validateImgUrl($imgUrl)) {
            $this->imgUrl = $imgUrl;
        } else {
            throw new Exception("L'URL n'est pas valide");
        }    
    }
    public function validateImgUrl(string $imgUrl) : bool {
        if (preg_match('/^https:\/\//', $imgUrl) === 1 ) {
            return true;
        } else {
            return false;
        }
    }

    public function getCategorie() : string {
        return $this->categorie;
    }
    public function setCategorie(string $categorie) : void {
        if ($this->validateCategorie($categorie)) {
            $this->categorie = $categorie;
        } else {
            throw new Exception("La categorie n'est pas valide");
        }    
    }
    public function validateCategorie(string $categorie) : bool {
        if ($categorie == 'Gazeuse' || $categorie == 'Tellurique' ) {
            return true;
        } else {
            return false;
        }
    }

    public function getDiametre() : string {
        return $this->diametre;
    }
    public function setDiametre(int $diametre) : void {
        if ($this->validateDiametre($diametre)) {
            $this->diametre = $diametre;
        } else {
            throw new Exception("Le diametre n'est pas valide");
        }    
    }
    public function validateDiametre(int $diametre) : bool {
        if (strlen($diametre)) {
            return true;
        } else {
            return false;
        }
    }

    public function getGravite() : string {
        return str_replace('.', ',', $this->gravite);
    }
    public function setGravite(float $gravite) : void {
        if ($this->validateGravite($gravite)) {
            $this->gravite = $gravite;
        } else {
            throw new Exception("La gravite n'est pas valide");
        }    
    }
    public function validateGravite(float $gravite) : bool {
        if ($gravite) {
            return true;
        } else {
            return false;
        }
    }

    public function getLienNasa() : string {
        return $this->lienNasa;
    }
    public function setLienNasa(string $lienNasa) : void {
        if ($this->validateLienNasa($lienNasa)) {
            $this->lienNasa = $lienNasa;
        } else {
            throw new Exception("Le lien n'est pas valide");
        }    
    }
    public function validateLienNasa(string $lienNasa) : bool {
        if (preg_match('/^https:\/\//', $lienNasa) === 1) {
            return true;
        } else {
            return false;
        }
    }
    
}

