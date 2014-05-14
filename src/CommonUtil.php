<?php

namespace Telesto\VendorExt\Symfony\Form\Utils;

use Symfony\Component\Form\FormInterface;

abstract class CommonUtil
{
    /**
     * Type checking method for forms. Type checking includes the parent types.
     *
     * @param   FormInterface       $form
     * @param   string|string[]     $typeName   Type name or array of type names
     *
     * @return  true
     */
    public static function isTypeOf(FormInterface $form, $typeName)
    {
        $typeNames = (array) $typeName;
        $type = $form->getConfig()->getType();
        
        while ($type) {
            $actualTypeName = $type->getName();
            
            if (in_array($actualTypeName, $typeNames, true)) {
                return true;
            }
            
            $type = $type->getParent();
        }
        
        return false;
    }
}
