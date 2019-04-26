<?php
/**
 * Created by PhpStorm.
 * User: binhnx
 * Date: 4/26/19
 * Time: 1:15 PM
 */

namespace App\Helpers;

use Exception;
use Illuminate\Http\UploadedFile;
use Storage;

class FileHelper
{
    /** @var $store Storage */
    protected $store;

    public $rootUploads = 'uploads';

    public $directories = [
        'avatar'     => 'avatar',
    ];

    public function __construct()
    {
        $this->initStorage();
        $this->store = Storage::disk('uploads');
    }

    private function initStorage()
    {
        $rootDir = public_path($this->rootUploads);
        if (!is_dir($rootDir)) {
            mkdir($rootDir);
            chmod($rootDir, 0777);
        }
        foreach ($this->directories as $directory) {
            $path = public_path($this->rootUploads . "/" . $directory);
            if (!is_dir($path)) {
                mkdir($path);
                chmod($path, 0777);
            }
        }
    }

    /**
     * @param $file UploadedFile
     * @param $type string
     * @return null|string
     * @throws Exception
     */
    public function upload($file, $type)
    {
        try {
            $filename = strtr(':type-:time.:ext', [
                ':type' => $type, ':time' => time(),
                ':ext' => $file->getClientOriginalExtension()
            ]);

            $result = $this->store->putFileAs($this->directories[$type], $file, $filename);

            return !empty($result) ? $filename : null;
        } catch (Exception $e) {
            throw new Exception('UPLOAD_ERROR');
        }
    }
}
