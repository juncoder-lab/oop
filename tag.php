<?php
//Создает html тэги
//Принимает параметр $name соответствующий названию тэга
class Tag
{
    private $name;
    private $attr;
    private $text;
    public function __construct($name)
    {
        $this->name=$name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getText()
    {
        return $this->text;
    }
    public function getAttrs()
    {
        return $this->attr;
    }
    public function getAttr($name)
    {
        if(isset ($this->attr[$name]))
        {
            return $this->attr[$name];
        }
        else
        {
            return null;
        }
    }
    public function removeClass($nameclass)
    {
        if(isset ($this->attr['class']))
        {
            $classes=explode(" ", $this->attr['class']);
            if (in_array($nameclass, $classes))
            {
               $classes=$this->removeElemfromArray($classes, $nameclass);
               $this->attr['class']= $this->attr['class']=implode(" ", $classes);
            }
        }
        return $this;
    }
    public function addClass($nameclass)
    { //Добавляет в атрибут class новые значения
        if(isset ($this->attr['class']))
        {
            $classes=explode(" ", $this->attr['class']);
            if(!in_array($nameclass, $classes))
            {
                $classes[]=$nameclass;
                $this->attr['class']=implode(" ", $classes);
            }
        }
        else
        {
            $this->attr['class']=$nameclass;
        }
        return $this;
    }
    public function setAttr($name, $value)
    {
        //Метод для добавления атрибутов тэга
        $this->attr[$name]=$value;
        return $this;
    }
    public function setAttrs($attrs=[])
    {
        //Принимает массив атрибутов
        foreach ($attrs as $name=>$value)
        {
            $this->setAttr($name,$value);
        }
        return $this;
    }
    public function removeAttr($name)
    {
        //Удаление атрибутов
        unset($this->attr[$name]);
        return $this;
    }
    public function open()
    {
        $name=$this->name;
        $attrString=$this->attrStr();
        return "<$name$attrString>";
    }
    public function close()
    {
        $name=$this->name;
        return "</$name>";
    }
    private function attrStr()
    {
        if(!empty ($this->attr))
        {
            $attrStr=null;
            foreach ($this->attr as $item=>$value)
            {
                if($value===true)
                {
                    //создает атрибут без значения (например <input id="test" disabled>)
                    $attrStr.=" $item";
                }
                else
                {
                    $attrStr.=" $item=\"$value\"";
                }
            }
            return $attrStr;
        }
    }
    private function removeElemfromArray($arr, $elem)
    {
        $key=array_search($elem, $arr);
        unset($arr[$key]);
        return $arr;
    }
}
//$obj=new Tag('input');
//echo $obj->setAttr('type','submit')->setAttr('value','letsGo')->removeAttr('value')->open();
//echo (new Tag('input'))->setAttr('value','input your name')->open();
//echo (new Tag('input'))->setAttr('type','password')->open();
//echo (new Tag('input'))->setAttr('type','submit')->setAttr('value','letsGo')->open();
echo (new Tag('input'))
    ->setAttr('class', 'eee zzz kkk') // добавим 3 класса
    ->removeClass('zzz') // удалим класс 'zzz'
    ->open(); // выведет <input class="eee kkk">
?>