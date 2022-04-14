<?php
// no direct access
defined('_JEXEC') or die;

// This plugin to attach the text form the parameter field  to each headline

use Joomla\CMS\Plugin\CMSPlugin;

/**
 * Joomla! 4 Plugin to addtext to each headline
 *
 * @since  4.0
 */
class plgSystemaddtext extends CMSPlugin
{
    /**
     * Loads the language
     *
     * @var    boolean
     * @since  3.1
     */
    protected $autoloadLanguage = true;

    public function __construct($name, array $arguments = array())
    {
        //  To call the constructor of the parent class from the constructor of the child class
        parent::__construct($name, $arguments);
    }

    public function onAfterDispatch()
    {
        $Admin = JFactory::getApplication()->isClient('administrator'); //Returns true if executed in the Joomla! website backend / administrator area.

        $add_text = $this->params->get('add_text', 1);
        if ($Admin) {

            // selecting the page title and adding new text with it
            JFactory::getDocument()->addScriptDeclaration("
            var page_title_container = document.querySelector('.page-title');
            page_title_container.innerHTML= '$add_text'
            ");
            return;
        }

    }

}
