<?php

class Spaceship{
    private ?int $id_sp=NULL;
    private ?string $Sp_model=NULL;
    private ?int $NbSp_place=NULL;
    private ?int $NbSp_voyage=NULL;
    private ?string $description_SP=NULL;
    private ?int $id_ELug=NULL;


    public function __construct( $id_sp,  $Sp_model,  $NbSp_place,$NbSp_voyage , $description_SP,$id_ELug)
{
    $this-> id_sp = $id_sp;
    $this->Sp_model = $Sp_model;
    $this->NbSp_place = $NbSp_place;
    $this->NbSp_voyage = $NbSp_voyage;
    $this->description_SP = $description_SP;
    $this->id_ELug = $id_ELug; 
    
}


public function get_id_sp()
{
    return $this-> id_sp;
}

public function get_Sp_model()
{
    return $this->Sp_model;
}
public function get_NbSp_place()
{
    return $this->NbSp_place;
}
public function get_NbSp_voyage()
{
    return $this->NbSp_voyage;
}
public function get_description_SP()
{
    return $this->description_SP;
}

public function get_id_ELug()
{
    return $this->id_ELug;
}

public function set_id_sp(int $id)
{
    $this-> id_sp=$id;
}

public function set_Sp_model(string $Sp_model)
{
    $this->Sp_model=$Sp_model;
}
public function set_NbSp_place(string $NbSp_place)
{
     $this->NbSp_place=$NbSp_place;
}
public function set_NbSp_voyage(string $NbSp_voyage)
{
     $this->NbSp_voyage=$NbSp_voyage;
}
public function set_description_SP(int $description_SP)
{
    $this->description_SP=$description_SP;
}
public function set_id_ELug(int $id_ELug)
{
    $this->id_ELug=$id_ELug;
}

}
?>