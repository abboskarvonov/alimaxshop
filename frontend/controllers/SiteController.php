<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Product;
use backend\models\Shop;
use yii\db\Expression;
use backend\models\Menu;
use backend\models\MenuTitle;
use backend\models\MenuElement;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
     * {@inheritdoc}
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
     * @return mixed
     */
    public function actionIndex()
    {
        $product = Product::find()->orderBy(['id' => SORT_DESC])->limit(12)->all();
        $product1 = Product::find()->orderBy(['id' => SORT_DESC])->offset(12)->limit(12)->all();
        $product2 = Product::find()->orderBy(['id' => SORT_DESC])->offset(24)->limit(12)->all();
        $sale = Product::find()->where(['sale' => '1'])->orderBy(['id' => SORT_DESC])->limit(12)->all();
        return $this->render('index', [
            'product' => $product,
            'product1' => $product1,
            'sale' => $sale,
            'product2' => $product2,
        ]);
    }

    public function actionCategoryall($link) {
        $menu = Menu::find()->where(['link' => $link])->all();
        foreach ($menu as $m) {}
        $menutitle = MenuTitle::find()->where(['menu_id' => $m->id])->all();
        $product = Product::find()->where(['menu' => $m->id])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('categoryall', [
            'menu' => $menu,
            'menutitle' => $menutitle,
            'product' => $product,
        ]);
    }
    
    public function actionCategory($link) {
        $menutitle = MenuTitle::find()->where(['link' => $link])->all();
        foreach ($menutitle as $m) {}
        $menuelement = MenuElement::find()->where(['menu_title_id' => $m->id])->all();
        $product = Product::find()->where(['menu_title' => $m->id])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('category', [
            'menutitle' => $menutitle,
            'product' => $product,
            'menuelement' => $menuelement,
        ]);
    }

    public function actionCategoryview($link) {
        $menuelement = MenuElement::find()->where(['link' => $link])->all();
        foreach ($menuelement as $m) {}
        $menutitle = MenuTitle::find()->where(['id' => $m->menu_title_id])->all();
        foreach($menutitle as $mt){}
        $product = Product::find()->where(['menu_id' => $m->id])->andWhere(['menu_title' => $mt->id])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('categoryview', [
            'menuelement' => $menuelement,
            'product' => $product,
        ]);
    }

    public function actionView($link) 
    {

        $model = Product::find()->where(['link' => $link])->all();
        foreach($model as $mod) {}
        $shop = Shop::find()->where(['id' => $mod->shop_id])->all();
        foreach($shop as $sh){}
        $productshop = Product::find()->where(['shop_id' => $sh->id])->orderBy([new Expression('rand()')])->limit(6)->all();
        return $this->render('view', [
            'model' => $model,
            'shop' => $shop,
            'productshop' => $productshop,
        ]);
    }

    public function actionSearch()
    {
        $name = trim(Yii::$app->request->get('name'));
        $start = Yii::$app->request->get('pricestart');
        $end = Yii::$app->request->get('priceend');
        if ($name == null) {
            Yii::$app->session->setFlash('error', Yii::t('app', "Qidirilgan so`zni kiriting!"));
        }
        elseif(!empty($name) && $start == null && $end == null){
            $product = Product::find()->where(['like', 'name_uz', $name])->orWhere(['like', 'name_ru', $name])->orderBy(['id' => SORT_DESC])->all();
            return $this->render('search',[
                'product' => $product,
            ]);
        }
        elseif(!empty($name) && !empty($start) && $end == null){
            Yii::$app->session->setFlash('error', Yii::t('app', "Maksimal narxni kiriting"));
        }
        elseif(!empty($name) && !empty($start) && !empty($end)){
            $product = Product::find()->where(['like', 'name_uz', $name])->orWhere(['like', 'name_ru', $name])->andWhere(['between', 'price', $start, $end])->orderBy(['id' => SORT_DESC])->all();
            return $this->render('search',[
                'product' => $product,
            ]);
        }
        $product = Product::find()->limit(0)->all();
        return $this->render('search',[
            'product' => $product,
        ]);

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
