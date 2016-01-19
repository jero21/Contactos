<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_institucion".
 *
 * @property integer $id_sub_institucion
 * @property string $nombre
 * @property string $descripcion
 * @property integer $Institucionid_institucion
 *
 * @property Direccion[] $direccions
 * @property Institucion $institucionidInstitucion
 */
class SubInstitucion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_institucion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Institucionid_institucion'], 'required'],
            [['Institucionid_institucion'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sub_institucion' => 'Id Sub Institucion',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'Institucionid_institucion' => 'Institucionid Institucion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccions()
    {
        return $this->hasMany(Direccion::className(), ['Sub_Institucionid_sub_institucion' => 'id_sub_institucion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitucionidInstitucion()
    {
        return $this->hasOne(Institucion::className(), ['id_institucion' => 'Institucionid_institucion']);
    }
    public function getRegion(){
        $direccion = Direccion::find()->where(['Institucionid_institucion' => $this->id_sub_institucion])->one();
        
        if(Direccion::find()->where(['Institucionid_institucion' => $this->id_sub_institucion])->exists()){
            return $direccion->region;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getCiudad(){
        $direccion = Direccion::find()->where(['Institucionid_institucion' => $this->id_sub_institucion])->one();
        
        if(Direccion::find()->where(['Institucionid_institucion' => $this->id_sub_institucion])->exists()){
            return $direccion->ciudad;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getDireccion(){
        $direccion = Direccion::find()->where(['Institucionid_institucion' => $this->id_sub_institucion])->one();
        
        if(Direccion::find()->where(['Institucionid_institucion' => $this->id_sub_institucion])->exists()){
            return $direccion->direccion;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getNombreInstitucion(){
        $institucion = Institucion::find()->where(['id_institucion' => $this->Institucionid_institucion])->one();
        
        if(Institucion::find()->where(['id_institucion' => $this->Institucionid_institucion])->exists()){
            return $institucion->nombre;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
        
    }
}
