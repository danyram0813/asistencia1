<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property int $ID
 * @property string $nombre
 * @property string $clave
 * @property int $fkdepartamento
 *
 * @property Departamento $fkdepartamento0
 * @property Materium[] $materia
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'clave', 'fkdepartamento'], 'required'],
            [['fkdepartamento'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['clave'], 'string', 'max' => 15],
            [['fkdepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::class, 'targetAttribute' => ['fkdepartamento' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'nombre' => 'Nombre',
            'clave' => 'Clave',
            'fkdepartamento' => 'Fkdepartamento',
        ];
    }

    /**
     * Gets query for [[Fkdepartamento0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\DepartamentoQuery
     */
    public function getFkdepartamento0()
    {
        return $this->hasOne(Departamento::class, ['ID' => 'fkdepartamento']);
    }

    /**
     * Gets query for [[Materia]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\MateriumQuery
     */
    public function getMateria()
    {
        return $this->hasMany(Materium::class, ['fkcarrera' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CarreraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CarreraQuery(get_called_class());
    }
}
