<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
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
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Security Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/security_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('paginate'))
{	
	/**
	 * @Purpose - Create Pagination bootstrap links
	 * @params - $subCategoryType , $subCategoryId
	 */	
	function paginate($item_per_page, $current_page, $total_records, $total_pages)
	{
		$pagination = '';
		if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
			$pagination .= '<ul class="pagination pull-right">';			
			$right_links    = $current_page + 3; 
			$previous       = $current_page - 1; //previous link 
			$next           = $current_page + 1; //next link
			$first_link     = true; //boolean var to decide our first link
			
			if($current_page > 1){
				$previous_link = ($previous==0)?1:$previous;
				$pagination .= '<li class="first"><a href="#" data-page="1" title="First">First</a></li>'; //first link
				$pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">Previous</a></li>'; //previous link
					for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
						if($i > 0){
							$pagination .= '<li><a href="javascript:void(0);" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
						}
					}   
				$first_link = false; //set first link to false
			}
			
			if($first_link){ //if current active page is first link
				$pagination .= '<li class="first active"><a href="javascript:void(0);">'.$current_page.'</a></li>';
			}elseif($current_page == $total_pages){ //if it's the last active link
				$pagination .= '<li class="last active"><a href="javascript:void(0);">'.$current_page.'</a></li>';
			}else{ //regular current link
				$pagination .= '<li class="active"><a href="javascript:void(0);">'.$current_page.'</a></li>';
			}
					
			for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
				if($i<=$total_pages){
					$pagination .= '<li><a href="javascript:void(0);" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
				}
			}
			if($current_page < $total_pages){ 
					$next_link = ($i > $total_pages)? $total_pages : $i;
					$pagination .= '<li><a href="javascript:void(0);" data-page="'.$next_link.'" title="Next">Next</a></li>'; //next link
					$pagination .= '<li class="last"><a href="javascript:void(0);" data-page="'.$total_pages.'" title="Last">Last</a></li>'; //last link
			}
			
			$pagination .= '</ul>'; 
		}
		return $pagination; //return pagination links
	}
}