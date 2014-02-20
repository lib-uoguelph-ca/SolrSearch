<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 cc=80; */

/**
 * @package     omeka
 * @subpackage  solr-search
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

class ResultsControllerTest_Pagination extends SolrSearch_Case_Default
{


    protected $_isAdminTest = false;


    /**
     * When the number of results exceeds the page length, the maximum number
     * of results and the pagination should be displayed.
     */
    public function testPagination()
    {

        // Set public page length to 2.
        set_option('per_page_public', 2);

        $item1 = $this->_item(true, 'Item 1');
        $item2 = $this->_item(true, 'Item 2');
        $item3 = $this->_item(true, 'Item 3');
        $item4 = $this->_item(true, 'Item 4');
        $item5 = $this->_item(true, 'Item 5');
        $item6 = $this->_item(true, 'Item 6');

        // --------------------------------------------------------------------

        // Page 1.
        $this->dispatch('solr-search/results');

        // Should list items 1-2.
        $this->assertXpath('//a[@href="'.record_url($item1).'"]');
        $this->assertXpath('//a[@href="'.record_url($item2).'"]');

        // Should _just_ list items 1-2.
        $this->assertXpath('//div[@class="solr-result"]', 2);

        // Should link to page 2.
        $next = public_url('solr-search/results?page=2');
        $this->assertXpath('//a[@href="'.$next.'"]');

        $this->resetResponse();
        $this->resetRequest();

        // --------------------------------------------------------------------

        // Page 2.
        $this->request->setMethod('GET')->setParam('page', '2');
        $this->dispatch('solr-search/results');

        // Should list items 3-4.
        $this->assertXpath('//a[@href="'.record_url($item3).'"]');
        $this->assertXpath('//a[@href="'.record_url($item4).'"]');

        // Should _just_ list items 3-4.
        $this->assertXpath('//div[@class="solr-result"]', 2);

        // Should link to page 3.
        $next = public_url('solr-search/results?page=3');
        $this->assertXpath('//a[@href="'.$next.'"]');

        $this->resetResponse();
        $this->resetRequest();

        // --------------------------------------------------------------------

        // Page 3.
        $this->request->setMethod('GET')->setParam('page', '3');
        $this->dispatch('solr-search/results');

        // Should list items 5-6.
        $this->assertXpath('//a[@href="'.record_url($item5).'"]');
        $this->assertXpath('//a[@href="'.record_url($item6).'"]');

        // Should _just_ list items 5-6.
        $this->assertXpath('//div[@class="solr-result"]', 2);

        // Should link back to page 2.
        $prev = public_url('solr-search/results?page=2');
        $this->assertXpath('//a[@href="'.$prev.'"]');

    }


}
