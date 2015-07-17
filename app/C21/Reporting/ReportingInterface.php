<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 3/27/2015
 * Time: 12:24 PM
 */

namespace App\C21\Reporting;


interface ReportingInterface {
    public function create();
    public function edit();
    public function closedLeadsBySource();
    public function allClosedBySource();
}