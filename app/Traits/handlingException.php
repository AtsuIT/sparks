<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponses;

trait handlingException
{
  use ApiResponses;

  public function handleGetException($data, $message)
  {
    try {
      return $this->successResponse(["data" => $data]);
    } catch (\Exception $ex) {
      return $this->badRequestResponse('error',$ex->getMessage());
      Log::info("$message" .  $ex->getMessage());
    }
  }

  public function handleRepositoryException($data, $message)
  {
    try {
      return $data;
    } catch (\Exception $ex) {
      return $this->badRequestResponse('error',$ex->getMessage());
      Log::info("$message" .  $ex->getMessage());
    }
  }

  public function handlePostException($repoName, $functionName, $param, $message)
  {
    DB::beginTransaction();

    try {
      $variable = $repoName->$functionName($param);
    } catch (\Throwable $th) {
      DB::rollBack();

      $variable = Log::info("$message" . $th->getMessage());
    }
    DB::commit();
    return $variable;
  }
}
