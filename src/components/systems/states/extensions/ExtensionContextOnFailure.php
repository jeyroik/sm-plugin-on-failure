<?php
namespace jeyroik\extas\components\systems\states\extensions;

use jeyroik\extas\components\systems\Extension;
use jeyroik\extas\components\systems\states\machines\plugins\PluginInitContextSuccess;
use jeyroik\extas\interfaces\systems\contexts\IContextOnFailure;
use jeyroik\extas\interfaces\systems\IContext;

/**
 * Class ExtensionContext
 *
 * @package jeyroik\extas\components\systems\states\extensions
 * @author Funcraft <me@funcraft.ru>
 */
class ExtensionContextOnFailure extends Extension implements IContextOnFailure
{
    /**
     * @var array
     */
    public $methods = [
        'setFail' => ExtensionContextOnFailure::class,
        'setSuccess' => ExtensionContextOnFailure::class
    ];
    public $subject = IContext::class;

    /**
     * @param IContext|null $context
     *
     * @return IContext
     */
    public function setFail(IContext &$context = null)
    {
        $context[PluginInitContextSuccess::CONTEXT__SUCCESS] = false;

        return $context;
    }

    /**
     * @param IContext|null $context
     *
     * @return IContext
     */
    public function setSuccess(IContext &$context = null)
    {
        $context[PluginInitContextSuccess::CONTEXT__SUCCESS] = true;

        return $context;
    }
}
