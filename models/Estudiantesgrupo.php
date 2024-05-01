<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiantesgrupo".
 *
 * @property int $ID
 * @property int $fkpersonal
 * @property int $fkgrupo
 *
 * @property Asistencium[] $asistencia
 * @property Grupo $fkgrupo0
 * @property Personal $fkpersonal0
 */
class Estudiantesgrupo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiantesgrupo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fkpersonal', 'fkgrupo'], 'required'],
            [['fkpersonal', 'fkgrupo'], 'integer'],
            [['fkpersonal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['fkpersonal' => 'ID']],
            [['fkgrupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::class, 'targetAttribute' => ['fkgrupo' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'fkpersonal' => 'Fkpersonal',
            'fkgrupo' => 'Fkgrupo',
        ];
    }

    /**
     * Gets query for [[Asistencia]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AsistenciumQuery
     */
    public function getAsistencia()
    {
        return $this->hasMany(Asistencium::class, ['fkestudiantegrupo' => 'ID']);
    }

    /**
     * Gets query for [[Fkgrupo0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\GrupoQuery
     */
    public function getFkgrupo0()
    {
        return $this->hasOne(Grupo::class, ['ID' => 'fkgrupo']);
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
     * @return \app\models\query\EstudiantesgrupoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\EstudiantesgrupoQuery(get_called_class());
    }
}
