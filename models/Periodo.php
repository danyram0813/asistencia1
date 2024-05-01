<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodo".
 *
 * @property int $ID
 * @property string $clave
 * @property string $nombre
 * @property int $vigente
 * @property int $fkciclo
 *
 * @property Cicloescolar $fkciclo0
 * @property Grupo[] $grupos
 */
class Periodo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'periodo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clave', 'nombre', 'vigente', 'fkciclo'], 'required'],
            [['vigente', 'fkciclo'], 'integer'],
            [['clave', 'nombre'], 'string', 'max' => 50],
            [['fkciclo'], 'exist', 'skipOnError' => true, 'targetClass' => Cicloescolar::class, 'targetAttribute' => ['fkciclo' => 'ID']],
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
            'nombre' => 'Nombre',
            'vigente' => 'Vigente',
            'fkciclo' => 'Fkciclo',
        ];
    }

    /**
     * Gets query for [[Fkciclo0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CicloescolarQuery
     */
    public function getFkciclo0()
    {
        return $this->hasOne(Cicloescolar::class, ['ID' => 'fkciclo']);
    }

    /**
     * Gets query for [[Grupos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\GrupoQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::class, ['fkperiodo' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\PeriodoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\PeriodoQuery(get_called_class());
    }
}
