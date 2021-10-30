<?php

namespace App\Dao\Report;

use App\Models\Report;
use App\Contracts\Dao\Report\ReportDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for report
 */
class ReportDao implements ReportDaoInterface
{
  /**
   * Interface for report service
   */
  public function showReport()
  {
    $reports = Report::orderBy('created_at', 'asc')->get();
    return $reports;
  }

  /**
   * To add new report
   */
  public function addReport(Request $request)
  {
    // Create The Report...
    $report = new Report;
    $report->name = $request->name;
    $report->done = $request->done;
    $report->progress = $request->progress;
    $report->problem = $request->problem;
    $report->save();
    return $report;
  }

  /**
   * To delete existing report
   */
  public function deleteReport($id)
  {
    Report::findOrFail($id)->delete();
  }
}
