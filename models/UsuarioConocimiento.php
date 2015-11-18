<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_conocimiento".
 *
 * @property integer $Usuarioid_usuario
 * @property integer $Conocimientoid_conocimiento
 *
 * @property Conocimiento $conocimientoidConocimiento
 * @property Usuario $usuarioidUsuario
 */
class UsuarioConocimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_conocimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Usuarioid_usuario', 'Conocimientoid_conocimiento'], 'required'],
            [['Usuarioid_usuario', 'Conocimientoid_conocimiento'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Usuarioid_usuario' => 'Usuarioid Usuario',
            'Conocimientoid_conocimiento' => 'Conocimientoid Conocimiento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConocimientoidConocimiento()
    {
        return $this->hasOne(Conocimiento::className(), ['id_conocimiento' => 'Conocimientoid_conocimiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioidUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'Usuarioid_usuario']);
    }
}
