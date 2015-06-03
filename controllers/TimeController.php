<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Time;
use app\models\TimeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TimeController implements the CRUD actions for Time model.
 */
class TimeController extends Controller
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                       'only' => ['index','create','update','view'],
                       'rules' => [
                           // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            // everything else is denied
                        ],
            ],   
        ];
    }


    /**
     * Lists all Time models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TimeSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams

            );
        /*$dataProvider = $searchModel->search(Yii::$app->request->queryParams->{
            'user_id' = Yii::$app->user->getId()
        }
        );*/

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Time model.
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
     * Creates a new Time model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Time();


        //set default date
        $model->date = date("m-d-y"); 
        
        //set default arrival
        $model->arrival = '08:00';                
        
        //set default departure
        $model->departure = '17:00';                

        //set default lunch time
        $model->lunch_start = '12:00';
        $model->lunch_end = '13:00';
        $lunch_time = 1;
        
        //set default total
        $model->total = 8;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //set default date
            if (empty($model->date)){
                $model->date = date("m-d-y"); 
            }
            
            //set default arrival
            if(intval($model->arrival) === 0){
                $model->arrival = '08:00';                
            }

            //set default departure
            if(intval($model->departure) === 0){
                $model->departure = '17:00';                
            }

            //set default lunch time
            if(intval($model->lunch_start) === 0 || intval($model->lunch_end) === 0 || intval($model->lunch_start) > intval($model->lunch_end) ){
                $model->lunch_start = '12:00';
                $model->lunch_end = '13:00';

                $lunch_time = 1;
            }else{
                
                $lunch_time = intval($model->lunch_end) - intval($model->lunch_start);
            }


            $work_time = intval ($model->departure) - intval ( $model->arrival) ;            
            $model->total = $work_time - $lunch_time;
          


            $model->save();




            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Time model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    

    public function actionUpdate($id)
    {
        function do_alert($msg) 
        {
            echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
        }



        //Find model and user input
        $model = $this->findModel($id);
        $model->load(Yii::$app->request->post());
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //set default date
            if (empty($model->date)){
                $model->date = date("m-d-y"); 
            }


            //set default arrival
            if(intval($model->arrival) === 0){
                $model->arrival = '08:00';                
            }

            //set default departure
            if(intval($model->departure) === 0){
                $model->departure = '17:00';                
            }

            //set default lunch time
            if(intval($model->lunch_start) === 0 || intval($model->lunch_end) === 0 || intval($model->lunch_start) > intval($model->lunch_end) ){
                $model->lunch_start = '12:00';
                $model->lunch_end = '13:00';

                $lunch_time = 1;
            }else{
                
                $lunch_time = intval($model->lunch_end) - intval($model->lunch_start);
            }


            $work_time = intval ($model->departure) - intval ( $model->arrival) ;            
            $model->total = $work_time - $lunch_time;
          


            $model->save();
            //$model->arrival = '07:15:24.888';

            //do_alert($model->date);
            return $this->redirect(['view', 'id' => $model->id]);
            /*return $this->render('update', [
                'model' => $model,
            ]);*/
            
        } else {
            
            return $this->render('update', [
                'model' => $model,
            ]);
            
        }
    }

    /**
     * Deletes an existing Time model.
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
     * Finds the Time model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Time the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Time::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
