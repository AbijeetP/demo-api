<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Filesystem\File;

/**
 * Contains constants related to all the tables
 */
class AppTable extends Table {
    
    /**
     * Returns file contents
     * @param type $fileName
     * @return type
     */
    public function getFileInfo($fileName){
        $file = new File($fileName);
        $contents = $file->read();
        $file->close();
        return $contents;
    }
}