<?php

namespace App\Http\Controllers\Util;

use App\Http\Controllers\Controller;
use App\Models\Attachments;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileManager
 *
 * 统一文件上传类
 *
 * @author  luotao
 * @version 1.0
 * @package App\Http\Controllers\Util
 */
class FileManager extends Controller
{
    /**
     * 上传文件
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function upload(Request $request) : array
    {
        $uploadFile = $request->file('file_data');
        if (!$uploadFile) {
            return $this->error('error', 'no file');
        }
        if ($uploadFile instanceof UploadedFile) {
            $uploadFile = [ $uploadFile ];
        }
        $path              = '/' . date('Y-m');
        $filesystemAdapter = Storage::disk('public.upyun');
        $collection        = collect();
        /** @var \Illuminate\Http\UploadedFile $file */
        foreach ($uploadFile as $file) {
            /** @var Attachments $attachmentsModel */
            $attachmentsModel            = Attachments::make();
            $attachmentsModel->mime_type = $file->getMimeType();
            $attachmentsModel->src       = $filesystemAdapter->put($path, $file);
            $attachmentsModel->save();
            $attachmentsModel->src = resources_path($attachmentsModel->src);
            $collection->push($attachmentsModel);
        }
        
        return $this->success([ 'files' => $collection->toArray() ]);
    }
}
