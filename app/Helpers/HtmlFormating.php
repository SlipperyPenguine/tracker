<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 05/02/2016
 * Time: 15:58
 */

namespace tracker\Helpers;
use Carbon\Carbon;


class HtmlFormating
{
    public static function FormatHML($current, $includetrend = false, $previousvalue=0)
    {
        $output = '';
        switch($current)
        {
            case 1:
                $output = '<span class="badge badge-primary">L</span>';
                break;
            case 2:
                $output = '<span class="badge badge-warning">M</span>';
                break;
            case 3:
                $output = '<span class="badge badge-danger">H</span>';
                break;
        }

        if( ($includetrend) && ($previousvalue>0) && ($current!=$previousvalue) )
        {
            if($previousvalue<$current)
            {
                $output.= ' <i class="fa fa-level-up text-danger"></i>';
            }
            else
            {
                $output.= ' <i class="fa fa-level-down text-navy"></i>';
            }
        }

        return $output;

    }

    public static function FormatRiskRating($current, $includetrend = false, $previousvalue=0)
    {
        $output = '';
        switch($current)
        {
            case 1:
                $output = '<span class="badge bg-color-greenLight">1</span>';
                break;
            case 2:
                $output = '<span class="badge bg-color-greenLight">2</span>';
                break;
            case 3:
                $output = '<span class="badge bg-color-orange">3</span>';
                break;
            case 4:
                $output = '<span class="badge bg-color-redLight">4</span>';
                break;
            case 5:
                $output = '<span class="badge bg-color-redLight">5</span>';
                break;
        }

        if( ($includetrend) && ($previousvalue>0) && ($current!=$previousvalue) )
        {
            if($previousvalue<$current)
            {
                $output.= ' <i class="fa fa-level-up text-danger"></i>';
            }
            else
            {
                $output.= ' <i class="fa fa-level-down text-navy"></i>';
            }
        }

        return $output;

    }

    public static function FormatRAG($current, $includetrend = false, $previousvalue=null)
    {
        $output = '';
        switch($current)
        {
            case 'G':
                $output = '<span class="badge bg-color-greenLight">G</span>';
                break;
            case 'A':
                $output = '<span class="badge bg-color-orange">A</span>';
                break;
            case 'R':
                $output = '<span class="badge bg-color-redLight">R</span>';
                break;
        }
        return $output;

    }

    public static function StandardDateHTML(Carbon $date, $includetime=false, $comparetonow=false, $includeicon=false)
    {
        $output = '';

        $close = clone $date;

        $close = $close->addDays(-5);

        if($comparetonow)
        {
            $now = Carbon::today();
            if($date <= $now)
            {
                $output .= '<span class="text-danger">';
            }
            elseif($close <= $now)
            {
                $output .= '<span class="text-warning">';
            }
            else
            {
                $output .= '<span>';
            }
        }
        else{
            $output .= '<span>';
        }

        if($includeicon)
        {
            $output .= '<i class="fa fa-clock-o"></i> ';
        }

        $output  .= $date->diffForHumans();
        $output .= '<br/>';
        if($includetime)
            $output .= '&nbsp;&nbsp;&nbsp; <small>( '.$date->format('d M Y h:s').' )</small>';
        else
            $output .= '&nbsp;&nbsp;&nbsp; <small>( '.$date->format('d M Y').' )</small>';

        $output .= '</span>';
        return $output;
    }

    public static function SimpleDateHTML(Carbon $date, $includetime=false, $comparetonow=false, $includeicon=false)
    {
        $output = '';

        $close = clone $date;

        $close = $close->addDays(-5);

        if($comparetonow)
        {
            $now = Carbon::today();
            if($date <= $now)
            {
                $output .= '<span class="text-danger">';
            }
            elseif($close <= $now)
            {
                $output .= '<span class="text-warning">';
            }
            else
            {
                $output .= '<span>';
            }
        }
        else{
            $output .= '<span>';
        }

        if($includeicon)
        {
            $output .= '<i class="fa fa-clock-o"></i> ';
        }

        if($includetime)
            $output .= $date->format('d M Y h:s');
        else
            $output .= $date->format('d M Y');

        $output .= '</span>';
        return $output;
    }

    public static function FormatAuditTrail($before, $after)
    {
        $beforearray = null;
        if(strlen($before)>0)
            $beforearray = json_decode($before, true);

        $afterarray = json_decode($after, true);

        $output = '';
        $output .= '<table class="table table-hover no-margins no-padding">';

        foreach ($afterarray as $key => $value)
        {

            $beforetext = "[blank]";
            if(isset($beforearray))
                $beforetext = $beforearray[$key];

            $output.= '<tr>';

            $output.= '<td>';
            $output.= $key;
            $output.= '</td>';

            $output.= '<td>';
            $output.= $beforetext;
            $output.= '</td>';

            $output.= '<td>';
            $output.= $value;
            $output.= '</td>';

            $output.= '</tr>';

        }

        $output .= '</table>';

        return $output;
    }

    public static function GetProbabilityText( $score)
    {
        switch($score)
        {
            case 1:
                return "<span class='text-navy'><strong>Very Low</strong> - very unlikely the risk will occur</span>";
                break;
            case 2:
                return "<span class='text-navy'><strong>Low</strong> - not likely the risk will occur</span>";
                break;
            case 3:
                return "<span class='text-warning'><strong>Moderate</strong> - some likelihood the risk will occur</span>";
                break;
            case 4:
                return "<span class='text-danger'><strong>High</strong> - likely the risk will occur</span>";
                break;
            case 5:
                return "<span class='text-danger'><strong>Very High</strong> - Very likely the risk will occur</span>";
                break;
            default:
                return $score;
                break;
        }
    }
    
    public static function GetImpactText($score)
    {
        switch ($score) {
            case 1:
                return "<span class='text-navy'><strong>Negligible</strong> - no effect on the program. all requirements will be met.</span>";
                break;
            case 2:
                return "<span class='text-navy'><strong>Minor</strong> - the program will encounter small cost/schedule increases. minimum acceptable requirements will be met. most secondary requirements will be met.</span>";
                break;
            case 3:
                return "<span class='text-warning'><strong>Moderate</strong> - the program will encounter moderate cost/schedule increases. Minimum acceptable requirements will be met. Some secondary requirements may not be met.</span>";
                break;
            case 4:
                return "<span class='text-danger'><strong>Serious</strong> - the program will encounter major cost/schedule increases. Minimum acceptable requirements will be met. Secondary requirements may not be met</span>";
                break;
            case 5:
                return "<span class='text-danger'><strong>Critical</strong> - the program will fail. Minimum acceptable requirements will not be met</span>";
            default:
                return $score;
                break;
        }
    }

    public static function FormatRiskClassification($score, $classification)
    {

        $class = "text-navy";

        switch($classification)
        {
            case "Prevent":
                $class = "text-danger";
                break;
            case "Mitigate":
                $class = "text-warning";
                break;
            case "Contingency":
                $class = "text-yellow";
                break;
        }


        return "<span class='$class'>$score-$classification</span>";
    }
}