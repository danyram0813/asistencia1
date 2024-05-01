<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property int $ID
 * @property string $clave
 * @property int $fkmateria
 * @property int $fkperiodo
 * @property int $fkpersonal
 * @property string $horaInicio
 * @property string $horaFin
 * @property string $dias
 *
 * @property Estudiantesgrupo[] $estudiantesgrupos
 * @property Materium $fkmateria0
 * @property Periodo $fkperiodo0
 * @property Personal $fkpersonal0
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clave', 'fkmateria', 'fkperiodo', 'fkpersonal', 'horaInicio', 'horaFin', 'dias'], 'required'],
            [['fkmateria', 'fkperiodo', 'fkpersonal'], 'integer'],
            [['horaInicio', 'horaFin'], 'safe'],
            [['clave', 'dias'], 'string', 'max' => 50],
            [['fkmateria'], 'exist', 'skipOnError' => true, 'targetClass' => Materium::class, 'targetAttribute' => ['fkmateria' => 'ID']],
            [['fkperiodo'], 'exist', 'skipOnError' => true, 'targetClass' => Periodo::class, 'targetAttribute' => ['fkperiodo' => 'ID']],
            [['fkpersonal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['fkpersonal' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'clave' => 'Clave',
            'fkmateria' => 'Fkmateria',
            'fkperiodo' => 'Fkperiodo',
            'fkpersonal' => 'Fkpersonal',
            'horaInicio' => 'Hora Inicio',
            'horaFin' => 'Hora Fin',
            'dias' => 'Dias',
        ];
    }

    /**
     * Gets query for [[Estudiantesgrupos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\EstudiantesgrupoQuery
     */
    public function getEstudiantesgrupos()
    {
        return $this->hasMany(Estudiantesgrupo::class, ['fkgrupo' => 'ID']);
    }

    /**
     * Gets query for [[Fkmateria0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\MateriumQuery
     */
    public function getFkmateria0()
    {
        return $this->hasOne(Materium::class, ['ID' => 'fkmateria']);
    }

    /**
     * Gets query for [[Fkperiodo0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\PeriodoQuery
     */
    public function getFkperiodo0()
    {
        return $this->hasOne(Periodo::class, ['ID' => 'fkperiodo']);
    }

    /**
     * Gets query for [[Fkpersonal0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\PersonalQuery
     */
    public function getFkpersonal0()
    {
        return $this->hasOne(Personal::class, ['ID' => 'fkpersonal']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\GrupoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\GrupoQuery(get_called_class());
    }
}
