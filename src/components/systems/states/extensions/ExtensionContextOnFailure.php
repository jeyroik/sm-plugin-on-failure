<?php
namespace jeyroik\extas\components\systems\states\extensions;

use jeyroik\extas\components\systems\Extension;
use jeyroik\extas\components\systems\states\machines\plugins\PluginInitContextSuccess;
use jeyroik\extas\interfaces\systems\IContext;

/**
 * Class ExtensionContext
 *
 * @package jeyroik\extas\components\systems\states\extensions
 * @author Funcraft <me@funcraft.ru>
 */
class ExtensionContextOnFailure extends Extension
{
    /**
     * @var array
     */
    protected $methods = [
        'setFail' => ExtensionContextOnFailure::class,
        'setSuccess' => ExtensionContextOnFailure::class
    ];

    /**
     * @param IContext|null $context
     *
     * @return IContext
     */
    public function setFail(IContext &$context = null)
    {
        $context->updateItem(PluginInitContextSuccess::CONTEXT__SUCCESS, false);

        return $context;
    }

    /**
     * @param IContext|null $context
     *
     * @return IContext
     */
    public function setSuccess(IContext &$context = null)
    {
        $context->updateItem(PluginInitContextSuccess::CONTEXT__SUCCESS, true);

        return $context;
    }
}
