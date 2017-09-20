<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getProducts($search = array())
    {
        if(!empty($search)){
            foreach ($search as $column => $value){
                if($column!="ignore"){
                    if(is_array($value)){
                        $this->db->where_in($column, $value);
                    }else{
                        $this->db->where($column, $value);
                    }
                }else{
                    foreach($value as $ignoreColumn => $ignoreValue){
                        if(is_array($ignoreValue)){
                            $this->db->where_not_in($ignoreColumn, $ignoreValue);
                        }else{
                            $this->db->where_not_in($ignoreColumn, $ignoreValue);
                        }
                    }
                }
            }
        }
        $this->db->select('p.*')
                 ->from('products p');
        return $this->db->get()->result_array();
    }


    public function getCategories($search = array())
    {
        if(!empty($search)){
            foreach ($search as $column => $value){
                if($column!="ignore"){
                    if(is_array($value)){
                        $this->db->where_in($column, $value);
                    }else{
                        $this->db->where($column, $value);
                    }
                }else{
                    foreach($value as $ignoreColumn => $ignoreValue){
                        if(is_array($ignoreValue)){
                            $this->db->where_not_in($ignoreColumn, $ignoreValue);
                        }else{
                            $this->db->where_not_in($ignoreColumn, $ignoreValue);
                        }
                    }
                }
            }
        }
        $this->db->select('c.*')
            ->from('categories c')
            ->where('c.is_active', 1);
        return $this->db->get()->result_array();
    }

    public function getAttributes($categoryId)
    {
        $this->db->select('attr.attribute_id, attr.attribute_name, aoi.attribute_options_info_id, aoi.option')
            ->from('attributes attr')
            ->join('attribute_options_info aoi', 'aoi.attribute_id = attr.attribute_id', 'left')
            ->where('attr.category_id', $categoryId)
            ->order_by('attr.attribute_id', 'asc');
        return $this->db->get()->result_array();
    }

    public function getProductAttributes($productId)
    {
        $this->db->select('attr.attribute_id, attr.attribute_name, aoi.attribute_options_info_id, aoi.option')
            ->from('attributes attr')
            ->join('attribute_options_info aoi', 'aoi.attribute_id = attr.attribute_id', 'inner')
            ->join('product_attribute_info pai', 'pai.attribute_options_info_id = aoi.attribute_options_info_id', 'inner')
            ->where('pai.product_id', $productId)
            ->order_by('attr.attribute_id', 'asc');
        return $this->db->get()->result_array();
    }

    public function searchProductsByAttributes($categoryId, $attributes)
    {
        $this->db->distinct('pai.product_id');
        $this->db->select('p.*')
            ->from('product_attribute_info pai')
            ->join('products p', 'pai.product_id = p.product_id')
            ->where('p.category_id', $categoryId)
            ->where_in('pai.attribute_options_info_id', $attributes);
        return $this->db->get()->result_array();
    }

			
	public function getBlogDetails($search = array())
    {
        $this->db->select('bri.blog_id, COUNT(*) AS blog_comments_count')
            ->from('blog_reply_info bri')
            ->where('bri.is_active', 1)
            ->group_by('bri.blog_id');
        $subQuery = $this->db->get_compiled_select();
        if(!empty($search)){
            foreach ($search as $column => $value){
                if($column!="ignore"){
                    if(is_array($value)){
                        $this->db->where_in($column, $value);
                    }else{
                        $this->db->where($column, $value);
                    }
                }else{
                    foreach($value as $ignoreColumn => $ignoreValue){
                        if(is_array($ignoreValue)){
                            $this->db->where_not_in($ignoreColumn, $ignoreValue);
                        }else{
                            $this->db->where_not_in($ignoreColumn, $ignoreValue);
                        }
                    }
                }
            }
        }
        $this->db->select('bi.*, bcm.category_name, IFNULL(bri.blog_comments_count,0) AS blog_comments_count')
                 ->from('blog_info bi')
                ->join('blog_category_master bcm', 'bcm.blog_category_id = bi.blog_category_id', 'left')
                 ->join("($subQuery) bri",'bri.blog_id = bi.blog_id', 'left');
        return $this->db->get()->result_array();
    }

    public function getBlogComments($search)
    {
        if(!empty($search)) {
            foreach ($search as $column => $value) {
                if ($column != "ignore") {
                    if (is_array($value)) {
                        $this->db->where_in($column, $value);
                    } else {
                        $this->db->where($column, $value);
                    }
                } else {
                    foreach ($value as $ignoreColumn => $ignoreValue) {
                        if (is_array($ignoreValue)) {
                            $this->db->where_not_in($ignoreColumn, $ignoreValue);
                        } else {
                            $this->db->where_not_in($ignoreColumn, $ignoreValue);
                        }
                    }
                }
            }
        }
        $this->db->select('bri.*')->from('blog_reply_info bri');
        return $this->db->get()->result_array();
    }

    public function getBlogTags($search)
    {
        if(!empty($search)) {
            foreach ($search as $column => $value) {
                if ($column != "ignore") {
                    if (is_array($value)) {
                        $this->db->where_in($column, $value);
                    } else {
                        $this->db->where($column, $value);
                    }
                } else {
                    foreach ($value as $ignoreColumn => $ignoreValue) {
                        if (is_array($ignoreValue)) {
                            $this->db->where_not_in($ignoreColumn, $ignoreValue);
                        } else {
                            $this->db->where_not_in($ignoreColumn, $ignoreValue);
                        }
                    }
                }
            }
        }
        $this->db->select('bt.*')->from('blog_tags bt');
        return $this->db->get()->result_array();
    }

    public function saveBlogComments($inputData)
    {
        $tStatus = FALSE;
        if(!empty($inputData)){
            $insStatus = $this->db->insert('blog_reply_info', $inputData);
            if($insStatus){
                $tStatus = TRUE;
            }
        }
        return $tStatus;
    }

    public function saveBlogPost($inputData)
    {
        $tStatus = FALSE;
        if(!empty($inputData)){
            $insStatus = $this->db->insert('blog_info', $inputData);
            if($insStatus){
                $tStatus = $this->db->insert_id();
            }
        }
        return $tStatus;
    }

    public function updateBlogPost($inputData, $blogId)
    {
        $tStatus = FALSE;
        if(!empty($inputData)){
            $this->db->where('blog_id', $blogId);
            $this->db->update('blog_info', $inputData);
        }
        return $tStatus;
    }

    public function saveBlogTags($tags, $blogId)
    {
        $errorFlag = [];
        if(!empty($tags)){
            for($i=0;$i<count($tags);$i++){
                if(trim($tags[$i])!=""){
                    $tagData = array('blog_id'=>$blogId, 'tag_name'=>$tags[$i]);
                    $insStatus = $this->db->insert('blog_tags', $tagData);
                    if(!$insStatus){
                        $errorFlag[] = FALSE;
                        break;
                    }
                }
            }
        }
        return $errorFlag;
    }
}
