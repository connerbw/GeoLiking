<?php

namespace Trotch;

abstract class Renderer
{

    /**
     * @var \Slim\Slim $appService
     */
    protected $appService;

    /**
     * @var \Trotch\Container $container
     */
    protected $container;

    /**
     * @var string
     */
    protected $template;

    /**
     * @var int
     */
    protected $status;

    /**
     * @param \Slim\Slim $appService
     * @param \Trotch\Container $container
     */
    function __construct($appService, $container)
    {
        $this->appService = $appService;
        $this->container = $container;
    }

    /**
     *
     */
    final function render()
    {
        $this->pre();
        $this->appService->render($this->template, $this->data($this->appService, $this->container), $this->status);
        $this->post();
    }

    /**
     * @see render()
     */
    abstract protected function pre();

    /**
     * Data to be passed to \Slim\Slim::render
     *
     * @see render()
     * @return array
     */
    abstract protected function data();

    /**
     * @see render()
     */
    abstract protected function post();

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

}