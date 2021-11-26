
<?php
 include_once 'accessBD.php';
 include_once 'controlUsers.php';
 include_once 'models/products.php';
class ControlProducts{

   

    private $productsArray = array();
    private $productsAvailable = array();
    private $bd;
    private $ctrlUsers;
  

    public function __construct() {

        $this->ctrlUsers = new ControlUsers(); 
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
            $product->setImg($row['Image']);
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
            $product->setImg($row['Image']);
            $this->productsAvailable[] = $product;

        }

    }
    public function showProducts(){

        $showedArray = $this->getProducts(); 
        foreach ($showedArray as $valor){?>
     
            <tr><th><img class="products_image" src="<?php echo $valor->getImg();?>"></th><th> <?php echo $valor->getName(); ?></th><th><?php echo $valor->getPrice(); ?></th>
            <?php if($this->ctrlUsers->checkAdmin()){?> <th><a href='../modifyProd.php?id=<?php echo $valor->getId(); ?>'><img  class='amd_icon' src='imgs/edit_icon.png'> </a>
            <a href='../deleteProd.php?pid=<?php echo $valor->getId(); ?>'><img  class='amd_icon' src='imgs/delete_icon.png'></a> </th> </tr>
            
            <?php
            }
            if(!$this->ctrlUsers->checkAdmin()){?>
                <th><a href='../details.php?pid=<?php echo $valor->getId(); ?>'><img  class='amd_icon' src='imgs/show_icon.jpg'></a> </th> </tr>
            <?php }
        }
    }

    function getProducts(){
        if($this->ctrlUsers->checkAdmin()){
        return $this->productsArray;
        }else{
            return $this->productsAvailable; 
        }
    }
    function modifyProduct($prod){
        
        $sql = "UPDATE productos SET Nombre='".$prod->getName()."', Precio='".$prod->getPrice()."', Disponibilidad='".$prod->getAvailability()."' where ID='".$prod->getId()."'";
        $res=mysqli_query($this->bd->getConnection(),$sql);
        if ($res === TRUE) {
            $this->fetchAllProducts();
            header("Location:adminProds.php");
        }else {
            echo "ERROR";
        }
    }
    function deleteProduct($id){
        $sql = "DELETE FROM productos WHERE `ID` =".$id ;
        $res=mysqli_query($this->bd->getConnection(),$sql);
        if ($res === TRUE) {
            $this->fetchAllProducts();
            header("Location: adminProds.php");
        }else {
            echo "ERROR";
        }
    }

    function addProduct($prodName,$price,$available,$src){
        
        $sql = "INSERT INTO productos (ID,Nombre,Precio,Disponibilidad,`Image`) VALUES (NULL,'".$prodName."',".$price.",".$this->convertCheckIntoBool($available).",'".$src."')";
        $res=mysqli_query($this->bd->getConnection(),$sql);
        if ($res === TRUE) {
            $this->fetchAllProducts();
            header("Location: adminProds.php");
        }else {
            echo "ERROR";
        }
    }
    private function convertCheckIntoBool($available)
    {
        if($available == 'on'){
            return 1;
        }else{
            return 0;
        }
    }

    public function findProdById($id){

        foreach($this->productsAvailable as $prod){
            if($prod->getId() == $id){
                return $prod;
            }
        }

    }

}

?>

