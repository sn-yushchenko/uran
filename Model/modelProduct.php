<?php
class modelProduct{
    
    public function __construct()
    {
       
    }
    static public function insertProduct($productType,$category,$name,$description,$image)
    {
        $pdo=connection::getConnection();
        $stmt = $pdo->prepare('INSERT INTO Product VALUES(NULL,(SELECT id FROM Product_type WHERE name = :productType),(SELECT id FROM Category WHERE name=:category),:name,:description,:image)');
        $stmt->execute(array('productType' => $productType,'category'=>$category,'name'=>$name,'description'=>$description,'image'=>$image));
    }
    static public function selectProductType()
    {
        
        $pdo=connection::getConnection();
        $stmt = $pdo->query('SELECT name FROM Product_type');
        $arr=array();
        while ($row = $stmt->fetch())
        {
            $arr[]=$row['name'];
        }
        return $arr;
    }
    
     static public function selectCategory()
    {
        $pdo=connection::getConnection();
        $stmt = $pdo->query('SELECT name FROM Category');
        $arr=array();
        while ($row = $stmt->fetch())
        {
            $arr[]=$row['name'];
        }
        return $arr;
    }
    static public function selectAllProduct()
    {
        $pdo=connection::getConnection();
        $stmt = $pdo->query('SELECT Product.id,image,Product.name,Product.description,Category.name AS category,Product_type.name AS type FROM Product LEFT JOIN Category ON Category.id=Product.category_id LEFT JOIN Product_type ON Product_type.id=Product.product_type_id');
        $prod=array();
        while ($row = $stmt->fetch())
        {
            $prod[]=$row;
        }
        return $prod;
    }
     static public function searchProduct($search)
    {
        $pdo=connection::getConnection();
        $stmt = $pdo->prepare('SELECT image,name,description FROM Product WHERE name LIKE CONCAT(:search,"%")');
         $stmt->bindValue(":search", $search);
         $stmt->execute();
        $prod=array();
        while ($row = $stmt->fetch())
        {
            $prod[]=$row;
        }
        return $prod;
    }
    static public function deleteProduct($id)
    {
        $pdo=connection::getConnection();
        $stmt = $pdo->prepare('DELETE FROM Product WHERE id=:id');
         $stmt->bindValue(":id", $id);
         $stmt->execute();
        return true;
    }
    
    static public function editProduct($id,$name,$type,$category,$description)
    {
        $pdo=connection::getConnection();
        $stmt = $pdo->prepare('UPDATE Product SET name=:name,product_type_id=(SELECT id FROM Product_type WHERE name=:type),category_id=(SELECT id FROM Category WHERE name=:category),description=:description WHERE id =:id');
         $stmt->execute(array('type'=>$type,'category'=>$category,'name'=>$name,'description'=>$description,'id'=>$id));
         return true;
    }
    
}
?>