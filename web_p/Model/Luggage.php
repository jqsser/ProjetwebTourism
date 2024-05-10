<?php

class Luggage{
    private ?int $id_luggage=NULL;
    private ?string $type_Lu=NULL;
    private ?int $weight_Lu=NULL;



    public function __construct( $id_luggage,  $type_Lu,  $weight_Lu)
{
    $this-> id_luggage = $id_luggage;
    $this->type_Lu = $type_Lu;
    $this->weight_Lu = $weight_Lu;

    
}

public function get_id_luggage()
{
    return $this-> id_luggage;
}

public function get_type_Lu()
{
    return $this->type_Lu;
}
public function get_weight_Lu()
{
    return $this->weight_Lu;
}



public function set_id_luggage(int $id)
{
    $this-> id_luggage=$id;
}

public function set_type_Lu(string $type_Lu)
{
    $this->type_Lu=$type_Lu;
}
public function set_weight_Lu(string $weight_Lu)
{
     $this->weight_Lu=$weight_Lu;
}

}
?>