<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cicloescolar".
 *
 * @property int $ID
 * @property string $clave
 * @property string $nombre
 * @property int $vigente
 * @property int $fktipociclo
 *
 * @property Tipociclo $fktipociclo0
 * @property Periodo[] $periodos
 */
class Cicloescolar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cicloescolar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clave', 'nombre', 'vigente', 'fktipociclo'], 'required'],
            [['vigente', 'fktipociclo'], 'integer'],
            [['clave'], 'string', 'max' => 30],
            [['nombre'], 'string', 'max' => 255],
            [['fktipociclo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipociclo::class, 'targetAttribute' => ['fktipociclo' => 'ID']],
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
            'fktipociclo' => 'Fktipociclo',
        ];
    }

    /**
     * Gets query for [[Fktipociclo0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TipocicloQuery
     */
    public function getFktipociclo0()
    {
        return $this->hasOne(Tipociclo::class, ['ID' => 'fktipociclo']);
    }

    /**
     * Gets query for [[Periodos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\PeriodoQuery
     */
    public function getPeriodos()
    {
        return $this->hasMany(Periodo::class, ['fkciclo' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CicloescolarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CicloescolarQuery(get_called_class());
    }
}
