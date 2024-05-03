<?php

class   commentsr {
     private ?int $id_cr=NULL;
    private ?string $content_cr=NULL;
    private ?int $rating_cr=NULL;
    private ?string $date_cr=NULL;

    public function __construct($id_cr,$content_cr, $rating_cr, $date_cr)
    {
       $this->id_cr = $id_cr;
        $this->content_cr = $content_cr;
        $this->rating_cr = $rating_cr;
        $this->date_cr = $date_cr;
    }

public function get_id_cr()
{
    return $this->id_cr;
}

public function get_content_cr()
{
    return $this->content_cr;
}

public function get_rating_cr()
{
    return $this->rating_cr;
}
public function get_date_cr()
{
    return $this->date_cr;
}




public function set_content_cr(string $content)
{
    $this->content_cr=$content;
}

public function set_rating_cr(int $rating)
{
    $this->rating_cr=$rating; 
}
public function set_date_cr(string $date)
{
    $this->date_cr=$date;
}
 
} 
?> 