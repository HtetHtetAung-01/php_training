<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Report\ReportServiceInterface;
use App\Http\Requests\reportRequest;
use App\Contracts\Services\Task\TaskServiceInterface;
use App\Mail\DoneReportMail;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    /**
     * report interface
     */
    private $reportInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface, ReportServiceInterface $reportServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
        $this->reportInterface = $reportServiceInterface;
    }
    /**
     * To show report lisk
     * 
     * @return View Report lisk
     */
    public function showReport()
    {
        $tasks = $this->taskInterface->showTaskList();
        $reports = $this->reportInterface->showReport();
        return view('reports', [
            'tasks' => $tasks,
            'reports' => $reports
        ]);
    }
    /**
     * To add new report
     */
    public function addReport(reportRequest $request)
    {
        $validated = $request->validated();
        $this->reportInterface->addReport($request);
        return redirect('/task/complete/mail');
    }

    /**
     * To delete existing report
     */
    public function deleteReport($id)
    {
        $this->reportInterface->deleteReport($id);
        return back();
    }

    /**
     * To send mail when task is completed
     */
    public function DoneReportMail()
    {
        $details = [
            'title' => '[Task Completed]',
            'body' => 'Well Done! Do you want to report other tasks?'
        ];
        Mail::to('thaethae27399@gmail.com')->send(new DoneReportMail($details));
        dd("Email is Sent, please check your inbox.");
    }
}
