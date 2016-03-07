<!-- content -->
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        ID:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->id}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Risk or Issue:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        @if($risk->is_an_issue) Issue @else Risk @endif
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Title:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->title}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Subject Type:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->subject_type}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Subject Name:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->subject_name}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Status:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->status}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Next Review:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->NextReviewDate->diffForHumans()}} ({{$risk->NextReviewDate->format('d M Y')}})
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Description:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->description}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Current Classification:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->CurrentRiskClassificationScore}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Current Probability:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->probability}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Target Probability:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->target_probability}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Current Impact:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->impact}}
    </td>
</tr>
<tr>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        Target Impact:
    </td>
    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
        {{$risk->target_impact}}
    </td>
</tr>
<!-- End of content -->