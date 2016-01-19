<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "institucion".
 *
 * @property integer $id_institucion
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Direccion[] $direccions
 * @property SubInstitucion[] $subInstitucions
 * @property Usuario[] $usuarios
 */
class Institucion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'institucion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_institucion' => 'id institucion',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccions()
    {
        return $this->hasMany(Direccion::className(), ['Institucionid_institucion' => 'id_institucion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubInstitucions()
    {
        return $this->hasMany(SubInstitucion::className(), ['Institucionid_institucion' => 'id_institucion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['Institucionid_institucion' => 'id_institucion']);
    }
    public function getRegion(){
        $direccion = Direccion::find()->where(['Institucionid_institucion' => $this->id_institucion])->one();
        
        if(Direccion::find()->where(['Institucionid_institucion' => $this->id_institucion])->exists()){
            return $direccion->region;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getCiudad(){
        $direccion = Direccion::find()->where(['Institucionid_institucion' => $this->id_institucion])->one();
        
        if(Direccion::find()->where(['Institucionid_institucion' => $this->id_institucion])->exists()){
            return $direccion->ciudad;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getDireccion(){
        $direccion = Direccion::find()->where(['Institucionid_institucion' => $this->id_institucion])->one();
        
        if(Direccion::find()->where(['Institucionid_institucion' => $this->id_institucion])->exists()){
            return $direccion->direccion;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
}
