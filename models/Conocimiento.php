<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conocimiento".
 *
 * @property integer $id_conocimiento
 * @property string $nombre
 * @property integer $nivel
 * @property string $descripcion
 *
 * @property UsuarioConocimiento[] $usuarioConocimientos
 * @property Usuario[] $usuarioidUsuarios
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
            [['nivel'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 255]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioConocimientos()
    {
        return $this->hasMany(UsuarioConocimiento::className(), ['Conocimientoid_conocimiento' => 'id_conocimiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioidUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_usuario' => 'Usuarioid_usuario'])->viaTable('usuario_conocimiento', ['Conocimientoid_conocimiento' => 'id_conocimiento']);
    }
}
