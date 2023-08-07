<?php
namespace Hrach\Cloudfinder;

class CloudFinder {

    private $data;
    /**
     * Функция выводит конечный результат данных.
     *
     * @param [type] $data
     * @return void
     */
    public function view() {
        $this->getDataFiles();
        foreach($this->data as $dt){
            echo $dt;
        }
        
    }

    private function getDataFiles() {
        
        $cloudFile = new CloudFile();
        $this->data = $cloudFile->getData();
        //var_dump($this->data);
        
    }
}