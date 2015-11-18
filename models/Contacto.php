<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacto".
 *
 * @property integer $id_contacto
 * @property string $email
 * @property integer $telefono
 * @property string $nombre_secretaria
 * @property string $mail_secretaria
 * @property integer $telefono_secretaria
 * @property integer $Usuarioid_usuario
 *
 * @property Usuario $usuarioidUsuario
 */
class Contacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['telefono', 'telefono_secretaria', 'Usuarioid_usuario'], 'integer'],
            [['Usuarioid_usuario'], 'required'],
            [['email', 'nombre_secretaria', 'mail_secretaria'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contacto' => 'Id Contacto',
            'email' => 'Email',
            'telefono' => 'Telefono',
            'nombre_secretaria' => 'Nombre Secretaria',
            'mail_secretaria' => 'Mail Secretaria',
            'telefono_secretaria' => 'Telefono Secretaria',
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
