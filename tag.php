<?php
//Создает html тэги
//Принимает параметр $name соответствующий названию тэга
class Tag
{
    private $name;
    private $attr;
    public function __construct($name)
    {
        $this->name=$name;
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
}
$obj=new Tag('input');
echo $obj->setAttr('type','submit')->setAttr('value','letsGo')->removeAttr('value')->open();
?>