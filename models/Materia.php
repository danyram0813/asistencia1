<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property int $ID
 * @property string $nombre
 * @property int $fkcarrera
 * @property int $fkplan
 * @property int $semestre
 *
 * @property Carrera $fkcarrera0
 * @property Plan $fkplan0
 * @property Grupo[] $grupos
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'fkcarrera', 'fkplan', 'semestre'], 'required'],
            [['fkcarrera', 'fkplan', 'semestre'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['fkplan'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::class, 'targetAttribute' => ['fkplan' => 'ID']],
            [['fkcarrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::class, 'targetAttribute' => ['fkcarrera' => 'ID']],
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
            'fkcarrera' => 'Fkcarrera',
            'fkplan' => 'Fkplan',
            'semestre' => 'Semestre',
        ];
    }

    /**
     * Gets query for [[Fkcarrera0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CarreraQuery
     */
    public function getFkcarrera0()
    {
        return $this->hasOne(Carrera::class, ['ID' => 'fkcarrera']);
    }

    /**
     * Gets query for [[Fkplan0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\PlanQuery
     */
    public function getFkplan0()
    {
        return $this->hasOne(Plan::class, ['ID' => 'fkplan']);
    }

    /**
     * Gets query for [[Grupos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\GrupoQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::class, ['fkmateria' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\MateriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\MateriaQuery(get_called_class());
    }
}
