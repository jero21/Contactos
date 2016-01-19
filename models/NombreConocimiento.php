<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nombre_conocimiento".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Conocimiento[] $conocimientos
 */
class NombreConocimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nombre_conocimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConocimientos()
    {
        return $this->hasMany(Conocimiento::className(), ['NombreConocimientoid' => 'id']);
    }
}
