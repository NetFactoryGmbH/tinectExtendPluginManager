<?php

namespace tinectExtendPluginManager;

use Shopware\Components\Plugin;

class tinectExtendPluginManager extends Plugin
{
	
	public static function getSubscribedEvents()
    {
		
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Backend_PluginManager' => 'onPluginManagerPostDispatch'
        ];
    }
	
	
	public function onPluginManagerPostDispatch(\Enlight_Event_EventArgs $args)
    {
		
        /** @var \Enlight_Controller_Action $controller */
        $controller = $args->getSubject();
        $view = $controller->View();
        $request = $controller->Request();

        $view->addTemplateDir(__DIR__ . '/Views');

			/*if ($request->getActionName() === 'index') {
			}*/
		
			if ($request->getActionName() == 'load') {
            $view->extendsTemplate('backend/plugin_manager/view/extendPM/list/local_plugin_listing_page.js');
			}
    }
	
}
