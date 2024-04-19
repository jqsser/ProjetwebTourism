<?php

class   comments {
     private ?int $id_c=NULL;
    private ?string $content_c=NULL;
    private ?int $rating_c=NULL;
    private ?string $date_c=NULL;

    public function __construct($id_c, $content_c, $rating_c, $date_c)
    {
        $this->id_c = $id_c;
        $this->content_c = $content_c;
        $this->rating_c = $rating_c;
        $this->date_c = $date_c;
    }

public function get_id_c()
{
    return $this->id_c;
}

public function get_content_c()
{
    return $this->content_c;
}

public function get_rating_c()
{
    return $this->rating_c;
}
public function get_date_c()
{
    return $this->date_c;
}



public function set_id_c(int $id)
{
    $this->id_c=$id;
}
public function set_content_c(string $content)
{
    $this->content_c=$content;
}

public function set_rating_c(int $rating_c)
{
    $this->rating_c=$rating_c ; 
}
public function set_date_c(string $date)
{
    $this->date_c=$date;
}
 
} 
?> 