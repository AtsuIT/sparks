<?php

namespace App\Helpers;

use File;

use Illuminate\Support\Facades\Log;

class UploadHelper
{

  /**
   * Upload Any Types of File.
   *
   * It's not checking the file type which may be checked before pass here in validation
   *
   * @param  string $f               request with file
   * @param  binary $file            file
   * @param  string $name            filename
   * @param  string $target_location location where file will store
   * @return string                  filename
   */
  public static function upload($file, $target_location)
  {
      try {
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        // $extension = $file->getClientOriginalExtension();
        $file->move($target_location, $filename);
        return url('') .'/'. $target_location .'/' .$filename;
      } catch (\Throwable $ex) {
        Log::info("[ERROR]- Helper UploadFile- " . $ex->getMessage());
      }
  }


  /**
   * Update File
   * @param  string $f               request with file
   * @param  binary $file            file
   * @param string $name             filename
   * @param  string $target_location location where file will store
   * @param  string $old_location    file location which will delete
   * @return string                  filename
   */
  public static function update($f, $file, $name, $target_location, $old_location)
  {
    //delete the old file
    $target_location = $target_location . '/';
    if (File::exists($target_location . $old_location)) {
      File::delete($target_location . $old_location);
    }

    $filename = $name . '.' . $file->getClientOriginalExtension();
    $file->move($target_location, $filename);
    return url('') . '/' .$filename .'/'. $target_location;
  }


  /**
   * delete file
   * @param  type $location file location that will delete
   * @return type                  null
   */
  public static function deleteFile($location)
  {
    if (File::exists($location)) {
      File::delete($location);
    }
  }
}
