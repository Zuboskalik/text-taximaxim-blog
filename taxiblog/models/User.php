<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property integer $role_id
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const ROLE_DELETED = 0;
    const ROLE_ADMIN = 1;
    const ROLE_AUTHOR = 2;
    const ROLE_USER = 3;

    public static function tableName() {
        return 'users';
    }

    public function rules()
    {
        return [
            ['role_id', 'default', 'value' => [self::ROLE_USER]],
            ['role_id', 'in', 'range' => [self::ROLE_DELETED, self::ROLE_ADMIN, self::ROLE_AUTHOR, self::ROLE_USER]],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'role_id' => [self::ROLE_ADMIN, self::ROLE_AUTHOR, self::ROLE_USER]]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['name' => $username]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}
