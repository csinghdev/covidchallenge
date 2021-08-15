<?php

namespace App\Http\Controllers;


use App\CovidChallenge\DataAnalysis;
use App\Http\Requests\GetDateInfoRequest;
use App\Http\Requests\GetPinpointInfoRequest;
use App\Http\Requests\GetPinpointStateRequest;
use App\Http\Requests\GetStateInfoRequest;

class CovidDataAnalysisController extends Controller
{
    /**
     * @param GetDateInfoRequest $request
     * @param DataAnalysis $data_analysis
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getDateInfo(GetDateInfoRequest $request, DataAnalysis $data_analysis) {
        return $this->respond($data_analysis->getDateInfo($request->getDate()));
    }

    /**
     * @param GetStateInfoRequest $request
     * @param DataAnalysis $data_analysis
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getStateInfo(GetStateInfoRequest $request, DataAnalysis $data_analysis) {
        return $this->respond($data_analysis->getStateInfo($request->getState()));
    }

    /**
     * @param GetPinpointStateRequest $request
     * @param DataAnalysis $data_analysis
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function pinpointState(GetPinpointStateRequest $request, DataAnalysis $data_analysis) {
        return $this->respond($data_analysis->getPinpointStateInfo($request->getDate(), $request->getState()));
    }

    /**
     * @param GetPinpointInfoRequest $request
     * @param DataAnalysis $data_analysis
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function pinpointInfo(GetPinpointInfoRequest $request, DataAnalysis $data_analysis) {
        return $this->respond($data_analysis->getPinpointInfo($request->getDate(), $request->getState()));
    }
}
