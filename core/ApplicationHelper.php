<?php namespace Core;


trait ApplicationHelper {

    /**
     * Fetch database config
     *
     * @return mixed
     */
    public function database()
    {
        return $this['config']['database'];
    }

} 