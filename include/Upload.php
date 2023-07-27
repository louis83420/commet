<?php
/**
 * 构造文件上传的信息
 *
 * @param void
 * @return array
 */
function builderInfo()
{
    $n = 0;
    foreach ($_FILES as $file) {
        if (is_string($file['name'])) {
            if ($file['error'] == UPLOAD_ERR_OK) {
                $array[$n]['name'] = $file['name'];
                $array[$n]['type'] = $file['type'];
                $array[$n]['size'] = $file['size'];
                $array[$n]['tmp_name'] = $file['tmp_name'];
                $array[$n]['extension'] = getExtension($file['name']);
                $n++;
            }
        }
        if (is_array($file['name'])) {
            foreach ($file['name'] as $key => $filename) {
                if ($file['error'][$key] == UPLOAD_ERR_OK) {
                    $array[$n]['name'] = $filename;
                    $array[$n]['type'] = $file['type'][$key];
                    $array[$n]['size'] = $file['size'][$key];
                    $array[$n]['tmp_name'] = $file['tmp_name'][$key];
                    $array[$n]['extension'] = getExtension($filename);
                    $n++;
                }
            }
        }
    }
    return $array;
}

/**
 * 上传文件
 * @param  string $path,上传文件的路径
 * @return array
 */
function upload($path, $allowExtension = ['gif', 'jpg', 'png', 'jpeg'])
{
    if (is_string($allowExtension)) {
        $allowExtension = explode(',', $allowExtension);
    }
    $allowExtension = array_map('strtolower', $allowExtension);
    $array = [];
    $files = builderInfo();
    if ($files) {
        foreach ($files as $file) {
            $filename = uuid() . '.' . $file['extension'];
            if (in_array($file['extension'], $allowExtension)) {
                if (@move_uploaded_file($file['tmp_name'], $path . '/' . $filename)) {
                    $array[] = $filename;
                }
            }
        }
    }
    return $array;
}
