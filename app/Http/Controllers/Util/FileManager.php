<?php

namespace App\Http\Controllers\Util;

use App\Http\Controllers\Controller;
use App\Models\Attachments;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use SuperHappysir\Support\Utils\Response\JsonResponseBodyInterface;

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
     * @return JsonResponseBodyInterface
     */
    public function upload(Request $request) : JsonResponseBodyInterface
    {
        $allFiles = $request->allFiles();
        if (!$allFiles) {
            return json_error_response('error', 'no file');
        }
        
        $result = [];
        
        $path              = '/' . date('Y-m');
        $filesystemAdapter = Storage::disk('public.upyun');
        
        /** @var \Illuminate\Http\UploadedFile $file */
        foreach ($allFiles as $key => $file) {
            if (!$file instanceof UploadedFile) {
                continue;
            }
            /** @var Attachments $attachmentsModel */
            $attachmentsModel            = Attachments::make();
            $attachmentsModel->mime_type = $file->getMimeType();
            $attachmentsModel->src       = $filesystemAdapter->put($path, $file);
            $attachmentsModel->save();
            $attr                 = $attachmentsModel->toArray();
            $attr['domian']       = config('filesystems.disks.public.upyun.domain');
            $result[$key] = $attr;
        }
        
        return json_success_response($result);
    }
}
