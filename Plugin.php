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
            'icon'        => 'icon-leaf'
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

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'fencus.contactus.some_permission' => [
                'tab' => 'ContactUs',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'contactus' => [
                'label'       => 'ContactUs',
                'url'         => Backend::url('fencus/contactus/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['fencus.contactus.*'],
                'order'       => 500,
            ],
        ];
    }

}
