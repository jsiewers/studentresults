<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-03
 * Time: 12:02
 */

namespace Lib\Validators;
use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;



class Validator
{
    protected $errors;

    public function validate($request, array $rules)
    {
        foreach ($rules as $field => $rule) {
            try {
                $rule->setName(ucfirst($field))->assert($request->getParam($field));
            } catch (NestedValidationException $e) {
                $this->errors[$field] = $e->getMessages();
            }
        }
        $_SESSION['errors'] = $this->errors;

        return $this;
    }


    public function failed() {
        return (!empty($this->errors));
    }

}