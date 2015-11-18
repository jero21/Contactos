<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "representante".
 *
 * @property integer $id_representante
 * @property string $grupo
 * @property integer $Usuarioid_usuario
 *
 * @property Usuario $usuarioidUsuario
 */
class Representante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'representante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Usuarioid_usuario'], 'required'],
            [['Usuarioid_usuario'], 'integer'],
            [['grupo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_representante' => 'Id Representante',
            'grupo' => 'Grupo',
            'Usuarioid_usuario' => 'Usuarioid Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioidUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'Usuarioid_usuario']);
    }
}
