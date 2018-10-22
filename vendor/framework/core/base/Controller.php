<?php

namespace framework\base;

abstract class Controller
{
    protected $route = [];
    protected $view;
    protected $layout;

    /**
     * @var array data
     */
    protected $data = [];

    /**
     * @var array meta data
     */
    protected $meta = ['title' => '', 'desc' => '', 'keywords' => ''];


    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];

    }


    public function getView()
    {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
        $viewObject->getMeta();
    }

    /**
     * Add data to array $data
     * @param $data
     */
    public function set($data)
    {
        $this->data = $data;
    }

    /**
     * @param string $itle
     * @param string $description
     * @param $keywords
     */
    public function setMeta($title = '', $description = '', $keywords)
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $description;
        $this->meta['keywords'] = $keywords;
    }
}