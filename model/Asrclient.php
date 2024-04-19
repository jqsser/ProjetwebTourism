<?php
class Asrclient{
    public int $id_assur;
    public string $type;
    public int $clienthealth;
    public float $cost;
    public string $type_assur;
    public DateTime $datedebut;
    public DateTime $datefin;
    public string $asrprovider;

    public function __construct($id_asr,$typ,$date_debut,$date_fin,$client_health,$asr_provider,$costs,$types){
        $this->id_assur= $id_asr;
        $this->type_assur= $typ;
        $this->datedebut= $date_debut;
        $this->datefin= $date_fin;
        $this->clienthealth= $client_health;
        $this->asrprovider= $asr_provider;
        $this->cost= $costs;
        $this->type=$types;
    }

    public function getid_assur(){
        return($this->id_assur);
    }
    
    public function getclienthealth(){
        return($this->clienthealth);
    }
    public function getcost(){
        return($this->cost);
    }
    public function gettype_assur(){
        return($this->type_assur);
    }
    public function getdatedebut(){
        return($this->datedebut);
    }
    public function getdatefin(){
        return($this->datefin);
    }
    public function getasrprovider(){
        return($this->asrprovider);
    }
    public function setid_assur()
    {
        $this->id_assur=$id_assur;
    }
    public function setclienthealth()
    {
        $this->clienthealth=$clienthealth;
    }
    public function setcost()
    {
        $this->cost=$cost;
    }
    public function settype_assur()
    {
        $this->_assur=$type_assur;
    }
    public function setdatedebut()
    {
        $this->datedebut=$datedebut;
    }
    public function setdatefin()
    {
        $this->datefin=$datefin;
    }
    public function setasrprovider()
    {
        $this->asrprovider=$asrprovider;
    }
    public function gettype(){
        return($this->type);
    }
    public function settype()
    {
        $this->type=$type;
    }
    




}