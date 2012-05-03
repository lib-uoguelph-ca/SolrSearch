<?php
/**
 * SolrSearch Omeka Plugin helpers.
 *
 * Default helpers for the SolrSearch plugin
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at http://www.apache.org/licenses/LICENSE-2.0 Unless required by
 * applicable law or agreed to in writing, software distributed under the
 * License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS
 * OF ANY KIND, either express or implied. See the License for the specific
 * language governing permissions and limitations under the License.
 *
 * @package    omeka
 * @subpackage SolrSearch
 * @author     "Scholars Lab"
 * @copyright  2010 The Board and Visitors of the University of Virginia
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @version    $Id$
 * @link       http://www.scholarslab.org
 *
 * PHP version 5
 *
 */

/**
 * This contains the data for the main information for an addon.
 **/
class SolrSearch_Addon_Addon
{
    //{{{Properties

    /**
     * The name of the addon.
     *
     * @var string
     **/
    var $name;

    /**
     * The value for the result-type facet.
     *
     * @var string|null
     **/
    var $resultType;

    /**
     * The name of the table. This doesn't need to have the prefix.
     *
     * @var string
     **/
    var $table;

    /**
     * The ID column for this table. This defaults to 'id'.
     *
     * @var string
     **/
    var $idColumn;

    /**
     * If this is the child in a hierarchy, this is the parent. If this is set, 
     * this object should appear in the parent's children property.
     *
     * @var SolrSearch_Addon_Addon|null
     **/
    var $parentAddon;

    /**
     * The database key to use to get from this object to the parent.
     *
     * @var string|null
     **/
    var $parentKey;

    /**
     * Does this type implement Taggable?
     *
     * @var bool
     **/
    var $tagged;

    /**
     * If set, this is a field that acts as a visible flag. If it is set to 
     * TRUE, then the item should be indexed. Otherwise, it will be skipped.
     *
     * @var string|null
     **/
    var $flag;

    /**
     * An array list of fields in this.
     *
     * @var array of SolrSearch_Addon_Field
     **/
    var $fields;

    /**
     * An array list of children of this addon.
     *
     * @var array of SolrSearch_Addon_Addon
     **/
    var $children;

    //}}}

    function __construct(
        $name=null, $resultType=null, $table=null, $idColumn='id', 
        $parentAddon=null, $parentKey=null, $tagged=false, $flag=null
    ) {
        $this->name        = $name;
        $this->resultType  = $resultType;
        $this->table       = $table;
        $this->idColumn    = $idColumn;
        $this->parentAddon = $parentAddon;
        $this->parentKey   = $parentKey;
        $this->tagged      = $tagged;
        $this->flag        = $flag;
        $this->fields      = array();
        $this->children    = array();
    }
}

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * End:
 */
