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
}
