<?php
require_once './Model/ProductModel.php';
require_once './Controller/Auth.php';

class HomeController
{
    private $productModel;
    public $auth;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->auth = new Auth();
    }

    public function invoke()
    {
        if (!isset($_GET['page'])) die();

        switch ($_GET['page']) {
            case 'home':
                $this->homePage();
                break;
            case 'single':
                $this->singlePage();
                break;
            case 'introduce':
                $this->introducePage();
                break;
            case 'product':
                $this->productPage();
                break;
            case 'contact':
                $this->contactPage();
                break;
            case 'search':
                $this->searchPage();
                break;
            case 'login':
                $this->loginPage();
                break;
            case 'cart':
                $this->cartPage();
                break;
            case 'order':
                $this->orderPage();
                break;
            case 'news':
                $this->newsPage();
                break;
            case 'pay':
                $this->payPage();
                break;
            case 'registration':
                $this->registrationPage();
                break;
            case 'delete':
                $this->deletePage();
                break;
        }
    }

    private function homePage()
    {
        require_once './View/home.php';
    }

    private function singlePage()
    {
        if (!isset($_GET['id'])) die();

        $product = $this->productModel->find($_GET['id']);
        require_once './View/single.php';
    }
    private function introducePage()
    {
        require_once './View/introduce.php';
    }
    private function productPage()
    {
        $productList = $this->productModel->all();
        require_once './View/product.php';
    }
    private function contactPage()
    {
        require_once './View/contact.php';
    }
    private function searchPage()
    {
        require_once './View/search.php';
    }
    private function loginPage()
    {
        require_once './View/login.php';
    }
    private function payPage()
    {
        require_once './View/pay.php';
    }
    private function cartPage()
    {
        if (isset($_GET['id'])) {
            //order 
            $productModel = new ProductModel();
            $product = $productModel->find($_GET['id']);
            create_order($product->id, $product->name, $product->image, $product->price, 1);
        }
        $productList = $_SESSION['cart'];
        require_once './View/cart.php';
    }
    private function orderPage()
    {
        require_once './Model/ProductModel.php';
        $productModel = new ProductModel();
        $productList = $productModel->all();
        require_once './View/order.php';
    }
    private function newsPage()
    {
        require_once './View/news.php';
    }
    private function registrationPage()
    {
        require_once './View/registration.php';
    }
    private function deletePage()
    {
        if (!isset($_GET['id'])) die();
        $this->categoryModel->delete($_GET['id']);

        redirect(url_pattern('homeController', 'cart'));
    }
}
