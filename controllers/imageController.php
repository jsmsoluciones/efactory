<?php

class ImageController
{

    protected $pathDestino = '../../uploads/';
    protected $format = array("jpg", "jpeg", "png", "gif", "svg");
    protected $maxSize = 2000000;

    protected $file;
    protected $type;
    protected $tamano;
    protected $ext;
    protected $temp;
    protected $finalName;
    protected $destino;

    public function upload($file)
    {
        try {
            $this->extraerData($file);
            $this->checkTipo();
            $this->checkTamano();
            $this->moveImage();
            return $this->finalName;
        } catch (Exception $e) {
            echo "
        <div class='alert alert-danger' role='alert'>
        {$e->getMessage()}
        </div>";
        }
    }


    private function extraerData($file)
    {
        $this->file = $file['name'];
        $this->type = $file['type'];
        $this->tamano = $file['size'];
        $this->temp = $file['tmp_name'];
        $res = explode(".", $this->file);
        $this->ext = $res[count($res) - 1];
        $this->finalName = date("YmdHis") . "." . $this->ext;
        $this->destino = $this->pathDestino . $this->finalName;
    }

    private function checkTipo()
    {
        if (in_array($this->ext, $this->format)) {
            return;
        } else {
            throw new Exception("Formato de imagen invalido", 1);
        }
    }

    private function checkTamano()
    {
        if ($this->tamano <= $this->maxSize) {
            return;
        } else {
            throw new Exception("El archivo es demasido pesado", 1);
        }
    }

    private function moveImage()
    {
        move_uploaded_file($this->temp, $this->destino);
    }
}
