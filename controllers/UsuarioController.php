<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\Institucion;
use app\models\Contacto;
use app\models\Direccion;
use app\models\Representante;
use app\models\Curso;
use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user = new Usuario();
        $inst = new Institucion();
        $cont = new Contacto();
        $dir = new Direccion();
        $repr = new Representante();

        $institucion = ArrayHelper::map(Institucion::find()->all(),'id_institucion','nombre');

        if ($user->load(Yii::$app->request->post())   && $cont->load(Yii::$app->request->post()) && $dir->load(Yii::$app->request->post()) && $repr->load(Yii::$app->request->post()) ){
            
            $user->save();
           
            $cont->Usuarioid_usuario = $user->id_usuario;
            $dir->Usuarioid_usuario = $user->id_usuario;
            $repr->Usuarioid_usuario = $user->id_usuario;

            if($repr->save() && $cont->save() && $dir->save()){
                 return $this->redirect(['view', 'id' => $user->id_usuario]);
            }else{
                return $this->redirect(['index', 'id' => $user->id_usuario]);
            }

        } else {
            return $this->render('create', [
                'user' => $user,
                'cont' => $cont,
                'dir' => $dir,
                'repr' => $repr,
                'institucion' => $institucion,
            ]);
        }
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_usuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
