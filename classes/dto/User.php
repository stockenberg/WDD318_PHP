<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 28.11.18
 * Time: 15:31
 */

class User
{
    private $id;
    private $firstname;
    private $lastname;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname . " Das is ja Super!";
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = strtolower($firstname);
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname ?? null;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }


}

/*
function sendMail(User $user) {
    $msg = "Hallo " . $user->getFirstname() . " deine id ist " . $user->getId();

}

sendMail($userArr);
*/
/**
$marten = new User();
$marten->setFirstname('Marten');
$marten->setLastname('Stockenberg');
$marten->setId(1);

$thomas = new User();
$thomas->setFirstname('Thomas');
$thomas->setLastname('Schulz');
$thomas->setId(2);

$users = array();
$users[] = $marten;
$users[] = $thomas;

echo "<pre>";
print_r($users);
echo "</pre>";
*/
/**
 * @var User $user
 */
/*
foreach ($users as $user){
    echo "<p>" . $user->getFirstname() . "</p>";
    echo "<p>" . $user->getLastname() . "</p>";
    echo "<p>" . $user->getId() . "</p>";
}

$userArr = [
    'firstname' => strtolower('Marten'),
    'lastname' => 'Stockeberg',
    'id' => 1
];

echo "<br/><hr>";

$usersArr[] = $userArr;
echo "<pre>";
print_r($usersArr);
echo "</pre>";

foreach ($usersArr as $key => $user){
    echo "<p>".$user['firstname']." das ist ja super! </p>";
    echo "<p>".$user['lastname']."</p>";
    echo "<p>".$user['id']."</p>";
}
exit();*/