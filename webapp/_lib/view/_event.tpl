<div id="events_table" class="left_panel">
    {if isset($event_list[0]['title'])}
        {$flag=1}
    {else}
        {$flag=0}
    {/if}
    {if $flag}
    <h3 class="text-center"> Events for the Day {$date}/{$month}/{$year} </h3>
    {foreach $event_list as $event}
        <h3 style="margin-bottom:-5px">{$event['title']}</h3><hr>
        <p style="margin-top:-5px">Starts at {$event['time']|truncate:5:""} for {$event['duration']} hours.<br/>
        <p class="gray" style="margin-top:-10px">{$event['description']}</p>
    {/foreach}
    {else}
        <h3 class="text-center">No Events for the Day {$date}/{$month}/{$year} </h3><hr>
    {/if}
</div>