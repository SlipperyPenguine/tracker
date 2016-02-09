<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 05/02/2016
 * Time: 15:58
 */

namespace tracker\Helpers;


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

    public static function FormatRiskHistory($before, $after)
    {
        $beforearray = null;
        if(strlen($before)>0)
            $beforearray = json_decode($before, true);

        $afterarray = json_decode($after, true);

        $output = '';

        foreach ($afterarray as $key => $value)
        {
            $beforetext = "[blank]";
            if(isset($beforearray))
                $beforetext = $beforearray[$key];
            if($output!='')
                $output.='<br/>';
            $output.= "$key: from $beforetext to $value";
        }

        return $output;
    }
}