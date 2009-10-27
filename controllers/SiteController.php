<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination ;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Category;
use app\models\Products;
use app\models\Testimonials;

class SiteController extends Controller
{
    public $pageLimit = 3;
    public $params;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $products = Products::find()->where(array( 'front_page_view'=>1) )->all();            
        return $this->render('index',array('products'=>$products));
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionListing()
    {        
        $category = isset( $_REQUEST['category'] ) ? $_REQUEST['category'] : '';
        
        Yii::$app->view->params['breadcrumbs'] = [
            [
                'label' => $category,
                'url' => ['site/listing', 'category' => $category],
                'template' => "<li><b>{link}</b></li>\n", // template for this link only
            ]            
        ];
        Yii::$app->view->params['page_title'] = $category;
        
        if( !empty($category)){
            $categoryId = Category::findOne(array('category_name'=>$category))['category_id'];            
            $products = Products::find()->where(array( 'product_category'=>$categoryId) );            
            $pages = new Pagination(['totalCount' => $products->count()]); 
            $pages->defaultPageSize = $this->pageLimit;
            $products = $products->orderBy(array('priority'=>'desc'))->offset($pages->offset)->limit($pages->limit)->all();             
            return $this->render('listing', array('products'=>$products,'pages'=>$pages,'category' => $category ,'categoryId'=>$categoryId));
        }else{
            return $this->render('index');
        }
    }
    
    public function actionProduct(){
        $product_id = isset( $_REQUEST['product_id'] ) ? $_REQUEST['product_id'] : '';
        
        if (!empty($product_id)) {
            $product = Products::findOne(array('product_id' => $product_id));
            $category = Category::findOne(array('category_id' => $product->product_category));
            
            Yii::$app->view->params['breadcrumbs'] = [
                [
                    'label' => ucfirst( $category->category_name  ),
                    'url' => ['site/listing', 'category' => $category->category_name],
                    'template' => "<li><b>{link}</b></li>\n", // template for this link only
                ],
                [
                    'label' => ucfirst( strtolower($product->product_name) ),
                    'url' => ['site/product', 'product_id' => $product->product_id],
                    'template' => "<li><b>{link}</b></li>\n", // template for this link only
                ],
            ];

            return $this->render('product', array('product' => $product));
        }
    }
    
    public function actionTestimonials() {
        $testimonials = Testimonials::find()->where(array('approved'=>1));        
        $pages = new Pagination(['totalCount' => $testimonials->count()]);
        $pages->defaultPageSize = 7;
        $testimonials = $testimonials->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('testimonials', array('testimonials' => $testimonials, 'pages' => $pages));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
