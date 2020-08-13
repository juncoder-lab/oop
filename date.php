<?php
//Класс для работы с датой
//Принимает дату в формате "год-месяц-день"
class Date
{
    private $date;
    public function __construct($date=null)
    {
        if ($date==null)
        {
            $this->date=time();
        }
        else
        {
            $this->date=strtotime($date);
        }
    }

}