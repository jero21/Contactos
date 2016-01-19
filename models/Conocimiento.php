<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conocimiento".
 *
 * @property integer $id_conocimiento
 * @property string $nombre
 * @property string $nivel
 * @property string $descripcion
 * @property integer $Usuarioid_usuario
 * @property integer $NombreConocimientoid
 *
 * @property Usuario $usuarioidUsuario
 * @property NombreConocimiento $nombreConocimiento
 */
class Conocimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conocimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Usuarioid_usuario'], 'required'],
            [['Usuarioid_usuario', 'NombreConocimientoid'], 'integer'],
            [['nombre', 'nivel', 'descripcion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_conocimiento' => 'Id Conocimiento',
            'nombre' => 'Nombre',
            'nivel' => 'Nivel',
            'descripcion' => 'Descripcion',
            'Usuarioid_usuario' => 'Usuarioid Usuario',
            'NombreConocimientoid' => 'Nombre Conocimientoid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioidUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'Usuarioid_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getNombreConocimiento()
    {
        return $this->hasOne(NombreConocimiento::className(), ['id' => 'NombreConocimientoid']);
    }
}
