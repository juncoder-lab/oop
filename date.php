<?php
//Класс для работы с датой
//Принимает дату в формате "год-месяц-день"
class Date
{
    private $date;
    private $monthList=["01"=>"январь","02"=>"февраль","03"=>"март","04"=>"апрель","05"=>"май","06"=>"июнь","07"=>"июль","08"=>"август"
    ,"09"=>"сентябрь","10"=>"октябрь","11"=>"ноябрь","12"=>"декабрь"];
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
    public function getDay()
    {
        //возвращает номер дня месяца
        return date('d',$this->date);
    }
    public function getMonth($lang=null)
    {
        //по умолчанию возвращает номер месяца
        //может принимать агрументы 'ru' и 'en' тогда возвращает название месяца словом на заданном языке
        if ($lang==null)
        {
            return date ('m',$this->date);
        }
        if ($lang=='ru')
        {
            foreach ($this->monthList as $key=>$elem)
            {
                if ($key==date ('m',$this->date))
                {
                    return $elem;
                }
            }
        }
        if ($lang=='en')
        {
            return date ('F',$this->date);
        }
        else
        {
            return 'incorrect argument $lang';
        }
    }
    public function getYear()
    {
        //возвращает год
        return date ('Y',$this->date);
    }

}
$obj=new Date('2045-01-30');
echo $obj->getYear();