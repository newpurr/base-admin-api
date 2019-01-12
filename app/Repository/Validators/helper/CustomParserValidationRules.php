<?php

namespace App\Repository\Validators\helper;

/**
 * Trait CustomParserValidationRules
 *
 * 重写Laravel parserValidationRules方法以便扩展我们自定义的验证规则
 *
 * @author  luotao
 * @version 1.0
 * @package App\Repository\Validators\helper
 */
trait CustomParserValidationRules
{
    /**
     * Parser Validation Rules
     *
     * @param      $rules
     * @param null $id
     *
     * @return array
     */
    protected function parserValidationRules($rules, $id = null)
    {
        if (null === $id) {
            return $rules;
        }
        
        array_walk($rules, function (&$rules, $field) use ($id) {
            if (!is_array($rules)) {
                $rules = explode('|', $rules);
            }
            
            foreach ($rules as $ruleIdx => $rule) {
                // get name and parameters
                @list($name, $params) = array_pad(explode(':', $rule), 2, null);
                
                // only do someting for the unique rule
                $ruleName = strtolower($name);
                if ($ruleName === 'unique') {
                    $p = array_map('trim', explode(',', $params));
                    
                    // set field name to rules key ($field) (laravel convention)
                    if (!isset($p[1])) {
                        $p[1] = $field;
                    }
                    
                    // set 3rd parameter to id given to getValidationRules()
                    $p[2] = $id;
                    
                    $params          = implode(',', $p);
                    $rules[$ruleIdx] = $name . ':' . $params;
                    continue;
                }
                
                if ($ruleName === 'unique_with') {
                    $rules[$ruleIdx] = $name . ':' . str_replace('%d', $id, $params);
                    continue;
                }
            }
        });
        
        return $rules;
    }
}
