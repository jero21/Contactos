<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property integer $id_curso
 * @property string $nombre
 * @property string $deescripcion
 * @property string $nivel
 * @property string $lugar
 *
 * @property Direccion[] $direccions
 * @property UsuarioCurso[] $usuarioCursos
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'deescripcion', 'nivel', 'lugar'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'nombre' => 'Nombre',
            'deescripcion' => 'Deescripcion',
            'nivel' => 'Nivel',
            'lugar' => 'Lugar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccions()
    {
        return $this->hasMany(Direccion::className(), ['Cursoid_curso' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioCursos()
    {
        return $this->hasMany(UsuarioCurso::className(), ['Cursoid_curso' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioidUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_usuario' => 'Usuarioid_usuario'])->viaTable('usuario_curso', ['Cursoid_curso' => 'id_curso']);
    }
    public function getRegion(){
        $direccion = Direccion::find()->where(['Cursoid_curso' => $this->id_curso])->one();
        
        if(Direccion::find()->where(['Cursoid_curso' => $this->id_curso])->exists()){
            return $direccion->region;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getCiudad(){
        $direccion = Direccion::find()->where(['Cursoid_curso' => $this->id_curso])->one();
        
        if(Direccion::find()->where(['Cursoid_curso' => $this->id_curso])->exists()){
            return $direccion->ciudad;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getDireccion(){
        $direccion = Direccion::find()->where(['Cursoid_curso' => $this->id_curso])->one();
        
        if(Direccion::find()->where(['Cursoid_curso' => $this->id_curso])->exists()){
            return $direccion->direccion;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
   
}
