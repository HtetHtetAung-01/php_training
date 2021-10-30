<?php

namespace App\Services\Report;

use App\Contracts\Dao\Report\ReportDaoInterface;
use App\Contracts\Services\Report\ReportServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for report
 */
class ReportService implements ReportServiceInterface
{
  /**
   * report dao
   */
  private $reportDao;
  /**
   * Class Constructor
   * @param ReportDaoInterface
   * @return
   */
  public function __construct(ReportDaoInterface $reportDao)
  {
    $this->reportDao = $reportDao;
  }
  public function showReport()
  {
    return $this->reportDao->showReport();
  }

  /**
   * To add new report
   */
  public function addReport($request)
  {
    return $this->reportDao->addReport($request);
  }

  /**
   * To delete existing report
   */
  public function deleteReport($id)
  {
    return $this->reportDao->deleteReport($id);
  }
}
