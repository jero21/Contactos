<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "direccion".
 *
 * @property integer $id_direccion
 * @property string $pais
 * @property string $region
 * @property string $ciudad
 * @property string $direccion
 * @property integer $Usuarioid_usuario
 * @property integer $Institucionid_institucion
 * @property integer $Sub_Institucionid_sub_institucion
 * @property integer $Cursoid_curso
 *
 * @property Usuario $usuarioidUsuario
 * @property Institucion $institucionidInstitucion
 * @property Curso $cursoidCurso
 * @property SubInstitucion $subInstitucionidSubInstitucion
 */
class Direccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Usuarioid_usuario', 'Institucionid_institucion', 'Sub_Institucionid_sub_institucion', 'Cursoid_curso'], 'integer'],
            [['pais', 'region', 'ciudad', 'direccion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_direccion' => 'Id Direccion',
            'pais' => 'Pais',
            'region' => 'Region',
            'ciudad' => 'Ciudad',
            'direccion' => 'Direccion',
            'Usuarioid_usuario' => 'Usuarioid Usuario',
            'Institucionid_institucion' => 'Institucionid Institucion',
            'Sub_Institucionid_sub_institucion' => 'Sub  Institucionid Sub Institucion',
            'Cursoid_curso' => 'Cursoid Curso',
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
    public function getInstitucionidInstitucion()
    {
        return $this->hasOne(Institucion::className(), ['id_institucion' => 'Institucionid_institucion']);
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
    public function getSubInstitucionidSubInstitucion()
    {
        return $this->hasOne(SubInstitucion::className(), ['id_sub_institucion' => 'Sub_Institucionid_sub_institucion']);
    }
}
