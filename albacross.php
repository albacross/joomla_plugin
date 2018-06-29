<?php

defined('_JEXEC') or die;

class PlgSystemAlbacross extends JPlugin
{
	function onAfterRender()
	{
		$app = JFactory::getApplication();
		if($app->getName() != 'site') {
			return true;
		}
		if(!empty($this->params->get("customerID", ""))) {
			$buffer = JFactory::getApplication()->getBody();
			$insert = "<script type=\"text/javascript\">
			  _nQc = '".$this->params->get("customerID")."';
			  _nQs = 'Joomla-Plugin';
			  _nQsv = '1.0.0';
			  _nQt = new Date().getTime();
			  (function() {
			    var no = document.createElement('script'); no.type = 'text/javascript'; no.async = true;
			    no.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'serve.albacross.com/track.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(no, s);
			  })();
			</script>";
			$buffer = str_ireplace("</body>", $insert."</body>", $buffer);
			JFactory::getApplication()->setBody($buffer);
		}

		return true;
	}
}
