<?php

namespace App\CovidChallenge;

use App\Models\Covid19India;
use App\Models\CovidVaccineStatewise;
use App\Models\StatewiseTestingDetails;

class DataAnalysis
{
    /**
     * @param $date
     * @return array
     */
    public function getDateInfo($date) {
        return [
            'covid_19_india' => $this->getCovidSummary($date),
            'covid_vaccines_statewise' => $this->getCovidVaccinesStatewise($date),
            'statewise_testing_details' => $this->getStatewiseTesting($date),
        ];
    }

    /**
     * @param $state
     * @return array
     */
    public function getStateInfo($state) {
        return [
            'covid_19_india' => $this->getCovidSummary(null, $state),
            'covid_vaccines_statewise' => $this->getCovidVaccinesStatewise(null, $state),
            'statewise_testing_details' => $this->getStatewiseTesting(null, $state),
        ];
    }

    /**
     * @param $state
     * @param $date
     * @return array
     */
    public function getPinpointStateInfo($date, $state) {
        return [
            'covid_19_india' => $this->getCovidSummary($date, $state),
            'covid_vaccines_statewise' => $this->getCovidVaccinesStatewise($date, $state),
            'statewise_testing_details' => $this->getStatewiseTesting($date, $state),
        ];
    }

    /**
     * @param $date
     * @param $state
     * @return array
     */
    public function getPinpointInfo($date, $state) {
        return [
            'covid_19_india' => $this->getCovidSummary($date, $state),
            'covid_vaccines_statewise' => $this->getCovidVaccinesStatewise($date, $state),
            'statewise_testing_details' => $this->getStatewiseTesting($date, $state),
        ];
    }

    /**
     * @param null $date
     * @param null $state
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getCovidSummary($date = null, $state = null) {
        $query = Covid19India::query();
        if ($date) {
            $query->where('date', $date);
        }
        if ($state) {
            if (is_array($state)) {
                $query->whereIn('state', $state);
            } else {
                $query->where('state', $state);
            }
        }
        return $query->get();
    }

    /**
     * @param null $date
     * @param null $state
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getCovidVaccinesStatewise($date = null, $state = null) {
        $query = CovidVaccineStatewise::query();
        if ($date) {
            $query->where('updated_on', $date);
        }
        if ($state) {
            if (is_array($state)) {
                $query->whereIn('state', $state);
            } else {
                $query->where('state', $state);
            }
        }

        return $query->get();
    }

    /**
     * @param null $date
     * @param null $state
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getStatewiseTesting($date = null, $state = null) {
        $query = StatewiseTestingDetails::query();
        if ($date) {
            $query->where('date', $date);
        }
        if ($state) {
            if (is_array($state)) {
                $query->whereIn('state', $state);
            } else {
                $query->where('state', $state);
            }
        }
        return $query->get();
    }
}
