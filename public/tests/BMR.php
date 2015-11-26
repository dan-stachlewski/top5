<?php
use Valitron\Validator;


class BMR
{
    private $data = [];
    private $valid = false;
    private $errors = [];

    const FEMALE = 1;
    const MALE = 2;

    /**
     * BMR constructor.
     * @param $data
     */

    public function __construct($data)
    {
        $this->data = $data;
        $this->validate($data);
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->data['height'];
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->data['weight'];
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->data['age'];
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->data['gender'];
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function getBmr()
    {
        if ($this->valid === false) {
            return false;
        }
        if ($this->getGender() === self::MALE) {
            $base =  round(88.362 + (13.397 * $this->getWeight())
                + (479.9 * $this->getHeight()) - (5.677 * $this->getAge()), 2);
        } else {
            $base = round(447.593 + (9.247 * $this->getWeight())
                + (309.8 * $this->getHeight()) - (4.098 * $this->getAge()), 2);
        }
        return $base;
    }


    private function validate($data)
    {
        $v = new Validator($data);

        $v->rule('required', ['gender', 'age', 'height', 'weight']);
        $v->rule('numeric', ['age', 'height', 'weight']);
        $v->rule('in', 'gender', [self::MALE, self::FEMALE])->message('Gender must be specified');
        $v->rule('max', 'height', 2.5);
        $v->rule('notIn', 'height', [0])->message('{field} - zero is not allowed here');
        $v->rule('min', 'weight', 30);
        $v->rule('min', 'age', 21)->message('This formula applies only to adults (more than 21 years old )');

        $this->valid = $v->validate();
        $this->errors = $v->errors();
        d($this->errors);
    }

}