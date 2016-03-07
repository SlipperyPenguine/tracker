<!-- content -->
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        ID:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$task->id}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Title:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$task->title}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Subject Type:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$task->subject_type}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Subject Name:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$task->subject_name}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Status:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$task->status}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Type:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        @if($task->milestone) Milestone @else Task @endif
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        @if($task->milestone) Date: @else Start Date: @endif
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$task->StartDate->diffForHumans()}} ({{$task->StartDate->format('d M Y')}})
    </td>
</tr>
@if(!$task->milestone)
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        End Date:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$task->EndDate->diffForHumans()}} ({{$task->EndDate->format('d M Y')}})
    </td>
</tr>
@endif

<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Description:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$task->description}}
    </td>
</tr>

<!-- End of content -->