<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

    public $teamID = 2;

	/**
	 * Class constructor
	 *
	 * @link	https://github.com/bcit-ci/CodeIgniter/issues/5332
	 * @return	void
	 */
	public function __construct()
    {
        $this->team = $this->db
            ->select("*")
            ->from('teams')
            ->where('id', $this->teamID)
            ->get()
            ->result_array()[0];
    }

	/**
	 * __get magic
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string	$key
	 */
	public function __get($key)
	{
		// Debugging note:
		//	If you're here because you're getting an error message
		//	saying 'Undefined Property: system/core/Model.php', it's
		//	most likely a typo in your model code.
		return get_instance()->$key;
	}

    /**
     * @param $query CI_DB_query_builder
     * @param $searchableCols array
     * @param $orderableCols - Some columsn cannot be ordered by ALIAS (e.g Datetime columns)
     */
    public function datatablesQuery(&$query, $searchableCols, $orderableCols)
    {
        $post = $this->input->post();

        $dataTablesColumns = $post['columns'];

        /**
         * ORDER
         * Find column name (the same used in query)
         */
        $orderColNumber     = $post['order'][0]['column'];
        $orderColDirection  = $post['order'][0]['dir'];

        $exists = array_key_exists($dataTablesColumns[$orderColNumber]['data'], $orderableCols);

        // Some columns cannot be ordered BY alias, make an array with alias->colName
        // to avoid bug. e.g DATETIME columns.
        if ($exists) {
            $orderCol = $orderableCols[$dataTablesColumns[$orderColNumber]['data']];
        }else{
            $orderCol = $dataTablesColumns[$orderColNumber]['data'];
        }

        $query->order_by(
            $orderCol,
            $orderColDirection
        );

        /**
         * SEARCH
         */
        $textToSearch = $post['search']['value'];

        if ( !empty($textToSearch) )
        {
            $query->group_start();
            foreach ($searchableCols as $col)
            {
                $query->or_where($col.' LIKE', '%'.$textToSearch.'%');
            }
            $query->group_end();
        }
    }

}
