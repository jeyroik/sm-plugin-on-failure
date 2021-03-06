<?php
namespace jeyroik\extas\interfaces\systems\contexts;

use jeyroik\extas\interfaces\systems\IContext;

/**
 * Interface IContextOnFailure
 *
 * @package jeyroik\extas\interfaces\systems\contexts
 * @author Funcraft <me@funcraft.ru>
 */
interface IContextOnFailure
{
    /**
     * @param IContext|null $context
     *
     * @return IContext
     */
    public function setFail(IContext &$context = null);

    /**
     * @param IContext|null $context
     *
     * @return IContext
     */
    public function setSuccess(IContext &$context = null);

    /**
     * @param callable|mixed $clause
     * @param IContext|null $context
     *
     * @return IContext
     */
    public function setFailOn($clause, IContext &$context = null);

    /**
     * @param callable|mixed $clause
     * @param IContext|null $context
     *
     * @return IContext
     */
    public function setSuccessOn($clause, IContext &$context = null);

    /**
     * @param IContext|null $context
     *
     * @return bool
     */
    public function isSuccess(IContext &$context = null): bool;
}
