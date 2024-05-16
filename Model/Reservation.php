<?php
class Reservation
{
    private ?int $id_reserv = NULL;
    private ?string $departure = NULL;
    private ?string $flightdate = NULL;
    private ?string $returndate = NULL;
    private ?int $nb_passengers = NULL;
    private ?int $Destination_id = NULL; 

    public function __construct($id_reserv, $departure, $flightdate, $returndate, $nb_passengers, $Destination_id)
    {
        $this->id_reserv = $id_reserv;
        $this->departure = $departure;
        $this->flightdate = $flightdate;
        $this->returndate = $returndate;
        $this->nb_passengers = $nb_passengers;
        $this->Destination_id = $Destination_id; 
    }

    
    public function get_id_reserv()
    {
        return $this->id_reserv;
    }

    public function get_departure()
    {
        return $this->departure;
    }

    public function get_flightdate()
    {
        return $this->flightdate;
    }

    public function get_returndate()
    {
        return $this->returndate;
    }

    public function get_nb_passengers()
    {
        return $this->nb_passengers;
    }

    public function get_Destination_id()
    {
        return $this->Destination_id;
    }






public function set_id_reserv(int $id)
{
    $this->id_reserv=$id;
}
public function set_Destination_id(int $id)
{
    $this->Destination_id=$id;
}


public function set_departure(string $departure)
{
    $this->departure=$departure;
}
public function set_flightdate(string $flightdate)
{
     $this->flightdate=$flightdate;
}
public function set_returndate(string $returndate)
{
     $this->returndate=$returndate;
}
public function set_nb_passengers(int $nb_passengers)
{
    $this->nb_passengers=$nb_passengers;
}
}
?>

