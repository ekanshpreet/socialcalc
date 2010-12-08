<div id="calendar">
    {$month_now=$smarty.now|date_format:'%m'}
    {$year_now=$smarty.now|date_format:'%Y'}
    {$counter=0}
    <table width='210' border='0' cellspacing='0' cellpadding='0'>
        <tr> 
            <td width='35' colspan='1'>
                <input type='button' id="previous_month" value='<'>
            </td> 
            <td width='140' colspan='5' class="calendar-title"> 
                {$month_name}, {$year}
            </td> 
            <td width='35' colspan='1' align='right'>
                <input type='button' id="next_month" value='>'>
            </td> 
        </tr>
    </table>
    <table width='210' border='0' cellspacing='0' cellpadding='0'> 
        <tr> 
            <td class='date calendar-head' width='30'>S</td> 
            <td class='date calendar-head' width='30'>M</td> 
            <td class='date calendar-head' width='30'>T</td> 
            <td class='date calendar-head' width='30'>W</td> 
            <td class='date calendar-head' width='30'>T</td> 
            <td class='date calendar-head' width='30'>F</td> 
            <td class='date calendar-head' width='30'>S</td> 
        </tr>
        {for $i=1 to $first_day}
            <td>&nbsp;</td>
            {$counter=$counter+1}
        {/for}
        {for $i=1 to $number_of_days}
            {if $counter%7 eq 0}
                </tr><tr>
            {/if}
            {if $i==$date && $month==$month_now && $year==$year_now}
                <td width='30' class='date {if {$event_dates[{$i}]}=='has-event'}today-event{else}today{/if}'>
                    {if {$event_dates[{$i}]}=='has-event'}<button class="get_event" value="{$i}">{$i}</button>
                    {else}{$i}{/if}
                </td>
            {elseif $counter%7==0 || $counter%7==6}
                <td width='30' class='date weekend {$event_dates[{$i}]}'>
                    {if {$event_dates[{$i}]}=='has-event'}<button class="get_event" value="{$i}">{$i}</button>
                    {else}{$i}{/if}
                </td>
            {else}
                <td width='30' class='date normal-date {$event_dates[{$i}]}'>
                    {if {$event_dates[{$i}]}=='has-event'}<button class="get_event" value="{$i}">{$i}</button>
                    {else}{$i}{/if}
                </td>
            {/if}
            {$counter=$counter+1}
        {/for}
    </table>
    <div id="events">
        {include file="_event.tpl"}
    </div>
    <div id="show-event-form" class="left_panel">
        <button id="show_form" class="right">Add Event
    </button>
    <div id="add-event" class="left-panel">
        {include file="_event_form.tpl"}
    </div>
    <div id="event_add_success" class="text-center"></div>
    {literal}
    <script>
        $(document).ready(function() {
            {/literal}
            day = {$date}
            month = {$month};
            year = {$year};
            {literal}
            $("#add-event").hide();
            $('#show_form').click(function() {
                $(this).hide();
                $("#add-event").show();
            });
            var calender_url = '{/literal}{$site_root_path}common/calendar.php{literal}';
            var event_url = '{/literal}{$site_root_path}common/event.php{literal}';
            //var ajax_load = "<img src='{/literal}{$site_root_path}assets/img/loading.gif{literal}' alt='loading...'/>";
            //  $("#quote p").html(ajax_load).load(loadUrl);
            $("#previous_month").click(function(){
                if(month == 1) { 
                   --year;
                   month = 13; 
                }
                $("#calendar").load(calender_url, "month="+(month-1)+"&year="+year);
            });
            $('#next_month').click(function() {
                if(month == 12) { 
                   ++year;
                   month = 0; 
                }
                $("#calendar").load(calender_url, "month="+(month+1)+"&year="+year);
            });
            $('.get_event').click(function() {
                $("#events").load(event_url, "day="+$(this).val()+"&month="+month+"&year="+year);
            });
        });
    </script>
    {/literal}
</div>