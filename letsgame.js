
jQuery(document).ready(function()
{
	gameEngine = new GameEngine();
	gameEngine.Init();
	gameEngine.Start();

	jQuery('#startgame').click(function()
	{
		if(isRunning)
		{
			isRunning = 0;
			jQuery(this).html('Run'); 
		}	
		else
		{
			isRunning = 1; 
			jQuery(this).html('Pause'); 
		}
		

	});
});           
