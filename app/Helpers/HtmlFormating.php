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
}