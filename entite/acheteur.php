<?php

class acheteur
{
    private $id;
    private $nom;
    private $email;
    private $passe;
    private $num_tel;
    private $num_mobil;
    private $date;
    private $etat;

    function __construct($id, $nom, $email, $passe, $num_tel, $num_mobil, $date, $etat)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->passe = $passe;
        $this->num_tel = $num_tel;
        $this->num_mobil = $num_mobil;
        $this->date = $date;
        $this->etat = $etat;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPasse()
    {
        return $this->passe;
    }

    public function getNum_tel()
    {
        return $this->num_tel;
    }

    public function getNum_mobil()
    {
        return $this->num_mobil;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPasse($passe)
    {
        $this->passe = $passe;
    }

    public function setNum_tel($num_tel)
    {
        $this->num_tel = $num_tel;
    }

    public function setNum_mobil($num_mobil)
    {
        $this->num_mobil = $num_mobil;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
    }


}

?>
