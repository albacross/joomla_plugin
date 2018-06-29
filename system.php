<?php

defined('JPATH_BASE') or die;

class plgSystemAlbacross extends JPlugin
{
	function onAfterRender()
	{
		$app = JFactory::getApplication();
		if($app->getName() != 'site') {
			return true;
		}
		$buffer = JFactory::getApplication()->getBody();
		$insert = "<script>alert(1);</script>";
		$buffer = str_ireplace("</body>", $insert."</body>", $buffer);
		JFactory::getApplication()->setBody($buffer);

		return true;
	}
}
