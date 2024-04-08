<?php

class Income
{
    private $full_name;
    private $civil_status;
    private $position;
    private $em_status;
    private $regu_hours;
    private $over_hours;

    // Constructor
    public function __construct($full_name, $civil_status, $position, $em_status, $regu_hours, $over_hours) {
        $this->full_name = $full_name;
        $this->civil_status = $civil_status;
        $this->position = $position;
        $this->em_status = $em_status;
        $this->regu_hours = $regu_hours;
        $this->over_hours = $over_hours;
    }

    // Getters
    public function getFullName() {
        return $this->full_name;
    }

    public function getCivilStatus() {
        return $this->civil_status;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getEmStatus() {
        return $this->em_status;
    }

    public function getReguHours() {
        return $this->regu_hours;
    }

    public function getOverHours() {
        return $this->over_hours;
    }

    // Regular Pay
    public function getRegularRate() {
        $position  = $this->position;
        $em_status = $this->em_status;

        if($position == "staff" && $em_status == "contractual")
        {
            return "300/day";
        } elseif($position == "staff" && $em_status == "probatinary")
        {
            return "350/day";
        } elseif($position == "staff" && $em_status == "regular")
        {
            return "400/day";
        } elseif($position == "admin" && $em_status == "contractual")
        {
            return "350/day";
        } elseif($position == "admin" && $em_status == "probatinary")
        {
            return "400/day";
        } elseif($position == "admin" && $em_status == "regular")
        {
            return "500/day";
        }
    }

    // Overtime Pay
    public function getOverRate() {
        $position = $this->position;
        $employment_status = $this->employment_status;

        if($position == "staff" && $employment_status == "contractual"){
            return "10/hour";
        }elseif($position == "staff" && $employment_status == "probationary"){
            return "25/hour";
        }elseif($position == "staff" && $employment_status == "regular"){
            return "30/hour";
        }elseif($position == "admin" && $employment_status == "contractual"){
            return "15/hour";
        }elseif($position == "admin" && $employment_status == "probationary"){
            return "30/hour";
        }elseif($position == "admin" && $employment_status == "regular"){
            return "40/hour";
        }
    }



    // Healthcare Deductions
    public function getHealthCare()
    {
        if($this->civil_status == "single")
        {
            return 200;
        } elseif($this->civil_status == "married")
        {
            return 75;
        }
    }

    // Tax Deductions
    public function computeTax()
    {
        $grossIncome = $this->computeGrossIncome;

        if($this->civil_status == "single" && $grossIncome <= 1000 || $this->civil_status == "married" && $grossIncome <= 1500)
        {
            return 0;
        } elseif($this->civil_status == "single" && $grossIncome > 1000)
        {
            return ($grossIncome *0.05);
        } elseif($this->civil_status == "married" && $grossIncome > 1500)
        {
            return ($grossIncome * 0.03);
        }
    }

    // ragularpay
    public function computeRegularPay()
    {
        $position = $this->position;
        $employment_status = $this->employment_status;
        $regular_hours = $this->regular_hours;

        if($position == "staff" && $employment_status == "contractual"){
            return (300/8) * $regular_hours;
        }elseif($position == "staff" && $employment_status == "probationary"){
            return (350/8) * $regular_hours;
        }elseif($position == "staff" && $employment_status == "regular"){
            return (400/8) * $regular_hours;
        }elseif($position == "admin" && $employment_status == "contractual"){
            return (350/8) * $regular_hours;
        }elseif($position == "admin" && $employment_status == "probationary"){
            return (400/8) * $regular_hours;
        }elseif($position == "admin" && $employment_status == "regular"){
            return (500/8) * $regular_hours;
        }
    }

    //overpay
    public function computeOverPay()
    {
        $position = $this->position;
        $employment_status = $this->employment_status;
        $ot_hours = $this->ot_hours;

        if($position == "staff" && $employment_status == "contractual"){
            return 10 * $ot_hours;
        }elseif($position == "staff" && $employment_status == "probationary"){
            return 25 * $ot_hours;
        }elseif($position == "staff" && $employment_status == "regular"){
            return 30 * $ot_hours;
        }elseif($position == "admin" && $employment_status == "contractual"){
            return 15 * $ot_hours;
        }elseif($position == "admin" && $employment_status == "probationary"){
            return 30 * $ot_hours;
        }elseif($position == "admin" && $employment_status == "regular"){
            return 40 * $ot_hours;
        }
    }

    // Gross Income
    public function computeGrossIncome()
    {
        return $this->cpmputeGrossIncome = ($this->computeReguratPay() + $this->computeOverPay());
    }

    // net income
    public function computeNetIncome()
        {
            $gross      = $this->computeGrossIncome();
            $tax        = $this->computeTax($gross);
            $healthcare = $this->getHealthCare();
            return ($gross - ($tax + $healthcare));
        }
    
}
?>