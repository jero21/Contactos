<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property string $profesion
 * @property string $cargo
 * @property integer $Institucionid_institucion
 *
 * @property Contacto[] $contactos
 * @property Direccion[] $direccions
 * @property Representante[] $representantes
 * @property Institucion $institucionidInstitucion
 * @property UsuarioConocimiento[] $usuarioConocimientos
 * @property Conocimiento[] $conocimientoidConocimientos
 * @property UsuarioCurso[] $usuarioCursos
 * @property Curso[] $cursoidCursos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Institucionid_institucion'], 'integer'],
            [['nombre', 'apellido', 'profesion', 'cargo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'profesion' => 'Profesion',
            'cargo' => 'Cargo',
            'Institucionid_institucion' => 'Institucion a la que pertenece',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactos()
    {
        return $this->hasMany(Contacto::className(), ['Usuarioid_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccions()
    {
        return $this->hasMany(Direccion::className(), ['Usuarioid_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepresentantes()
    {
        return $this->hasMany(Representante::className(), ['Usuarioid_usuario' => 'id_usuario']);
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
    public function getUsuarioConocimientos()
    {
        return $this->hasMany(UsuarioConocimiento::className(), ['Usuarioid_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConocimientoidConocimientos()
    {
        return $this->hasMany(Conocimiento::className(), ['id_conocimiento' => 'Conocimientoid_conocimiento'])->viaTable('usuario_conocimiento', ['Usuarioid_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioCursos()
    {
        return $this->hasMany(UsuarioCurso::className(), ['Usuarioid_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoidCursos()
    {
        return $this->hasMany(Curso::className(), ['id_curso' => 'Cursoid_curso'])->viaTable('usuario_curso', ['Usuarioid_usuario' => 'id_usuario']);
    }

    public function getGrupoRepresentante(){
        $representante = Representante::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Representante::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $representante->grupo;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
        
    }
    
    public function getContactosEmail(){
        $contactos = Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $contactos->email;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
        
    }
    public function getContactosTelefono(){
        $contactos = Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $contactos->telefono;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getContactosNombreSecretaria(){
        $contactos = Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $contactos->nombre_secretaria;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getContactosMailSecretaria(){
        $contactos = Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $contactos->mail_secretaria;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getContactosTelefonoSecretaria(){
        $contactos = Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $contactos->telefono_secretaria;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }


}