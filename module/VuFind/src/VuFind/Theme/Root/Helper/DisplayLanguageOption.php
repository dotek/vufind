<?php
/**
 * DisplayLanguageOption view helper
 *
 * PHP version 5
 *
 * Copyright (C) Villanova University 2010.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @category VuFind2
 * @package  View_Helpers
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org/wiki/building_a_recommendations_module Wiki
 */
namespace VuFind\Theme\Root\Helper;
use VuFind\Translator\Translator, Zend\View\Helper\AbstractHelper;

/**
 * DisplayLanguageOption view helper
 *
 * @category VuFind2
 * @package  View_Helpers
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org/wiki/building_a_recommendations_module Wiki
 */
class DisplayLanguageOption extends AbstractHelper
{
    protected $translator;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->translator = clone(Translator::getTranslator());
        $this->translator->addTranslationFile(
            'ExtendedIni',
            APPLICATION_PATH  . '/languages/native.ini',
            'default', 'native'
        );
        $this->translator->setLocale('native');
    }

    /**
     * Translate a string
     *
     * @param string $str String to escape and translate
     *
     * @return string
     */
    public function __invoke($str)
    {
        return $this->view->escapeHtml($this->translator->translate($str));
    }
}