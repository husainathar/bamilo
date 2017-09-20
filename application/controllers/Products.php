<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', '', TRUE);
        $this->load->helper(array("url","form"));
    }

    private function getCategoryTreeForParentId($parent_id = NULL) {
        $categories = array();
        $this->db->from('categories');
        $this->db->where('parent_id', $parent_id);
        $result = $this->db->get()->result();
        foreach ($result as $mainCategory) {
            $category = array();
            $category['category_id'] = $mainCategory->category_id;
            $category['category_name'] = $mainCategory->category_name;
            $category['parent_id'] = $mainCategory->parent_id;
            $category['sub_categories'] = $this->getCategoryTreeForParentId($category['category_id']);
            $categories[$mainCategory->category_id] = $category;
        }
        return $categories;
    }

    public function searchProduct()
    {
        if($this->input->post("categoryId") !== null and $this->input->post("attributes") !== null){
            $attributes = json_decode($this->input->post("attributes"), true);
            $categoryId = $this->input->post("categoryId", TRUE);
            $data = [];
            if(!empty($attributes)){
                $data['products'] = $this->Product_model->searchProductsByAttributes($categoryId, $attributes);
            }else{
                $data['products'] = $this->Product_model->getProducts(array('p.category_id'=>$categoryId));
            }
            echo $this->load->view("products_list", $data, true);
        }
    }

	public function index()
	{
        $categoryId = $this->uri->segment(2,"");
        $searchByCategory = array();
        if($categoryId != ""){
            //Get attributes specific to category
            $attributesRS = $this->Product_model->getAttributes($categoryId);
            $attributes = array();
            if(!empty($attributesRS)){
                $prevAttributeId = null;
                foreach($attributesRS as $row){
                    $attributeId = $row['attribute_id'];
                    if($prevAttributeId != $attributeId){
                        $attributes[$attributeId]['attribute_name'] = $row['attribute_name'];
                    }
                    $attributes[$attributeId]['options'][$row['attribute_options_info_id']] = $row['option'];
                    $prevAttributeId = $attributeId;
                }
            }
            $data['attributes'] = $attributes;
            $searchByCategory = array('p.category_id'=>$categoryId);
        }
        $data['categoryId'] = $categoryId;
        $data['products'] = $this->Product_model->getProducts($searchByCategory);
        $data['categories'] = $this->getCategoryTreeForParentId();
        $this->load->view("shop", $data);
	}

	public function getProductDetails()
    {
        $productId = $this->uri->segment(2,"");
        if(trim($productId)!=""){
            $data['products'] = $this->Product_model->getProducts(array('p.product_id'=>$productId));
            $attributesRS = $this->Product_model->getProductAttributes($productId);
            $attributes = array();
            if(!empty($attributesRS)){
                $prevAttributeId = null;
                foreach($attributesRS as $row){
                    $attributeId = $row['attribute_id'];
                    if($prevAttributeId != $attributeId){
                        $attributes[$attributeId]['attribute_name'] = $row['attribute_name'];
                    }
                    $attributes[$attributeId]['options'][$row['attribute_options_info_id']] = $row['option'];
                    $prevAttributeId = $attributeId;
                }
            }
            $data['attributes'] = $attributes;
            $this->load->view("product_details", $data);
        }else{
            exit('Invalid request');
        }
    }
}