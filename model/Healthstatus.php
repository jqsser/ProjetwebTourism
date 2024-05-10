<?php

class Healthstatus{
    public ?int $id_st=NULL;
    

    public string $age;
    public string $gender;
    public string $chestpain_type;
    public string $resting_bp;
    public string $cholesterol;
    public string $fastingBS;
    public string $normalESG;
    public string $maxHR;
    public string $exercise;
    public string $oldpeak;
    public string $ST_slope;
    public string $Heart_disease;
    public int $health;


    public function __construct($id_s=NULL ,$ages,$genders,$chestpaintype,$restingbp,$cholesterols,$fastingBSS,$normalesg,$maxhr,$exercises,$oldpeaks,$st_slope,$heartdisease,$healths){
        $this->id_st= $id_s;
        $this->age= $ages;
        $this->gender= $genders;
        $this->chestpain_type= $chestpaintype;
        $this->resting_bp= $restingbp;
        $this->cholesterol= $cholesterols;
        $this->fastingBS= $fastingBSS;
        $this->normalESG= $normalesg;
        $this->maxHR=$maxhr;
        $this->exercise=$exercises;
        $this->oldpeak=$oldpeaks;
        $this->ST_slope=$st_slope;
        $this->Heart_disease=$heartdisease;
        $this->health=$healths;
        
    }

    public function getid_st(){
        return($this->id_st);
    }
    
    public function getage(){
        return($this->age);
    }
    public function getgender(){
        return($this->gender);
    }
    public function getchestpaintype(){
        return($this->chestpain_type);
    }
    public function getrestingbp(){
        return($this->resting_bp);
    }
    public function getcholesterol(){
        return($this->cholesterol);
    }
    public function getfastingbs(){
        return($this->fastingBS);
    }
    public function getnormalesg(){
        return($this->normalESG);
    }
    public function getmaxhr(){
        return($this->maxHR);
    }
    public function getexercise(){
        return($this->exercise);
    }
    public function getoldpeak(){
        return($this->oldpeak);
    }
    public function getstslope(){
        return($this->ST_slope);
    }
    public function getheartdisease(){
        return($this->Heart_disease);
    }
    public function gethealth(){
        return($this->health);
    }
    public function setid_st(int $id_st)
    {
        $this->id_st=$id_st;
    }
    
    public function setage(string $age)
    {
        $this->age=$age;
    }
    public function setgender(string $gender)
    {
        $this->gender=$gender;
    }
    public function setchestpaintype(string $chestpain_type)
    {
        $this->chestpain_type=$chestpain_type;
    }
    public function setrestingbp(string $resting_bp)
    {
        $this->resting_bp=$resting_bp;
    }
    public function setcholesterol(string $cholesterol)
    {
        $this->cholesterol=$cholesterol;
    }
    public function setfastingbs(string $fastingBS)
    {
        $this->fastingBS=$fastingBS;
    }
    public function setnormalesg(string $normalESG)
    {
        $this->normalESG=$normalESG;
    }
    public function setmaxhr(string $maxHR)
    {
        $this->maxHR=$maxHR;
    }
    public function setexercise(string $exercise)
    {
        $this->exercise=$exercise;
    }
    public function setoldpeak(string $oldpeak)
    {
        $this->oldpeak=$oldpeak;
    }
    public function setstslope(string $ST_slope)
    {
        $this->ST_slope=$ST_slope;
    }
    public function setheartdisease(string $Heart_disease)
    {
        $this->Heart_disease=$Heart_disease;
    }
    public function sethealth(int $health)
    {
        $this->health=$health;
    }
    




}