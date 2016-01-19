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
 * @property Conocimiento[] $conocimientos
 * @property Contacto[] $contactos
 * @property Direccion[] $direccions
 * @property Representante[] $representantes
 * @property Institucion $institucionidInstitucion
 * @property UsuarioCurso[] $usuarioCursos
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
            'Institucionid_institucion' => 'Institucionid Institucion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConocimientos()
    {
        return $this->hasMany(Conocimiento::className(), ['Usuarioid_usuario' => 'id_usuario']);
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
    public function getUsuarioCursos()
    {
        return $this->hasMany(UsuarioCurso::className(), ['Usuarioid_usuario' => 'id_usuario']);
    }
    
    public function getGrupoRepresentante(){
        $representante = Representante::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Representante::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $representante->grupo;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
        
    }
    
    public function getEmail(){
        $contactos = Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $contactos->email;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
        
    }
    public function getTelefono(){
        $contactos = Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $contactos->telefono;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getNombreSecretaria(){
        $contactos = Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $contactos->nombre_secretaria;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getMailSecretaria(){
        $contactos = Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $contactos->mail_secretaria;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getTelefonoSecretaria(){
        $contactos = Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Contacto::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $contactos->telefono_secretaria;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    
    public function getNombreInstitucion(){
        $institucion = Institucion::find()->where(['id_institucion' => $this->Institucionid_institucion])->one();
        
        if(Institucion::find()->where(['id_institucion' => $this->Institucionid_institucion])->exists()){
            return $institucion->nombre;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }

    public function getRegion(){
        $direccion = Direccion::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Direccion::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $direccion->region;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getCiudad(){
        $direccion = Direccion::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Direccion::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $direccion->ciudad;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getDireccion(){
        $direccion = Direccion::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Direccion::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $direccion->direccion;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getSubInstitucion(){
        $subinstitucion = SubInstitucion::findBySql('SELECT * FROM Sub_Institucion INNER JOIN Institucion ON  Sub_Institucion.Institucionid_institucion = Institucion.id_institucion INNER JOIN Usuario ON Usuario.id_usuario = Sub_Institucion.Usuarioid_usuario ')->one();
        return $subinstitucion->nombre;    
    }
    public function getNombre(){
        $conocimiento = Conocimiento::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Direccion::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $conocimiento->nombre;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getNivel(){
        $conocimiento = Conocimiento::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Direccion::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $conocimiento->nivel;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
    public function getDescripcion(){
        $conocimiento = Conocimiento::find()->where(['Usuarioid_usuario' => $this->id_usuario])->one();
        
        if(Direccion::find()->where(['Usuarioid_usuario' => $this->id_usuario])->exists()){
            return $conocimiento->nivel;    
        } else {
            return 'Este dato no se encuentra registrado';
        }
    }
}
