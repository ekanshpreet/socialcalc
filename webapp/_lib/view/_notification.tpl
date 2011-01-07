<div id="notification" class="left-panel">
<script type="text/javascript">
$(function() {
	$(".notifications-jcarousellite").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 2,
		auto:2000,
		easing: 'jswing',
		speed:1000
	});
});
</script>
<div id="notifications-bar">    
    <div class="title">What's New</div>
	<br /><br />
    <div class="notifications-jcarousellite">
		<ul>
            {foreach $notifications as $notification_display}
			<li>
				<div class="info">
					{$notification_display}
				</div>
				<div class="clear"></div>
			</li>
{/foreach}
			</ul>
    </div>
    </div>
</div>
