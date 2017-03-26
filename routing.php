<?php

    define('DEFAULT_PAGE_NAME', 'default');

    function getPageName($level)
    {
        $requestParams = explode('/', $_SERVER['REQUEST_URI']);
        $scriptPath = explode('/', $_SERVER['SCRIPT_NAME']);

        // remove the base path
        while ($requestParams[0] === $scriptPath[0])
        {
            array_shift($requestParams);
            array_shift($scriptPath);
        }

        if ($level === 0)
        {
            return $requestParams[0] ?: DEFAULT_PAGE_NAME;
        }

        return isset($requestParams[$level]) ? $requestParams[$level] : ''; 
    }