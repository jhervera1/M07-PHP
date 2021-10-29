
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
    public function showProducts(){
     
        foreach ($this->productsArray as $valor){ ?>
            <tr><th> <?php echo $valor->getName(); ?></th><th><?php echo $valor->getPrice(); ?></th>
            <th><a href='../modifyProd.php?id=".$valor->getId()."'><img  class='amd_icon' src='imgs/edit_icon.png'> </a>
            <a href='../deleteProd.php?pid=".$valor->getId()."'><img  class='amd_icon' src='imgs/delete_icon.png'></a> </th> </tr>
        <?php
        }
    }

    function getProducts(){
        return $this->productsArray;
    }
    function modifyProduct($prod){
        //modify 
        $sql2 = "UPDATE productos SET Nombre='".$prod->getName()."', Precio='".$prod->getPrice()."', Disponibilidad='".$prod->getAvailability()."' where ID='".$prod->getId()."'";
        $res=mysqli_query($this->bd->getConnection(),$sql2);
        if ($res === TRUE) {
            $this->fetchAllProducts();
            header("Location:adminProds.php");
        }else {
            echo "ERROR";
        }
    }
    function deleteProduct($id){
        $sql3 = "DELETE FROM productos WHERE `ID` =".$id ;
        $res=mysqli_query($this->bd->getConnection(),$sql3);
        if ($res === TRUE) {
            $this->fetchAllProducts();
            header("Location:adminProds.php");
        }else {
            echo "ERROR";
        }
    }

    function addProduct($prodName,$price,$available){
        
        $sql4 = "INSERT INTO productos (ID,Nombre,Precio,Disponibilidad) VALUES (NULL,'".$prodName."',".$price.",".$this->convertCheckIntoBool($available).")";
        echo $sql4;
        $res=mysqli_query($this->bd->getConnection(),$sql4);
        if ($res === TRUE) {
            $this->fetchAllProducts();
            header("Location:adminProds.php");
        }else {
            echo "ERROR";
        }
    }
    private function convertCheckIntoBool($available)
    {
        $aval;
        if($available == 'on'){
            return $aval = 1;
        }else{
            return $aval = 0;
        }
    }
}

?>

