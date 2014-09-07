@if($thread == 'None')
    <span class="text-success"><i class="fa fa-check"></i> None</span>
@elseif($thread == 'Low')
    <span class="text-success"><i class="fa fa-check"></i> Low</span>
@elseif($thread == 'Medium')
    <span class="text-warning"><strong><i class="fa fa-exclamation-circle"></i> Medium</strong></span>
@elseif($thread == 'High')
    <span class="text-danger"><strong><i class="fa fa-warning"></i> HIGH</strong></span>
@else
    <em>Unknown</em>
@endif