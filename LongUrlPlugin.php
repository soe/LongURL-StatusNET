<?php
/**
 * StatusNet, the distributed open-source microblogging tool
 *
 * Plugin to enable client side url shortening in the status box
 *
 * PHP version 5
 *
 * LICENCE: This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  Plugin
 * @package   StatusNet
 * @author    Soe Thia <@soeim>
 * @copyright 2009 Free Software Foundation, Inc http://www.fsf.org
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://status.net/
 */

if (!defined('STATUSNET') && !defined('LACONICA')) {
    exit(1);
}

class LongUrlPlugin extends Plugin
{

    public $expandMethod;
    
    function __construct($method='smart')
    {
        $this->expandMethod = $expandMethod;
        parent::__construct();
    }

    function onEndShowScripts($action){
        $action->script($this->path('jquery.longurlplease.min.js'));
        $action->inlineScript('$(\'.entry-content\').longurlplease({lengthenShortUrl:\''.$this->expandMethod.'\'});');
            
    }

    function onPluginVersion(&$versions)
    {
        $versions[] = array('name' => 'LongUrl',
                            'version' => STATUSNET_VERSION,
                            'author' => 'Soe Thiha',
                            'homepage' => 'http://status.net/wiki/Plugin:LongUrl',
                            'rawdescription' => 'Render long URLs on client side using http://longurlplease.com APIs'
                            );
        return true;
    }
}
