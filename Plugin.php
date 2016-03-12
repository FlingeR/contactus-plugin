<?php namespace Fencus\ContactUs;

use Backend;
use System\Classes\PluginBase;

/**
 * ContactUs Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Contact Us',
            'description' => 'No description provided yet...',
            'author'      => 'Fencus',
            'icon'        => 'icon-at'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Fencus\ContactUs\Components\ContactUs' => 'contactUs',
        ];
    }
    
    public function registerMailTemplates()
    {
    	return [
    			'fencus.contactus::mail.message' => 'Message from front-end to receiver.',
    	];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [];
    }

}
