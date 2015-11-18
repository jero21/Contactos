<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_curso".
 *
 * @property integer $Usuarioid_usuario
 * @property integer $Cursoid_curso
 *
 * @property Curso $cursoidCurso
 * @property Usuario $usuarioidUsuario
 */
class UsuarioCurso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Usuarioid_usuario', 'Cursoid_curso'], 'required'],
            [['Usuarioid_usuario', 'Cursoid_curso'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Usuarioid_usuario' => 'Usuarioid Usuario',
            'Cursoid_curso' => 'Cursoid Curso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoidCurso()
    {
        return $this->hasOne(Curso::className(), ['id_curso' => 'Cursoid_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioidUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'Usuarioid_usuario']);
    }
}
