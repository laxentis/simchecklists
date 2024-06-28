<div class="icao-window">
	<div class="inner-icao">
		<div class="close_icao" id="icao_close"><?PHP $theme->theme_icon('close'); ?></div>
		
		<div class="airport">
			Select your Airport:<br>
			<input id="airport_code" type="text" placeholder="Enter ICAO Code"><button id="button_icao_submit">Search</button>
			<div class="spacer"></div>
			
			<div class="airport_name"></div>
			<div class="spacer"></div>
			
			Runways General Information:
			<div class="runways_list"></div>
			<div class="spacer"></div>
			
			Navigation:
			<div class="runways"></div>
			<div class="spacer"></div>
			
			Communications:
			<div class="comms"></div>
			<div class="spacer"></div>
			
			METAR: 
			<div class="metar"></div>
			<div class="spacer"></div>
		</div>
	</div>
</div>

