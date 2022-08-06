<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\db\Expression;
use backend\models\Menu;
use backend\models\MenuTitle;
use backend\models\MenuElement;
use yii\filters\AccessControl;
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'create', 'update', 'delete', 'view', 'menutitle', 'menuelem'],
                        'allow' => true,
                        'roles' => ['super-admin', '@'],
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = Product::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy(['id' => SORT_DESC])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $name = uniqid();
        $link = time()*36*3600;
        $productname = uniqid();
        $model = new Product();
        $path = '../../frontend/web/img/product/'.$productname;
        if ($model->load(Yii::$app->request->post())) {
            $model->photo = UploadedFile::getInstances($model, 'photo');
            foreach ($model->photo as $key => $file) {

                $file->saveAs($path. md5($file->baseName) . '.' . $file->extension);//Upload files to server
                $model->urls .= $path. md5($file->baseName) . '.' . $file->extension.'**';//Save file names in database- '**' is for separating images
                $model->photo = $path. md5($file->baseName) . '.' . $file->extension;
            }
            $model->user_id = Yii::$app->user->identity->id;
            $model->link = $name.''.$link;
            $model->save();            

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionMenutitle($id)
    {
        $count = MenuTitle::find()->where(['menu_id'=>$id])->all();
        $cities = MenuTitle::find()->where(['menu_id'=>$id])->all();
        if ($count > 0) {
            echo "<option>".Yii::t('app','Выбрать титул меню')."</option>";
            foreach ( $cities as $city ) {
                echo "<option value='".$city->id."'>".$city->name_ru."</option>";
            }
        }
        else    echo "<option>".Yii::t('app','Выбрать титул меню')."</option>";
    }
    
    public function actionMenuelem($id)
    {
        $counte = MenuElement::find()->where(['menu_title_id'=>$id])->all();
        $citiese = MenuElement::find()->where(['menu_title_id'=>$id])->all();
        if ($counte > 0) {
            echo "<option>".Yii::t('app','Выбрать элемент меню')."</option>";
            foreach ( $citiese as $citye ) {
                echo "<option value='".$citye->id."'>".$citye->name_ru."</option>";
            }
        }
        else    echo "<option>".Yii::t('app','Выбрать элемент меню')."</option>";
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
