
<?php
 include 'accessBD.php';
 include_once 'models/products.php';
class ControlProducts{

   

    private $productsArray = array();
    private $productsAvailable = array();
    private $bd;

    public function __construct() {

        $this->bd = new AccessBD();
        $this->fetchAllProducts();
        //$this->showProducts();
        $this->fetchAvailableProducts();
    }

    private function fetchAllProducts(){
        unset($productsArray);
        $sql = "SELECT * FROM productos where 1";
        $res=mysqli_query($this->bd->getConnection(),$sql);
        while($row= $res->fetch_assoc()){
            $product = new Product();
            $product->setId($row['ID']);
            $product->setName($row['Nombre']);
            $product->setPrice($row['Precio']);
            $product->setAvailability($row['Disponibilidad']);
        
            $this->productsArray[] = $product;
        }
    }
    private function fetchAvailableProducts(){
        unset($productsAvailable);
        $sql = "SELECT * FROM productos where Disponibilidad = 1";
        $res=mysqli_query($this->bd->getConnection(),$sql);
        while($row= $res->fetch_assoc()){
            $product = new Product();
            $product->setId($row['ID']);
            $product->setName($row['Nombre']);
            $product->setPrice($row['Precio']);
            $product->setAvailability($row['Disponibilidad']);
        
            $this->productsAvailable[] = $product;
        }
    }
    public function showProducts($user){
     
        foreach ($this->productsArray as $valor){
            echo "<tr><th>".$valor->getName()."</th><th>".$valor->getPrice()."</th>";
            echo "<th><a href='../modifyProd.php?id=".$valor->getId()."&user=".$user."'><img  class='amd_icon' src='imgs/edit_icon.png'> </a>";
            echo "<a href='../deleteProd.php?pid=".$valor->getId()."&user=".$user."'><img  class='amd_icon' src='imgs/delete_icon.png'></a> </th> </tr>";
        }
    }

    function getProducts(){
        return $this->productsArray;
    }
    function modifyProduct($prod,$user){
        //modify 
        $sql2 = "UPDATE productos SET Nombre='".$prod->getName()."', Precio='".$prod->getPrice()."', Disponibilidad='".$prod->getAvailability()."' where ID='".$prod->getId()."'";
        $res=mysqli_query($this->bd->getConnection(),$sql2);
        if ($res === TRUE) {
            $this->fetchAllProducts();
            header("Location:adminProds.php?user=".$user);
           }else {
            echo "ERROR";
           }
    }
    function deleteProduct($id,$user){
        $sql3 = "DELETE FROM productos WHERE `ID` =".$id ;
        $res=mysqli_query($this->bd->getConnection(),$sql3);
        if ($res === TRUE) {
            $this->fetchAllProducts();
            header("Location:adminProds.php?user=".$user);
           }else {
            echo "ERROR";
           }
    }

    function addProduct(){

    }
}

?>

