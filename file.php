<?php
interface iFile
{
    public function __constructor($filePath);

    public function getPath(); // путь к файлу
    public function getDir();  // папка файла
    public function getName(); // имя файла
    public function getExt();  // расширение файла
    public function getSize(); // размер файла

    public function getText();          // получает текст файла
    public function setText($text);     // устанавливает текст файла
    public function appendText($text);  // добавляет текст в конец файла

    public function copy($copyPath);    // копирует файл
    public function delete();           // удаляет файл
    public function rename($newName);   // переименовывает файл
    public function replace($newPath);  // перемещает файл
}
class File implements iFile
{

    public function __constructor($filePath)
    {
        // TODO: Implement __constructor() method.
    }

    public function getPath()
    {
        return __FILE__;
    }

    public function getDir()
    {
        return __DIR__;
    }

    public function getName()
    {
        return basename($this->getPath());
    }

    public function getExt()
    {
        return pathinfo ( $this->getPath(),  PATHINFO_EXTENSION);
    }

    public function getSize()
    {
        return filesize($this->getPath());
    }

    public function getText()
    {
        return file_get_contents($this->getPath());
    }

    public function setText($text)
    {
        file_put_contents($this->getPath(),$text);
    }

    public function appendText($text)
    {
        $this->getText().$text;
    }

    public function copy($copyPath)
    {
        copy($this->getPath(),$copyPath);
    }

    public function delete()
    {
        unlink($this->getPath());
    }

    public function rename($newName)
    {
        rename($this->getName(),$newName);
    }

    public function replace($newPath)
    {
        rename($this->getPath(),$newPath);
    }
}
//echo $_SERVER['DOCUMENT_ROOT'];
//echo __FILE__;
//echo __DIR__;
$obj=new File();
echo $obj->getText();
?>