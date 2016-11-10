<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 10-Nov-16
 * Time: 1:58 PM
 */
namespace Magestore\HelloMagento\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class ListCollectionObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $collection = $observer->getEvent()->getCollection();

        foreach ($collection as $product)
        {
            $product->setPrice(100);
            $product->setFinalPrice(100);
        }

        $id_product = $observer->getData('product_id');
        $price_product = $observer->getData('new_price');
        $status_product = $observer->getData('status');

        $servername = "localhost:81";
        $username = "username";
        $password = "password";
        $dbname = "magento";

        // Create connection, có lỗi ở đây, báo không có class mysqli
        $conn = mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT product_id, new_price, status FROM magestore_magento";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<br> Product Id: ". $row["product_id"]. " - Name: ". $row["new_price"]. " " . $row["status"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();

        \Zend_Debug::dump("List Collection");
        \Zend_Debug::dump($id_product);
        \Zend_Debug::dump($price_product);
        \Zend_Debug::dump($status_product);

        die;
    }
}