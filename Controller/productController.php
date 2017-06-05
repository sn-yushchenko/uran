<?php
class productController{
    public function __construct()
    {
        
    }
    public function actionAdd()
    {
        $arr=modelProduct::selectProductType();
        $arrCat=modelProduct::selectCategory();
        require_once(ROOT.'/View/Add.php');  
        return true;
    }
     public function actionEdit()
    {
        $arr=modelProduct::selectProductType();
        $arrCat=modelProduct::selectCategory();
        $prod=modelProduct::selectAllProduct();
        require_once(ROOT.'/View/Edit.php');  
        return true;
    }
    public function actionSearch()
    {
       require_once(ROOT.'/View/Search.php');  
        return true;
    }
     public function actionShow()
    {
        $prod=modelProduct::selectAllProduct();        require_once(ROOT.'/View/Show.php'); 
        return true;
    }
}
?>