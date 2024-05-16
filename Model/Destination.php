<?php
class Destination{
    private ?int $Destination_id = NULL;
    private ?int $id_sp = NULL;
    private ?string $Destination = NULL;
    private ?string $des_details = NULL;
    private ?string $image_path = NULL;

    public function __construct($Destination_id,$id_sp, $Destination, $des_details, $image_path) {
        $this->Destination_id = $Destination_id;
        $this->id_sp = $id_sp;
        $this->Destination = $Destination;
        $this->des_details = $des_details;
        $this->image_path = $image_path;
    }

    public function get_Destination_id()
    {
        return $this->Destination_id;
    }

    public function get_id_sp()
    {
        return $this->id_sp;
    }

    public function get_Destination()
    {
        return $this->Destination;
    }

    public function get_des_details()
    {
        return $this->des_details;
    }

    public function get_image_path()
    {
        return $this->image_path;
    }

    public function set_Destination_id(int $id)
    {
        $this->Destination_id=$id;
    }

    public function set_id_sp(int $idd)
    {
        $this->id_sp=$idd;
    }
    public function set_Destination(string $Destination)
    {
        $this->Destination=$Destination;
    }

    public function set_des_details(string $des_details)
    {
        $this->des_details=$des_details;
    }

    public function set_image_path($image_path)
    {
        $this->image_path = $image_path;
    }
}
?>
