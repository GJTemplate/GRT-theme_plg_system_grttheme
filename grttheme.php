<?php

defined('_JEXEC') or die;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Plugin\CMSPlugin;

// require classmap
require_once __DIR__ . '/classmap.php';

class plgSystemGRTtheme extends CMSPlugin
{
    /**
     * @var \JDatabaseDriver
     */
    public $db;

    /**
     * @var CMSApplication
     */
    public $app;

    /**
     * Constructor.
     *
     * @param \JEventDispatcher $subject
     * @param array             $config
     */
    public function __construct(&$subject, $config = array())
    {
        parent::__construct($subject, $config);

        $pattern = JPATH_ROOT . '/templates/visualtheme/template_bootstrap.php';
        
       /* echo'<pre>';print_r( $pattern );echo'</pre>'.__FILE__.' '.__LINE__;
        
        die(__FILE__ .' '. __LINE__ );*/

        array_map([$this, 'loadFile'], glob($pattern) ?: array());
    }

    /**
     * Loads a file.
     *
     * @param  string $file
     * @return void
     */
    public function loadFile($file)
    {
        require $file;
    }
}
