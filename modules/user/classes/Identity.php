<?php
namespace app\modules\user\classes;
use Yii;
class Identity extends \yii\base\Component{
    public $id = "";
    public $username = "";
    public $email = "";
    public $fname = "";
    public $lname = "";
    public $tel = "";
    public $address = "";
    public $sex = "";
    /**
     * @inheritdoc
     * @return Identity the newly created [[Identity]] instance.
     */
    public static function user() {
        return Yii::createObject(Identity::className());//, [get_called_class()]
    }
    public function loadUser() {
        $id = \app\modules\login\classes\Cookie::getCookie("logins")["id"];
        $sql="SELECT * FROM users as u INNER JOIN profiles as p  ON u.id=p.user_id WHERE  u.id =:id";
        if($query["sex"] == 1){
            $query["sex"] = 'ชาย';
        }else{
            $query["sex"] = 'หญิง';
        }
        $params = [":id"=>$id];
        $query = Yii::$app->db->createCommand($sql,$params)->queryOne();
        $this->id = $query["id"];
        $this->username = $query["username"];
        $this->email = $query["email"];
        $this->fname = $query["fname"];
        $this->lname = $query["lname"];
        $this->tel = $query["tel"];
        $this->address = $query["address"];
        $this->sex = $query["sex"];
        
        return $this;
    }
    public function getId() {
        return $this->id;
    }
    public function getUsername() {
        return $this->username;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getFname() {
        return $this->fname;
    }
    public function getLname() {
        return $this->lname;
    }
    public function getTel() {
        return $this->tel;
    }
    public function getAddress() {
        return $this->address;
    }
    public function getSex() {
        return $this->sex;
    }
}
