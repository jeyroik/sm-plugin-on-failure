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
        'setSuccess' => ExtensionContextOnFailure::class,
        'setFailOn' => ExtensionContextOnFailure::class,
        'setSuccessOn' => ExtensionContextOnFailure::class,
        'isSuccess' => ExtensionContextOnFailure::class
    ];

    public $subject = IContext::class;

    /**
     * @param IContext|null $context
     *
     * @return bool
     */
    public function isSuccess(IContext &$context = null): bool
    {
        return $context[PluginInitContextSuccess::CONTEXT__SUCCESS];
    }

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

    /**
     * @param callable|mixed $clause
     * @param IContext|null $context
     *
     * @return IContext
     */
    public function setFailOn($clause, IContext &$context = null)
    {
        $isFail = is_callable($clause) ? $clause($context) : $clause;
        $isFail ? $this->setFail($context) : $this->setSuccess($context);

        return $context;
    }

    /**
     * @param callable|mixed $clause
     * @param IContext|null $context
     *
     * @return IContext
     */
    public function setSuccessOn($clause, IContext &$context = null)
    {
        $isSuccess = is_callable($clause) ? $clause($context) : $clause;
        $isSuccess ? $this->setSuccess($context) : $this->setFail($context);

        return $context;
    }
}
