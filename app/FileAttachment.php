<?php

namespace App;

use Storage;
use Bkwld\Cloner\AttachmentAdapter;

class FileAttachment implements AttachmentAdapter
{
    public function duplicate($path)
    {
        $name = basename($path);
        $newPath = 'public/'.str_random(4).$name;
        Storage::copy($path, $newPath);

        return $newPath;
    }
}