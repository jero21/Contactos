<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\UsuarioSearch;
use app\models\Institucion;
use app\models\Conocimiento;
use app\models\NombreConocimiento;
use app\models\ConocimientoSearch;
use app\models\Contacto;
use app\models\Direccion;
use app\models\Representante;
use app\models\Curso;
use app\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;



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
        $searchModel = new ConocimientoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
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
        $modelsConocimientos = [new Conocimiento];

        $institucion = ArrayHelper::map(Institucion::find()->all(),'id_institucion','nombre');

        if ($user->load(Yii::$app->request->post()) && $cont->load(Yii::$app->request->post()) && $dir->load(Yii::$app->request->post()) && $repr->load(Yii::$app->request->post()) ){
            
            $modelsConocimientos = Model::createMultiple(Conocimiento::classname());
            Model::loadMultiple($modelsConocimientos, Yii::$app->request->post());
            
            // ajax validation
            
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsConocimientos),
                    ActiveForm::validate($user)
                );
            }
            // validate all models
            $valid = $user->validate();
            $valid = Model::validateMultiple($modelsConocimientos) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $user->save(false)) {
                        foreach ($modelsConocimientos as $modelConocimientos) {
                            $modelConocimientos->Usuarioid_usuario = $user->id_usuario;
                            if (! ($flag = $modelConocimientos->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $user->id_usuario]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }  
            $user->save();
            $cont->Usuarioid_usuario = $user->id_usuario;
            $dir->Usuarioid_usuario = $user->id_usuario;
            $repr->Usuarioid_usuario = $user->id_usuario;
            
            if($repr->save() && $cont->save() && $dir->save()){
                 return $this->redirect(['view', 'id' => $user->id_usuario]);
            }else{
                return $this->redirect(['index', 'id' => $user->id_usuario]);
            }


        }else {
            return $this->render('create', [
                'user' => $user,
                'cont' => $cont,
                'dir' => $dir,
                'repr' => $repr,
                'institucion' => $institucion,
                'modelsConocimientos' => (empty($modelsConocimientos)) ? [new Conocimiento] : $modelsConocimientos,
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
        $user = new Usuario();
        $user = $this->findModel($id);
        $modelsConocimientos = $user->conocimientos;
    
        $modelsConocimientos = Conocimiento::find()->where(['id_conocimiento'=>$user->id_usuario])->all();
        $institucion = ArrayHelper::map(Institucion::find()->all(),'id_institucion','nombre');
        $cont = Contacto::find()->where(['id_contacto'=>$user->id_usuario])->one();
        $dir = Direccion::find()->where(['id_direccion'=>$user->id_usuario])->one();
        $repr = Representante::find()->where(['id_representante'=>$user->id_usuario])->one();

        if ($user->load(Yii::$app->request->post())   && $cont->load(Yii::$app->request->post()) && $dir->load(Yii::$app->request->post()) && $repr->load(Yii::$app->request->post())) {
            
            $oldIDs = ArrayHelper::map($modelsConocimientos, 'id', 'id');
            $modelsConocimientos = Model::createMultiple(Conocimiento::classname(), $modelsConocimientos);
            Model::loadMultiple($modelsConocimientos, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsConocimientos, 'id_conocimiento', 'id_conocimiento')));

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsConocimientos),
                    ActiveForm::validate($user)
                );
            }
            // validate all models
            $valid = $user->validate();
            $valid = Model::validateMultiple($modelsConocimientos) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $user->save(false)) {
                        if (! empty($deletedIDs)) {
                            Conocimiento::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsConocimientos as $modelConocimientos) {
                            $modelConocimientos->Usuarioid_usuario = $user->id_usuario;
                            if (! ($flag = $modelConocimientos->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $user->id_usuario]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            if($repr->save() && $cont->save() && $dir->save()){
                 return $this->redirect(['view', 'id' => $user->id_usuario]);
            }else{
                return $this->redirect(['index', 'id' => $user->id_usuario]);
            }
            
        } else {
            return $this->render('update', [
                'user' => $user,
                'cont' => $cont,
                'dir' => $dir,
                'repr' => $repr,
                'institucion' => $institucion,
                'modelsConocimientos' => (empty($modelsConocimientos)) ? [new Conocimiento] : $modelsConocimientos,

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
