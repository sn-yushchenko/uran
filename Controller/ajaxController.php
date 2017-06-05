<?php
class ajaxController{
    public function __construct()
    {
        
    }
    public function actionNewProduct()
    {
        if(!empty($_POST) || !empty($_FILES))
        {
            $category=$_POST['category'];
            $type=$_POST['type'];
            $name=$_POST['name'];
            $description=$_POST['description'];  
            $name_file=trim(mb_strtolower($_FILES["photo"]["name"]));
            $tmp_name=$_FILES["photo"]["tmp_name"];
            move_uploaded_file($tmp_name, ROOT."/image/$name_file");
            $path="/uran/image/$name_file"; 
        }
        modelProduct::insertProduct($type,$category,$name,$description,$path);
        return true;
    }
    public function actionSearchProduct()
    {
        if(!empty($_POST['search']))
        {
            $search=$_POST['search'];
            $prod=modelProduct::searchProduct($search);
            if(!empty($prod))
            {
                foreach($prod as $key=>$value){
                echo '<li class="clearfix"><image class="photo" src="'.$value["image"].'" alt="нет фото"></image>
                    <div class="descr">
                        <div class="descrName"><b>'.$value['name'].' </b></div>
                        <div class="descrDescr">'.$value['description'].'</div>
                    </div></li>';
                }
            }
            else
            {
                echo "Ничего не найдено!";
            }   
        }
         
       return true; 
    }
    public function actionDeleteProduct()
    {
           $id=$_POST['id'];
           modelProduct::deleteProduct($id); 
           echo true; 
           return true; 
    }
    
     public function actionEditProduct()
    {
         $id=$_POST['id'];
         $name=$_POST['name'];
         $type=$_POST['type'];
         $category=$_POST['category'];
         $description=$_POST['description'];
         modelProduct::editProduct($id,$name,$type,$category,$description);
         return true; 
    }
}
?>