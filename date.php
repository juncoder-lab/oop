<?php
//Класс для работы с датой
//Принимает дату в формате "год-месяц-день"
class Date
{
    private $date;
    private $monthList = ["01" => "январь", "02" => "февраль", "03" => "март", "04" => "апрель", "05" => "май", "06" => "июнь", "07" => "июль", "08" => "август"
        , "09" => "сентябрь", "10" => "октябрь", "11" => "ноябрь", "12" => "декабрь"];
    private $dayList=["0"=>"воскресенье","1"=>"понедельник","2"=>"вторник","3"=>"среда","4"=>"четверг","5"=>"пятница","6"=>"суббота"];
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
        //может принимать агрументы 'ru' или 'en', в этом случае возвращает название месяца словом на заданном языке
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
    public function getWeekDay($lang=null)
    {
        //по умолчанию возвращает номер дня недели
        //может принимать аргументы 'ru' или 'en', в этом случае возвращает день недели словом на заданном языке
        if ($lang==null)
        {
            return date ('w',$this->date);
        }
        if ($lang=='ru')
        {
            foreach ($this->dayList as $key=>$value)
            {
                if ($key==date ('w',$this->date))
                {
                    return $value;
                }
            }
        }
        if ($lang=='en')
        {
            return date ('l',$this->date);
        }
        else
        {
            return 'incorrect argument $lang';
        }
    }
    public function addDay($value)
    {
        //добавляет значение $value к дню
        return $this->getDay()+$value;
    }
    public function subDay($value)
    {
        //отнимает значение $value от дня
        return $this->getDay()-$value;
    }
    public function addMonth($value)
    {
        //добавляет значение $value к месяцу
        return $this->getMonth()+$value;
    }
    public function subMonth($value)
    {
        //отнимает значение $value от месяца
        return $this->getMonth()-$value;
    }
    public function addYear($value)
    {
        //добавляет значение $value к году
        return $this->getYear()+$value;
    }
    public function subYear($value)
    {
        //отнимает значение $value от года
        return $this->getYear()-$value;
    }

}
$obj=new Date('2000-08-15');
echo $obj->getDay().'<br>';
echo $obj->getMonth('ru').'<br>';
echo $obj->getYear().'<br>';
echo $obj->getWeekDay('ru').'<br>';
echo $obj->addDay(20);