<?php
//Создает html тэги
//Принимает параметр $name соответствующий названию тэга
class Tag
{
    private $name;
    private $attr;
    public function __construct($name, $attr=[])
    {
        $this->name=$name;
        $this->attr=$attr;
    }
    public function open()
    {
        $name=$this->name;
        $attrString=$this->attrStr();
        return "<$name $attrString>";
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
                $attrStr.="$item=\"$value\" ";
            }
            return $attrStr;
        }
    }
}
$obj=new Tag('input',['type'=>'submit', 'value'=>'letsGo']);
echo $obj->open()
?>