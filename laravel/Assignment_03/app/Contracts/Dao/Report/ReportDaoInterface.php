<?php

namespace App\Contracts\Dao\Report;

use Illuminate\Http\Request;

/**
 * Interface for report service
 */
interface ReportDaoInterface
{
  /**
   * To show report
   */
  public function showReport();

  /**
   * To add new report
   */
  public function addReport(Request $request);

  /**
   * To delete existing report
   */
  public function deleteReport($id);
}
