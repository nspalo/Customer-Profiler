<?php

namespace App\Database\Renderers;

/**
 * Class Render
 * @package App\Renderers
 */
abstract class Render
{
    /**
     * @param $classes
     * @return array
     */
    public function renderList($classes)
    {
        $buffer = [];
        /** @var Class $aClass */
        foreach ($classes as $aClass) {
            $buffer[] = $this->render($aClass);
        }

        return $buffer;
    }
}
